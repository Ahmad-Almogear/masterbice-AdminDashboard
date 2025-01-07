@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add guardians</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="teachers.html">guardians</a></li>
                            <li class="breadcrumb-item active">Add Teachers</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach


                            <form action="{{ route('guardians/create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Basic Details</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Full Name <span class="login-danger">*</span></label>
                                            <select
                                                class="select select2s-hidden-accessible @error('full_name') is-invalid @enderror"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" id="full_name"
                                                name="student_id">
                                                <option selected disabled>-- Select Name --</option>
                                                @foreach ($studentList as $key => $names)
                                                    <option value="{{ $names->first_name }}"
                                                        data-teacher_id={{ $names->user_id }}
                                                        {{ old('first_name') == $names->first_name ? 'selected' : '' }}>
                                                        {{ $names->first_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Student ID <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="id" id="teacher_id"
                                            placeholder="Teacher ID" value="{{ old('student_id ') }}" readonly>
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                                            <option selected disabled>Select Gender</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? "selected" :"Female"}}>Female</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? "selected" :""}}>Male</option>
                                            <option value="Others" {{ old('gender') == 'Others' ? "selected" :""}}>Others</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}


                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>first_name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                            name="first_name" placeholder="Enter first_name"
                                            value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>last_name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                                            name="last_name" placeholder="last_name" value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date Of Birth <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" placeholder="DD-MM-YYYY" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <h5 class="form-title"><span>relationship</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>relationship <span class="login-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('relationship') is-invalid @enderror"
                                            name="relationship" placeholder="Enter relationship"
                                            value="{{ old('relationship') }}">
                                        @error('relationship')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Phone </label>
                                        <input class="form-control @error('phone_number') is-invalid @enderror"
                                            type="text"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                            name="phone_number" placeholder="Enter Phone Number"
                                            value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>City <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" placeholder="Enter City" value="{{ old('city') }}">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>State <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" placeholder="Enter State" value="{{ old('state') }}">
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>address<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" placeholder="Enter address" value="{{ old('address') }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>email <span class="login-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter email" value="{{ old('email') }}">
                                        @error('email')
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
@section('script')
    <script>
        // select auto teacher id
        $('#full_name').on('change', function() {
            $('#teacher_id').val($(this).find(':selected').data('teacher_id'));
        });
    </script>
@endsection
@endsection
