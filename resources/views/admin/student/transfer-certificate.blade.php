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
                                <label for="reference_no" class="form-label mb-0">Registration No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('reference_no') is-invalid @enderror" name="reference_no" id="reference_no" placeholder="Enter student registration no. here!" value="{{ old('reference_no',$student->transfer_certificate->reference_no ?? "") }}"/>
                                @error('reference_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="town" class="form-label mb-0">Village/Town<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" id="town" placeholder="Enter village/town name here!" value="{{ old('town' ,$student->transfer_certificate->town ?? "") }}"/>
                                @error('town')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="district" class="form-label mb-0">District<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" id="district" placeholder="Enter district name here!" value="{{ old('district', $student->transfer_certificate->district ?? "") }}"/>
                                @error('district')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="state" class="form-label mb-0">State<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" id="state" placeholder="Enter state name here!" value="{{ old('state', $student->transfer_certificate->state ?? "") }}"/>
                                @error('state')
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
                                <label for="leaving_date" class="form-label mb-0">Leaving Date<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control @error('leaving_date') is-invalid @enderror" name="leaving_date" id="leaving_date" value="{{ old('leaving_date',$student->transfer_certificate->leaving_date ?? "") }}"/>
                                @error('leaving_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="leaving_class" class="form-label mb-0">On the date of leaving student was studying in class<span class="text-danger fs-4">*</span></label>
                                <select class="form-select @error('leaving_class') is-invalid @enderror" name="leaving_class" id="leaving_class">
                                    <option value="1st" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "1st"?"selected":"" }}>1st</option>
                                    <option value="2nd" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "2nd"?"selected":"" }}>2nd</option>
                                    <option value="3rd" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "3rd"?"selected":"" }}>3rd</option>
                                    <option value="4th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "4th"?"selected":"" }}>4th</option>
                                    <option value="5th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "5th"?"selected":"" }}>5th</option>
                                    <option value="6th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "6th"?"selected":"" }}>6th</option>
                                    <option value="7th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "7th"?"selected":"" }}>7th</option>
                                    <option value="8th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "8th"?"selected":"" }}>8th</option>
                                    <option value="9th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "9th"?"selected":"" }}>9th</option>
                                    <option value="10th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "10th"?"selected":"" }}>10th</option>
                                    <option value="11th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "11th"?"selected":"" }}>11th</option>
                                    <option value="12th" {{ old('leaving_class', $student->transfer_certificate->leaving_class ?? "") == "12th"?"selected":"" }}>12th</option>
                                </select>
                                @error('leaving_class')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status" class="form-label mb-0">Pass/Failed Status<span class="text-danger fs-4">*</span></label>
                                <select name="status" id="status" class="form-select">
                                    <option value="passed" {{ old('status', $student->transfer_certificate->status ?? "") == "passed" ? "selected":"" }}>Passed</option>
                                    <option value="failed" {{ old('status', $student->transfer_certificate->status ?? "") == "failed" ? "selected":"" }}>Failed</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="examinaiton_month" class="form-label mb-0">Examination Month<span class="text-danger fs-4">*</span></label>
                                <select name="examinaiton_month" id="examinaiton_month" class="form-select @error('examinaiton_month') is-invalid @enderror">
                                    <option value="Jan" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Jan" ? "selected":"" }}>Jan</option>
                                    <option value="Feb" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Feb" ? "selected":"" }}>Feb</option>
                                    <option value="Mar" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Mar" ? "selected":"" }}>Mar</option>
                                    <option value="Apr" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Apr" ? "selected":"" }}>Apr</option>
                                    <option value="May" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "May" ? "selected":"" }}>May</option>
                                    <option value="Jun" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Jun" ? "selected":"" }}>Jun</option>
                                    <option value="Jul" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Jul" ? "selected":"" }}>Jul</option>
                                    <option value="Aug" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Aug" ? "selected":"" }}>Aug</option>
                                    <option value="Sep" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Sep" ? "selected":"" }}>Sep</option>
                                    <option value="Oct" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Oct" ? "selected":"" }}>Oct</option>
                                    <option value="Nov" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Nov" ? "selected":"" }}>Nov</option>
                                    <option value="Dec" {{ old('examination_month', $student->transfer_certificate->examination_month ?? "") == "Dec" ? "selected":"" }}>Dec</option>
                                </select>
                                @error('examinaiton_month')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="examinaiton_year" class="form-label mb-0">Examination Year<span class="text-danger fs-4">*</span></label>
                                <input type="text" name="examinaiton_year" id="examinaiton_year" class="form-control @error('examinaiton_year') is-invalid @enderror" placeholder="Enter last examination year like 2023 here!" value="{{ old('examinaiton_year', $student->transfer_certificate->examinaiton_year ?? "") }}"/>
                                @error('examinaiton_year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="character" class="form-label mb-0">Overall Character<span class="text-danger fs-4">*</span></label>
                                <select name="character" id="character" class="form-select @error('character') is-invalid @enderror">
                                    <option value="satifactory" {{ old('character', $student->transfer_certificate->character ?? "") == "satifactory" ? "selected":""}}>Satifactory</option>
                                    <option value="not satifactory" {{ old('character', $student->transfer_certificate->character ?? "") == "not satifactory" ? "selected":""}}>Not Satifactory</option>
                                </select>
                                @error('character')
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
