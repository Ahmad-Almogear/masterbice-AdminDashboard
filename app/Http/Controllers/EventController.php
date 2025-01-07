<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventController extends Controller
{
public function create()
{
   return view('Event.add-event');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'event_date' => 'required|string',
        'event_time' => 'required|date_format:H:i',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // التحقق من الصورة
    ]);

    $imagePath = $request->file('image')->store('public/teachers');

    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'event_date' => $request->event_date,
        'event_time' => $request->event_time,
        'price' => $request->price,
        'image' => $imagePath,
    ]);

    return redirect()->route('event/add')->with('success', 'Event added successfully!');
}

public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('event.edit', compact('event'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'event_date' => 'required|string',
        'event_time' => 'required|date_format:H:i',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // التحقق من الصورة
    ]);

    $event = Event::findOrFail($id);

    $imagePath = $event->image;
    if ($request->hasFile('image')) {
        // حذف الصورة القديمة إذا كانت موجودة
        if ($event->image && file_exists(public_path('storage/' . $event->image))) {
            unlink(public_path('storage/' . $event->image));
        }

        // تخزين الصورة الجديدة
        $imagePath = $request->file('image')->store('images/events', 'public');
    }

    $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'event_date' => $request->event_date,
        'event_time' => $request->event_time,
        'price' => $request->price,
        'image' => $imagePath,
    ]);

    return redirect()->route('event/add')->with('success', 'Event updated successfully!');
}

public function index()
{
    $events = Event::all();
    return view('Event.list-event',compact('events'));
}

public function indexshow()
{
    $pageTitle='event';
    $events = Event::all();
    return view('themes.event',compact(['events','pageTitle']));
}


public function register(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'children_count' => 'required|integer',
            'child_name' => 'required|string|max:255',
            'event_id' => 'required|exists:events,id', // تأكد من أن الفعالية موجودة في قاعدة البيانات

        ]);

        // معالجة البيانات (مثلاً حفظها في قاعدة البيانات أو إرسال بريد إلكتروني)
        // يمكنك هنا حفظ التسجيل في قاعدة البيانات أو القيام بأي عملية أخرى.

        // على سبيل المثال:
        EventRegistration::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'children_count' => $request->children_count,
            'child_name' => $request->child_name,
            'event_id' => $request->event_id, // أضف الفعالية هنا

        ]);

        // إرجاع رد عند النجاح
        return back()->with('success', 'تم التسجيل بنجاح!');
    }

    public function registerShow()
    {
        // جلب جميع التسجيلات مع بيانات الفعالية المرتبطة بها
        $registrations = EventRegistration::with('event')->get();

        return view('Event.list-event_registrations', compact('registrations'));
    }

    public function Title()
    {
        return view('themes.event', [
            'pageTitle' => 'Event',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('master')],
                ['label' => 'Event', 'url' => route('event.title')]
            ]
        ]);
    }

    public function destroy($id)
    {
        try {
            $program = Event::findOrFail($id); // تعريف المتغير أولاً
            $program->delete(); // الحذف الناعم
            Toastr::success('Deleted record successfully :)', 'Success');
            return redirect()->route('program/list');
        } catch (\Exception $e) {
            Toastr::error('Deleted record fail :) ' . $e->getMessage(), 'Error');
            return redirect()->route('program/list');
        }
    }



}
