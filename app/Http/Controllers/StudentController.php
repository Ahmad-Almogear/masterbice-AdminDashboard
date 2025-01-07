<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /** index page student list */
    public function student()
    {
        $studentList = Student::all();
        return view('student.student', compact('studentList'));
    }

    /** index page student grid */
    public function studentGrid()
    {
        $studentList = Student::all();
        return view('student.student-grid', compact('studentList'));
    }

    /** student add page */
    public function studentAdd()
    {
        $DepartmentList = Department::all();
        return view('student.add-student', compact('DepartmentList'));
    }

    /** student save record */
    public function studentSave(Request $request)
    {
        // dd($request);

        $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'gender'        => 'required|not_in:0',
            'date_of_birth' => 'required|string',
            'roll'          => 'required|string',
            'blood_group'   => 'required|string',
            'religion'      => 'required|string',
            'email'         => 'required|email',
            'class'         => 'required|string',
            'section'       => 'required|string',
            'admission_id'  => 'required|string',
            'phone_number'  => 'required',
            'upload'        => 'required',
            'department_id' => 'required'

        ]);

        DB::beginTransaction();
        try {

            $upload_file = rand() . '.' . $request->upload->extension();
            $request->upload->move(storage_path('app/public/student-photos/'), $upload_file);
            $student = new Student;

            $student->user_id      = Auth::user()->id;
            $student->first_name   = $request->first_name;
            $student->last_name    = $request->last_name;
            $student->department_id = $request->department_id;
            $student->gender       = $request->gender;
            $student->date_of_birth = $request->date_of_birth;
            $student->roll         = $request->roll;
            $student->blood_group  = $request->blood_group;
            $student->religion     = $request->religion;
            $student->email        = $request->email;
            $student->class        = $request->class;
            $student->section      = $request->section;
            $student->admission_id = $request->admission_id;
            $student->phone_number = $request->phone_number;
            $student->upload       = $upload_file;
            $student->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();


            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Add new student  :)', 'Error');
            return redirect()->back();
        }
    }

    /** view for edit student */
    public function studentEdit($id)
    {
        $studentEdit = Student::where('id', $id)->first();
        return view('student.edit-student', compact('studentEdit'));
    }

    /** update record */
    public function studentUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            if (!empty($request->upload)) {
                unlink(storage_path('app/public/student-photos/' . $request->image_hidden));
                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(storage_path('app/public/student-photos/'), $upload_file);
            } else {
                $upload_file = $request->image_hidden;
            }

            $updateRecord = [
                'upload' => $upload_file,
            ];
            Student::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update student  :)', 'Error');
            return redirect()->back();
        }
    }

    /** student delete */
    public function studentDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            if (!empty($request->user_id)) {
                Student::destroy($request->user_id);
                unlink(storage_path('app/public/student-photos/' . $request->avatar));
                DB::commit();
                Toastr::success('Student deleted successfully :)', 'Success');
                return redirect()->back();
            }
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Student deleted fail :)', 'Error');
            return redirect()->back();
        }
    }

    /** student profile page */
    public function studentProfile($id)
    {
        $studentProfile = Student::where('id', $id)->first();
        return view('student.student-profile', compact('studentProfile'));
    }


    public function show($id)
    {
        $student = Student::with('grade.Subject')->findOrFail($id);
        return view('student.show', compact('student'));
    }

    public function getDataList(Request $request)
    {
        $draw            = $request->get('draw');
        $start           = $request->get("start");
        $rowPerPage      = $request->get("length"); // total number of rows per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr  = $request->get('columns');
        $order_arr       = $request->get('order');
        $search_arr      = $request->get('search');

        $columnIndex     = $columnIndex_arr[0]['column']; // Column index
        $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue     = $search_arr['value']; // Search value

        // العمل مع جدول الطلاب (Student) وانضمام مع جدول الأقسام (Department)
        $students = Student::join('departments', 'students.department_id', '=', 'departments.id')
            ->select('students.*', 'departments.department_name') // تحديد الحقول المطلوبة
            ->with('department'); // لجلب البيانات المتعلقة بالقسم عبر الـ relationship

        // إجمالي عدد السجلات
        $totalRecords = $students->count();

        // إجمالي عدد السجلات التي تتوافق مع الفلتر (البحث)
        $totalRecordsWithFilter = $students->where(function ($query) use ($searchValue) {
            $query->where('students.first_name', 'like', '%' . $searchValue . '%');
            $query->orWhere('students.last_name', 'like', '%' . $searchValue . '%');
            $query->orWhere('students.roll', 'like', '%' . $searchValue . '%');
            $query->orWhere('students.email', 'like', '%' . $searchValue . '%');
            $query->orWhere('students.gender', 'like', '%' . $searchValue . '%');
            $query->orWhere('students.date_of_birth', 'like', '%' . $searchValue . '%');
            $query->orWhere('students.department_id', 'like', '%' . $searchValue . '%');  // البحث حسب department_id
            $query->orWhere('departments.department_name', 'like', '%' . $searchValue . '%');  // البحث حسب اسم القسم
        })->count();

        // جلب السجلات مع ترتيب الأعمدة
        $records = $students->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('students.first_name', 'like', '%' . $searchValue . '%');
                $query->orWhere('students.last_name', 'like', '%' . $searchValue . '%');
                $query->orWhere('students.roll', 'like', '%' . $searchValue . '%');
                $query->orWhere('students.email', 'like', '%' . $searchValue . '%');
                $query->orWhere('students.gender', 'like', '%' . $searchValue . '%');
                $query->orWhere('students.date_of_birth', 'like', '%' . $searchValue . '%');
                $query->orWhere('students.department_id', 'like', '%' . $searchValue . '%');
                $query->orWhere('departments.department_name', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowPerPage)
            ->get();

        $data_arr = [];

        foreach ($records as $key => $record) {
            // تعديل التنسيق ليكون مناسبًا للطلاب
            $modify = '
            <td class="text-end"> 
                <div class="actions">
                    <a href="' . url('student/edit/' . $record->user_id) . '" class="btn btn-sm bg-danger-light">
                        <i class="far fa-edit me-2"></i>
                    </a>
                    <a class="btn btn-sm bg-danger-light delete student_id" data-bs-toggle="modal" data-student_id="' . $record->user_id . '" data-bs-target="#studentUser">
                         <i class="fe fe-trash-2"></i>
                    </a>
                </div>
            </td>
        ';

            $data_arr[] = [
                "user_id"           => $record->user_id,  // تأكد من إضافة الـ ID
                "first_name"        => $record->first_name,
                "last_name"         => $record->last_name,
                "roll"              => $record->roll,
                "email"             => $record->email,
                "gender"            => $record->gender,
                "date_of_birth"     => $record->date_of_birth,
                "department_name"   => $record->department_name,  // إضافة اسم القسم
                "modify"            => $modify,
            ];
        }

        // استجابة DataTables
        $response = [
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData"               => $data_arr
        ];

        return response()->json($response);
    }
}
