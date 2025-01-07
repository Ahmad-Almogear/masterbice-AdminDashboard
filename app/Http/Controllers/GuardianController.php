<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class GuardianController extends Controller
{

    // عرض النموذج لإضافة بيانات ولي الأمر
    public function create()
    {
         // إحضار قائمة الطلاب من قاعدة البيانات
        $studentList = Student::all();
        return view('guardians.add-guardians', compact('studentList'));
    }

    // حفظ بيانات ولي الأمر في قاعدة البيانات
    public function store(Request $request)
    {
        // dd($request);
        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'id' => 'required|exists:students,user_id', // تحقق من وجود الطالب

        ]);
        // dd($validated);
        // حفظ بيانات ولي الأمر
        $guardian = Guardian::create($validated);
        // ربط ولي الأمر بالطالب (إذا كنت تريد إضافة هذه العلاقة)
        // سنفترض أن هناك حقل guardian_id في جدول الطلاب
        $student = Student::find($request->id);
        // dd($student); // يجب أن يكون لديك student_id في الـ Request
        if ($student) {
            $student->guardian_id = $guardian->id;
            $student->save();
            
        }
        
        return redirect()->route('student/list', $student->user_id)->with('success', 'تم إضافة بيانات ولي الأمر بنجاح');
    }

  
}
