<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;


class ContactUsController extends Controller
{
    public function create()
    {
    return view('themes.contact'); // عرض النموذج لإدخال البيانات
    }

    public function store(Request $request)
    {
    // التحقق من البيانات المدخلة
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
        'phone' => 'nullable|string|max:15',
    ]);

    // حفظ البيانات في قاعدة البيانات
    ContactUs::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
        'phone' => $request->input('phone'),
    ]);

    return redirect()->route('contact_us.create')->with('success', 'تم إرسال الرسالة بنجاح');
    }

}
