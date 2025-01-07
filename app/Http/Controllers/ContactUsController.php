<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUS;


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
    ContactUS::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
        'phone' => $request->input('phone'),
    ]);

    return redirect()->route('contact_us.create')->with('success', 'تم إرسال الرسالة بنجاح');
    }


    public function index()
    {
        $messages = ContactUS::all();
        return view('contactUs.list-contactUs',compact('messages'));
    }

    public function destroy($id)
    {
        $message = ContactUS::findOrFail($id);
        $message->delete(); // حذف الرسالة باستخدام Soft Delete

        // إرجاع استجابة بتنسيق JSON
        return response()->json(['success' => true]);
    }

    public function notifications()
    {
    // إحضار أحدث 5 رسائل من جدول contact_us
    $messages = ContactUS::latest()->take(5)->get();

    // تمرير الرسائل إلى الـ View
    return view('contactUs.notifications', compact('messages'));
    }

    public function Title()
    {
        return view('themes.contact', [
            'pageTitle' => 'Contact Us',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('master')],
                ['label' => 'Contact Us', 'url' => route('contact_us.create')]
            ]
        ]);
    }


    
}
