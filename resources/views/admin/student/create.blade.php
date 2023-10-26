@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-header d-flex justify-content-between my-2 border-4">
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-user me-1 font-22 text-primary"></i>
                            <h5 class="mb-0 text-primary">Student Registration</h5>
                        </div>
                        <a href="{{ route('student.index') }}" class="btn btn-primary"><i class="lni lni-eye"></i> View Records</a>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" method="post" action="{{ route('student.store') }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="name" class="form-label">Student Name<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name here!" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="admission_no" class="form-label">Admission No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('admission_no') is-invalid @enderror" name="admission_no" id="admission_no" placeholder="Enter admission no. here!" value="{{ old('admission_no')  }}"/>
                                @error('admission_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="class" class="form-label">Student Class<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('class') is-invalid @enderror" name="class" id="class" placeholder="Enter class here!" value="{{ old('class') }}"/>
                                @error('class')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="roll_no" class="form-label">Student Roll No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('roll_no') is-invalid @enderror" name="roll_no" id="roll_no" placeholder="Enter roll no. here!" value="{{ old('roll_no') }}"/>
                                @error('roll_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="father_name" class="form-label">Father Name<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" placeholder="Enter father name here!" value="{{ old('father_name') }}"/>
                                @error('father_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="mother_name" class="form-label">Mother Name<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" placeholder="Enter mother name here!" value="{{ old('mother_name') }}"/>
                                @error('mother_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date Of Birth<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}"/>
                                @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="course_fee" class="form-label">Course Fee<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('course_fee') is-invalid @enderror" id="course_fee" name="course_fee" value="{{ old('course_fee') }}" placeholder="Enter course fee of student!"/>
                                @error('course_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address<span class="text-danger fs-4">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter address here!">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid col-md-6 m-auto mt-3">
                                <button class="btn btn-success"><i class="bx bx-check-circle"></i>Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
