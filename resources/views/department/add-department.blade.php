
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add Department</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="departments.html">Department</a></li>
                            <li class="breadcrumb-item active">Add Department</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('department/save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Department Details</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Department Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="department_name">
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Head of Department <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="head_of_department">
                                        </div>
                                    </div> --}}

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>head of department<span class="login-danger">*</span></label>
                                            <select
                                                class="select select2s-hidden-accessible @error('full_name') is-invalid @enderror"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" id="full_name"
                                                name="head_of_department">
                                                <option selected disabled>-- Select Name --</option>
                                                @foreach ($TeacherList as $key => $names)
                                                    <option value="{{ $names->full_name }}"
                                                        data-teacher_id={{ $names->user_id }}
                                                        {{ old('full_name') == $names->full_name ? 'selected' : '' }}>
                                                        {{ $names->full_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Department Start Date <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text" name="department_start_date" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>No of Students <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="no_of_students">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        // select auto teacher id
        $('#full_name').on('change', function() {
            $('#teacher_id').val($(this).find(':selected').data('teacher_id'));
        });
    </script>
@endsection
@endsection
