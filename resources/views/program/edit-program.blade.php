
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Program</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teachers.html">Programs</a></li>
                        <li class="breadcrumb-item active">Add Programs</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('program/add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Program Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>title <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter title" value="{{ ('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>description <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description" value="{{ ('description') }}">
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>price <span class="login-danger">*</span></label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Enter price" value="{{ ('price') }}">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>seats <span class="login-danger">*</span></label>
                                        <input type="number" class="form-control  @error('seats') is-invalid @enderror" name="seats" placeholder="seats" value="{{ ('seats') }}">
                                        @error('seats')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>lectures count <span class="login-danger">*</span></label>
                                        <input type="number" class="form-control  @error('lectures count') is-invalid @enderror" name="lectures_count" placeholder="lectures Count" value="{{ ('lectures_count') }}">
                                        @error('lectures count')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>hours Count <span class="login-danger">*</span></label>
                                        <input type="number" class="form-control  @error('hours Count') is-invalid @enderror" name="hours_count" placeholder="hours Count" value="{{ ('hours_count') }}">
                                        @error('hours Count')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>program image <span class="login-danger">*</span></label>
                                        <input type="file" class="form-control  @error('seats') is-invalid @enderror" name="program_image" placeholder="program image" value="{{ ('program_image') }}">
                                        @error('program_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>start date <span class="login-danger">*</span></label>
                                        <input type="date" class="form-control" name="start_date">
                                        @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h5 class="form-title"><span>Teacher</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>teacher Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('teacher_name') is-invalid @enderror" name="teacher_name" placeholder="Enter teacher Name" value="{{ ('teacher_name') }}">
                                        @error('teacher_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Phone </label>
                                        <input class="form-control @error('phone_number') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone_number" placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>teacher Specialty <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('teacher Specialty') is-invalid @enderror" name="teacher_specialty" placeholder="Enter teacher Specialty" value="{{ ('teacher_specialty') }}">
                                        @error('teacher Specialty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>teacher Image <span class="login-danger">*</span></label>
                                        <input type="file" class="form-control @error('teacher Image') is-invalid @enderror" name="teacher_image" placeholder="Enter teacher Image" value="{{ ('teacher_image') }}">
                                        @error('teacher Image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
@endsection
