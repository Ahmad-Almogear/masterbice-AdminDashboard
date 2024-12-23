<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function store (Request $request)
    {

        $request->validate([
        'student_user_id' => 'required|exists:students,id',
        'teacher_user_id' => 'required|exists:teachers,id',
        'subject_id'=> 'required|exists:students,id',
        'grade' => 'required|integer|min:50|max:100'
        ]);

        Grade::create($request->all());
        return redirect()->back();

     }
}
