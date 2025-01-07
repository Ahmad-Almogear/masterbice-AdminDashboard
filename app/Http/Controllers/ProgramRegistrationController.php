<?php

namespace App\Http\Controllers;

use App\Models\ProgramRegistion;
use App\Models\ProgramRegistration;
use Illuminate\Http\Request;

class ProgramRegistrationController extends Controller
{
    public function register(Request $request)
    {
        // التحقق من البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'children_count' => 'required|integer',
            'child_name' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id', // تأكد من أن الفعالية موجودة في قاعدة البيانات
        ]);

        // حفظ البيانات في قاعدة البيانات
        ProgramRegistration::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'children_count' => $request->children_count,
            'child_name' => $request->child_name,
            'program_id' => $request->program_id, // أضف الفعالية هنا
        ]);

        // إرجاع رد عند النجاح
        return back()->with('success', 'تم التسجيل بنجاح!');

    }

    public function index()
    {
        // جلب جميع التسجيلات مع بيانات الفعالية المرتبطة بها
        $registrationsProgram = ProgramRegistration::with('Program')->get();

        return view('program.list-program_registrations', compact('registrationsProgram'));
    }
    
}
