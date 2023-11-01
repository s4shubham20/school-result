@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-header border-4 d-flex justify-content-between my-2">
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-user me-1 font-22 text-primary"></i>
                            <h5 class="mb-0 text-primary">Edit Student Details</h5>
                        </div>
                        <a href="{{ route('student.index') }}" class="btn btn-primary"><i class="lni lni-eye"></i> View Records</a>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" method="post" action="{{ route('student.update', Crypt::encrypt($student->id)) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6">
                                <label for="name" class="form-label">Student Name<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name here!" value="{{ old('name', $student->name) }}"/>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="admission_no" class="form-label">Admission No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('admission_no') is-invalid @enderror" name="admission_no" id="admission_no" placeholder="Enter admission no. here!" value="{{ old('admission_no', $student->admission_no)  }}"/>
                                @error('admission_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="class" class="form-label">Student Class<span class="text-danger fs-4">*</span></label>
                                <select name="class" id="class" class="form-select @error('class') is-invalid @enderror">
                                    <option value="1" {{ old('class', $student->class) == 1 ? "selected":"" }}>1st</option>
                                    <option value="2" {{ old('class', $student->class) == 2 ? "selected":"" }}>2nd</option>
                                    <option value="3" {{ old('class', $student->class) == 3 ? "selected":"" }}>3rd</option>
                                    <option value="4" {{ old('class', $student->class) == 4 ? "selected":"" }}>4th</option>
                                    <option value="5" {{ old('class', $student->class) == 5 ? "selected":"" }}>5th</option>
                                    <option value="6" {{ old('class', $student->class) == 6 ? "selected":"" }}>6th</option>
                                    <option value="7" {{ old('class', $student->class) == 7 ? "selected":"" }}>7th</option>
                                    <option value="8" {{ old('class', $student->class) == 8 ? "selected":"" }}>8th</option>
                                    <option value="9" {{ old('class', $student->class) == 9 ? "selected":"" }}>9th</option>
                                    <option value="10" {{ old('class', $student->class) == 10 ? "selected":"" }}>10th</option>
                                    <option value="11" {{ old('class', $student->class) == 11 ? "selected":"" }}>11th</option>
                                    <option value="12" {{ old('class', $student->class) == 12 ? "selected":"" }}>12th</option>
                                </select>
                                @error('class')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="roll_no" class="form-label">Student Roll No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('roll_no') is-invalid @enderror" name="roll_no" id="roll_no" placeholder="Enter roll no. here!" value="{{ old('roll_no',$student->roll_no) }}"/>
                                @error('roll_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="father_name" class="form-label">Father Name<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" placeholder="Enter father name here!" value="{{ old('father_name', $student->father_name) }}"/>
                                @error('father_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="mother_name" class="form-label">Mother Name<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" placeholder="Enter mother name here!" value="{{ old('mother_name',$student->mother_name) }}"/>
                                @error('mother_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="dob" class="form-label">Date Of Birth<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob',$student->dob) }}"/>
                                @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="course_fee" class="form-label">Course Fee<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('course_fee') is-invalid @enderror" id="course_fee" name="course_fee" value="{{ old('course_fee', $student->course_fee) }}" placeholder="Enter course fee of student!"/>
                                @error('course_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('storage/student-image/'.$student->profile_pic) }}" alt="{{ $student->profile_pic }}" width="50" height="50"/>
                                <label for="profile_pic" class="form-label">Student Photograph<span class="text-danger fs-4">*</span></label>
                                <input type="file" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" name="profile_pic"/>
                                @error('profile_pic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address<span class="text-danger fs-4">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter address here!">{{ old('address', $student->address) }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid col-md-4 m-auto mt-3">
                                <button class="btn btn-primary"><i class="bx bx-check-circle"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
