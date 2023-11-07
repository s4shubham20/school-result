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
                            <h5 class="mb-0 text-primary">Student Transfer Certificate</h5>
                        </div>
                        <a href="{{ route('student.index') }}" class="btn btn-primary"><i class="lni lni-eye"></i> View Records</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.certificate.store') }}" class="row" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}"/>
                            <input type="hidden" name="transferId" value="{{ $student->transfer_certificate->id ?? "" }}"/>
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label mb-0">Student Name<span class="text-danger fs-4">*</span></label>
                                <div class="input-group">
                                    <select name="title" id="title" class="custom-input @error('title') is-invalid @enderror">
                                        <option value="Mr." {{ old('title', $student->transfer_certificate->name_title ?? "") == "Mr."?"selected":"" }}>Mr.</option>
                                        <option value="Miss" {{ old('title', $student->transfer_certificate->name_title ?? "") == "Miss"?"selected":"" }}>Miss</option>
                                    </select>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name here!" value="{{ $student->name }}" disabled/>
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="admission_no" class="form-label mb-0">Admission No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('admission_no') is-invalid @enderror" name="admission_no" id="admission_no" placeholder="Enter admission no. here!" value="{{ $student->admission_no  }}" disabled/>
                                @error('admission_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="father_title" class="form-label mb-0">Father Name<span class="text-danger fs-4">*</span></label>
                                <div class="input-group">
                                    <select name="father_title" id="father_title" class="custom-input @error('father_title') is-invalid @enderror">
                                        <option value="Mr." {{ old('father_title',$student->transfer_certificate->fathername_title ?? "") == "Mr."?"selected":"" }}>Mr.</option>
                                        <option value="Late" {{ old('father_title',$student->transfer_certificate->fathername_title ?? "") == "Late"?"selected":"" }}>Late</option>
                                    </select>
                                    <input type="text" class="form-control" name="admission_no" id="admission_no" placeholder="Enter admission no. here!" value="{{ $student->father_name  }}" disabled/>
                                </div>
                                @error('father_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="mother_title" class="form-label mb-0">Mother Name<span class="text-danger fs-4">*</span></label>
                                <div class="input-group">
                                    <select name="mother_title" id="mother_title" class="custom-input @error('mother_title') is-invalid @enderror">
                                        <option value="Mrs." {{ old('mother_title',$student->transfer_certificate->mothername_title ?? "") == "Mrs."?"selected":"" }}>Mrs.</option>
                                        <option value="Late" {{ old('mother_title',$student->transfer_certificate->mothername_title ?? "") == "Late"?"selected":"" }}>Late</option>
                                    </select>
                                    <input type="text" class="form-control" name="admission_no" id="admission_no" placeholder="Enter admission no. here!" value="{{ $student->mother_name  }}" disabled/>
                                </div>
                                @error('father_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="register_no" class="form-label mb-0">Register No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('register_no') is-invalid @enderror" name="register_no" id="register_no" placeholder="Enter register no. here!" value="{{ $student->transfer_certificate->register_no ?? ""  }}"/>
                                @error('register_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="certificate_no" class="form-label mb-0">Certificate No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('certificate_no') is-invalid @enderror" name="certificate_no" id="certificate_no" placeholder="Enter student certificate no. here!" value="{{ old('certificate_no',$student->transfer_certificate->certificate_no ?? "") }}"/>
                                @error('certificate_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="caste" class="form-label mb-0">Caste<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('caste') is-invalid @enderror" name="caste" id="caste" placeholder="Enter caste here!" value="{{ old('caste' ,$student->transfer_certificate->caste ?? "") }}"/>
                                @error('caste')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="tahsil" class="form-label mb-0">Tahsil<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('tahsil') is-invalid @enderror" name="tahsil" id="tahsil" placeholder="Enter tahsil name here!" value="{{ old('tahsil', $student->transfer_certificate->tahsil ?? "") }}"/>
                                @error('tahsil')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="period_of_stay_in_state" class="form-label mb-0">Period of time stay in state<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('period_of_stay_in_state') is-invalid @enderror" name="period_of_stay_in_state" id="period_of_stay_in_state" placeholder="Enter period of time stay in state here!" value="{{ old('period_of_stay_in_state', $student->transfer_certificate->period_of_stay_in_state ?? "") }}"/>
                                @error('period_of_stay_in_state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="admission_date" class="form-label mb-0">Admission Date<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('admission_date') is-invalid @enderror" name="admission_date" id="admission_date" value="{{ old('admission_date', $student->transfer_certificate->admission_date ?? "") }}"/>
                                @error('admission_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="admission_regsiter_no" class="form-label mb-0">Admission Regsiter No<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('admission_regsiter_no') is-invalid @enderror" name="admission_regsiter_no" id="admission_regsiter_no" value="{{ old('admission_regsiter_no',$student->transfer_certificate->admission_regsiter_no ?? "") }}" placeholder="Enter admission regsiter no. here!"/>
                                @error('admission_regsiter_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="admission_last_date" class="form-label mb-0">Admission Last Date<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('admission_last_date') is-invalid @enderror" name="admission_last_date" id="admission_last_date" value="{{ old('admission_last_date', $student->transfer_certificate->admission_last_date ?? "") }}"/>
                                @error('admission_last_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="last_date_of_school" class="form-label mb-0">Last Date Of School<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('last_date_of_school') is-invalid @enderror" name="last_date_of_school" id="last_date_of_school" value="{{ old('last_date_of_school',$student->transfer_certificate->last_date_of_school ?? "") }}"/>
                                @error('last_date_of_school')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="leaving_date" class="form-label mb-0">Withdrawl Date Of School<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('leaving_date') is-invalid @enderror" name="leaving_date" id="leaving_date" value="{{ old('leaving_date',$student->transfer_certificate->leaving_date ?? "") }}"/>
                                @error('leaving_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="reason_for_leaving" class="form-label mb-0">Reason for leaving School<span class="text-danger fs-4">*</span></label>
                                <select name="reason_for_leaving" id="reason_for_leaving" class="form-select @error('reason_for_leaving') is-invalid @enderror">
                                    <option value="Unavoidable change of residence" {{ old('reason_for_leaving',$student->transfer_certificate->reason_for_leaving ?? "") == "Unavoidable change of residence" ? "selected":""}}>Unavoidable change of residence</option>
                                    <option value="Illness" {{ old('reason_for_leaving', $student->transfer_certificate->reason_for_leaving ?? "") == "Illness" ? "selected":"Illness"}}>Illness</option>
                                    <option value="Completion of School Course" {{ old('reason_for_leaving', $student->transfer_certificate->reason_for_leaving ?? "") == "Completion of School Course" ? "selected":""}}>Completion of School Course</option>
                                    <option value="Minor reason" {{ old('reason_for_leaving', $student->transfer_certificate->reason_for_leaving ?? "") == "Minor reason" ? "selected":""}}>Minor reason</option>
                                    <option value="Guardian option" {{ old('reason_for_leaving', $student->transfer_certificate->reason_for_leaving ?? "") == "Guardian option" ? "selected":""}}>Guardian option</option>
                                </select>
                                @error('reason_for_leaving')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="character" class="form-label mb-0">Character<span class="text-danger fs-4">*</span></label>
                                <select name="character" id="character" class="form-select @error('character') is-invalid @enderror">
                                    <option value="good" {{ old('character', $student->transfer_certificate->character ?? "") == "good" ? "selected":""}}>Good</option>
                                    <option value="not good" {{ old('character', $student->transfer_certificate->character ?? "") == "not good" ? "selected":""}}>Not Good</option>
                                </select>
                                @error('character')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="higher_examination" class="form-label mb-0">Name of the higher examination passed out<span class="text-danger fs-4">*</span></label>
                                <select class="form-select @error('higher_examination') is-invalid @enderror" name="higher_examination" id="higher_examination">
                                    <option value="1st" {{ old('higher_examination', $student->transfer_certificate->leaving_class ?? "") == "1st"?"selected":"" }}>1st</option>
                                    <option value="2nd" {{ old('higher_examination', $student->transfer_certificate->leaving_class ?? "") == "2nd"?"selected":"" }}>2nd</option>
                                    <option value="3rd" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "3rd"?"selected":"" }}>3rd</option>
                                    <option value="4th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "4th"?"selected":"" }}>4th</option>
                                    <option value="5th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "5th"?"selected":"" }}>5th</option>
                                    <option value="6th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "6th"?"selected":"" }}>6th</option>
                                    <option value="7th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "7th"?"selected":"" }}>7th</option>
                                    <option value="8th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "8th"?"selected":"" }}>8th</option>
                                    <option value="9th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "9th"?"selected":"" }}>9th</option>
                                    <option value="10th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "10th"?"selected":"" }}>10th</option>
                                    <option value="11th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "11th"?"selected":"" }}>11th</option>
                                    <option value="12th" {{ old('higher_examination', $student->transfer_certificate->higher_examination ?? "") == "12th"?"selected":"" }}>12th</option>
                                </select>
                                @error('higher_examination')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="form-lable mb-0" for="passed_out_date">Passed Out Date<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('passed_out_date') is-invalid @enderror" name="passed_out_date" id="passed_out_date" value="{{ old('passed_out_date',$student->transfer_certificate->passed_out_date ?? "") }}"/>
                                @error('passed_out_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="form-lable mb-0" for="language_of_student">Language Of Student<span class="text-danger fs-4">*</span></label>
                                <select class="form-select @error('language_of_student') is-invalid @enderror" name="language_of_student" id="language_of_student">
                                    <option value="Hindi" {{ old('language_of_student', $student->transfer_certificate->language_of_student ?? "") == "passed" ? "selected":"" }}>Hindi</option>
                                    <option value="English" {{ old('language_of_student', $student->transfer_certificate->language_of_student ?? "") == "passed" ? "selected":"" }}>English</option>
                                    <option value="Other" {{ old('language_of_student', $student->transfer_certificate->language_of_student ?? "") == "passed" ? "selected":"" }}>Other</option>

                                </select>
                                @error('language_of_student')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="form-lable mb-0" for="free_of_cost">Free Of Cost<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('free_of_cost') is-invalid @enderror" name="free_of_cost" id="free_of_cost" value="{{ old('free_of_cost',$student->transfer_certificate->free_of_cost ?? "") }}" placeholder="Enter free of cost here!"/>
                                @error('free_of_cost')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="form-lable mb-0" for="days_school_is_open">Number of days school is open<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('days_school_is_open') is-invalid @enderror" name="days_school_is_open" id="days_school_is_open" value="{{ old('days_school_is_open',$student->transfer_certificate->days_school_is_open ?? "") }}" placeholder="Enter number of days school is open here!"/>
                                @error('days_school_is_open')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="form-lable mb-0" for="illness_days">Number of illness days<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('illness_days') is-invalid @enderror" name="illness_days" id="illness_days" value="{{ old('illness_days',$student->transfer_certificate->illness_days ?? "") }}" placeholder="Enter Number of illness days here!"/>
                                @error('illness_days')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="form-lable mb-0" for="father_occupation">Student Father Occupation<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" name="father_occupation" id="father_occupation" value="{{ old('father_occupation',$student->transfer_certificate->father_occupation ?? "") }}" placeholder="Enter student father occupation here!"/>
                                @error('father_occupation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-3">
                                <button class="btn btn-primary"><i class="bx bx-check-circle"></i>Submit</button>
                                @isset($student->transfer_certificate->id)
                                    <a href="{{ route('student.certificate.view', Crypt::encrypt($student->id)) }}" class="btn btn-success ms-2"><i class="bx bx-download"></i>Download Transfer Certificate</a>
                                @endisset
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
