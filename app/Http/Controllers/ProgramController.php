<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Program;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProgramController extends Controller
{
    public function create()
    {
        return view('program.add-program');
    }

    public function store(Request $request)
    {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|string',
                'seats' => 'required|integer',
                'start_date' => 'required|date',
                'lectures_count' => 'required|integer',
                'hours_count' => 'required|integer',
                'teacher_name' => 'required|string|max:255',
                'teacher_specialty' => 'required|string|max:255',
                'teacher_image' => 'required|image|mimes:jpg,jpeg,png',//size image
                'program_image' => 'required|image|mimes:jpg,jpeg,png',
            ]);

                // رفع الصور
                $teacherImage = $request->file('teacher_image')->store('public/teachers');
                $programImage = $request->file('program_image')->store('public/programs');

                // حفظ البرنامج
                Program::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'price' => $request->price,
                    'seats' => $request->seats,
                    'start_date' => $request->start_date,
                    'lectures_count' => $request->lectures_count,
                    'hours_count' => $request->hours_count,
                    'teacher_name' => $request->teacher_name,
                    'teacher_specialty' => $request->teacher_specialty,
                    'teacher_image' => $teacherImage,
                    'program_image' => $programImage,
                ]);
                Toastr::success('Has been add successfully :)','Success');
                return redirect()->route('program/add');
        
    }

    public function index()
    {
        $programs = Program::all();
        return view('program.list-program',compact('programs'));
    }

    public function indexShow ()
    {
        $pageTitle='Program';

        $pro = Program::all();
        return view('themes.program',compact(['pro','pageTitle']));
    }

    public function destroy($id)
{
    try {
        $program = Program::findOrFail($id); 
        $program->delete(); // الحذف الناعم
        Toastr::success('Deleted record successfully :)', 'Success');
        return redirect()->route('program/list');
    } catch (\Exception $e) {
        Toastr::error('Deleted record fail :) ' . $e->getMessage(), 'Error');
        return redirect()->route('program/list');
    }
}


    public function programEdit($id)
    {
        $ProgramEdit = Program::where('id',$id)->first();
        return view('program.edit-program',compact('ProgramEdit'));
    }

    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            Program::where('id',$request->id)->delete();
            DB::commit();
            Toastr::success('Deleted record successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Deleted record fail :)','Error');
            return redirect()->back();
        }
    }

    

}
