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
                            <h5 class="mb-0 text-primary">{{ $student->name }} Details</h5>
                        </div>
                        <a href="{{ route('student.index') }}" class="btn btn-primary"><i class="lni lni-eye"></i> View Records</a>
                    </div>
                    <div class="card-body">
                        <div class="card border-top border-0 border-4 border-danger">
                            <div class="card-body">
                                <div>
                                    <h5 class="text-center text-info opacity-100 fw-bold">असतो मा सदगमय || तमसो मा ज्योतिर्गमय ||</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 d-flex align-items-end">
                                        <h6 class="text-info opacity-100 mb-0">College Code:{{ $student->school_code }}</h6>
                                    </div>
                                    <div class="col-md-7 d-flex justify-content-between align-items-center">
                                        <div>
                                            <img src="{{ asset('storage/result-icon/result-icon.png') }}" class="img-fluid"/>
                                        </div>
                                        <div class="border border-2 rounded-1 p-1">
                                            @if (isset($student->profile_pic))
                                                <img src="{{ asset("storage/student-image/$student->profile_pic") }}" alt="{{ $student->profile_pic }}" width="100" height="100">
                                            @else
                                                <img src="{{ asset("storage/student-image/dummy-profile.png") }}" alt="dummy-profile" width="100" height="100">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h2 class="text-uppercase text-info opacity-100">{{ $student->school_name }}</h2>
                                    <h2 class="text-uppercase h3 text-info opacity-100">Kursinda Gotani Kunda Praptapgarh U.P. 230202</h2>
                                </div>
                                <div>
                                    <hr class="fs-4 mb-1 border-2 text-info opacity-75">
                                    <hr class="fs-4 m-0 mb-1 border-3 text-info opacity-100">
                                    <h3 class="text-uppercase mb-0 text-center text-info opacity-100">Progress Report Session 2023-2024</h3>
                                    <hr class="fs-4 mt-0 mb-1 border-2 text-info opacity-75">
                                </div>
                                <div class="row my-3">
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->name }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Father Name</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->father_name }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mother Name</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->mother_name }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->address }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Class</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->class }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Admission No.</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->admission_no }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>D.O.B</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->dob }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Roll No.</label>
                                            </div>
                                            <div class="col-md-1">
                                                <span>:</span>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{ $student->roll_no }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <form action="{{ route('result.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ $student->id }}"/>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>PA 1</th>
                                                    <th>SA 1</th>
                                                    <th>PA 2</th>
                                                    <th>SA 2</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($subjects as $key => $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->subject_name }}
                                                        <input type="hidden" name="subject_id[]" value="{{ $item->id }}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="periodic_test1[]" onchange="TotalMarks('');" class="form-control periodicTest1 @error('periodic_test1.'.$key) is-invalid @enderror" value="{{ old('periodic_test1.'.$key,$mark[$key]->periodic_test1 ?? "") }}"/>
                                                        @error('periodic_test1.'.$key)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="semester1[]" onchange="TotalMarks('');" class="form-control totalMarks sem1 @error('semester1.'.$key) is-invalid @enderror" value="{{ old('semester1.'.$key,$mark[$key]->semester1 ?? "") }}"/>
                                                        @error('semester1.'.$key)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="periodic_test2[]" onchange="TotalMarks('');" class="form-control periodicTest2  @error('periodic_test2.'.$key) is-invalid @enderror" value="{{ old('periodic_test2.'.$key,$mark[$key]->periodic_test2 ?? "") }}"/>
                                                        @error('periodic_test2.'.$key)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="semester2[]" onchange="TotalMarks('');"  class="form-control totalMarks sem2 @error('semester2.'.$key) is-invalid @enderror" value="{{ old('semester2.'.$key,$mark[$key]->semester2  ?? "") }}"/>
                                                        @error('semester2.'.$key)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text"  class="form-control totalnum" disabled/></td>
                                                </tr>
                                                @endforeach
                                                <tr class="fw-bold">
                                                    <td class="pe-3">Grand Total</td>
                                                    <td id="periodicTest_1" class="fw-bold"></td>
                                                    <td id="semster1"></td>
                                                    <td id="periodicTest_2"></td>
                                                    <td id="semster2"></td>
                                                    <td class="ps-3" id="grandTotal"></td>
                                                    <input type="hidden" name="totalmarks" id="total_Marks"/>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row my-5">
                                            <div class="col-md-6 mb-2">
                                                <label for="attendance" class="form-label">Attendance<span class="text-danger fs-4">*</span></label>
                                                <input type="text" class="form-control @error('attendance') is-invalid @enderror" name="attendance" id="attendance" placeholder="Enter student attendance here!" value="{{ old('attendance', $student->attendance) }}"/>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="sports_cultural_activities" class="form-label">Sports & Cultural Activities<span class="text-danger fs-4">*</span></label>
                                                <input type="text" class="form-control @error('sports_cultural_activities') is-invalid @enderror" name="sports_cultural_activities" id="sports_cultural_activities" placeholder="Enter sports & sultural activities here!" value="{{ old('sports_cultural_activities', $student->sports_cultural_activities) }}"/>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="punctual_activities" class="form-label">Punctual Activities<span class="text-danger fs-4">*</span></label>
                                                <input type="text" class="form-control @error('punctual_activities') is-invalid @enderror" name="punctual_activities" id="punctual_activities" placeholder="Enter punctual activities here!" value="{{ old('punctual_activities', $student->punctual_activities) }}"/>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="holiday_assignment" class="form-label">Holiday Assignment<span class="text-danger fs-4">*</span></label>
                                                <input type="text" class="form-control @error('holiday_assignment') is-invalid @enderror" name="holiday_assignment" id="holiday_assignment" placeholder="Enter holiday assignment here!" value="{{ old('holiday_assignment', $student->holiday_assignment) }}"/>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="rank_in_class" class="form-label">Rank In Class<span class="text-danger fs-4">*</span></label>
                                                <input type="text" class="form-control @error('rank_in_class') is-invalid @enderror" name="rank_in_class" id="rank_in_class" value="{{old('rank_in_class', $student->rank_in_class)}}" placeholder="Enter rank in class here!"/>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="result_status" class="form-label">Result Status(Pass Or Fail)<span class="text-danger fs-4">*</span></label>
                                                <select class="form-control @error('result_status') is-invalid @enderror" name="result_status" id="result_status">
                                                    <option value="Passed" {{ old('result_status', $student->result_status) == "Passed" ? "selected":"" }}>Passed</option>
                                                    <option value="Fail" {{ old('result_status', $student->result_status) == "Fail" ? "selected":"" }}>Fail</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="remarks" class="form-label">Remarks<span class="text-danger fs-4">*</span></label>
                                                <textarea name="remarks" id="remarks" class="form-control" placeholder="Enter remarks here!">{{ old('remarks',$student->remarks) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="d-grid col-3">
                                                <button class="btn btn-success"><i class="bx bx-check-circle"></i>Save</button>
                                            </div>
                                            <div class="d-grid col-3 ms-3">
                                                @isset($mark[0])
                                                <a href="{{ route('print.result',Crypt::encrypt($student->id)) }}" class="btn btn-primary"><i class="lni lni-printer"></i>View Result</a>
                                                @endisset
                                            </div>
                                            <div class="d-grid col-3 ms-3">
                                                <a class="btn btn-warning fw-bold" href="{{ route('student.indentity.card', Crypt::encrypt($student->id)) }}">Generate ID Card</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
function TotalMarks() {
    let totalMarks = document.querySelectorAll(".sem1");
    let totalMarks2 = document.querySelectorAll(".sem2");
    let periodicTest1 = document.querySelectorAll(".periodicTest1");
    let periodicTest2 = document.querySelectorAll(".periodicTest2");
    let total = document.querySelectorAll(".totalnum");

    const periodicTest_1 = document.querySelector("#periodicTest_1");
    const periodicTest_2 = document.querySelector("#periodicTest_2");
    let semster1 = document.querySelector("#semster1");
    let semster2 = document.querySelector("#semster2");
    const grandTotal = document.querySelector("#grandTotal");
    const total_Marks = document.querySelector("#total_Marks");

    let bothSem = 0;
    let parseIntPeriodic1 = 0;
    let parseIntPeriodic2 = 0;
    let parseIntSem1 = 0;
    let parseIntSem2 = 0;
    totalMarks.forEach((element, key) => {
        let s1 = element.value;
        let s2 = totalMarks2[key].value;
        let p1 = periodicTest1[key].value;
        let p2 = periodicTest2[key].value;
        let parseIntPa1 = (periodicTest1[key].value);
        let s3 = parseFloat(s1) + parseFloat(s2) + parseFloat(p1) + parseFloat(p2);
        if((s1 == "") || (s2 == "") || (p1 == "") || (p2 == "")){
            total[key].value = '';
        }else{
            if(!isNaN(s1) && !isNaN(s2) && !isNaN(p1) && !isNaN(p2)){
                total[key].value = s3;
                bothSem += s3;
            }else{
                // for each single if that value is not NaN (Not a Number);
                if(isNaN(s1) && !isNaN(s2) && !isNaN(p1) && !isNaN(p2)){
                    s3 = parseFloat(s2) + parseFloat(p1) + parseFloat(p2);
                    total[key].value = s3
                }else if(!isNaN(s1) && isNaN(s2) && !isNaN(p1) && !isNaN(p2)){
                    s3 = parseFloat(s1) + parseFloat(p1) + parseFloat(p2);
                    total[key].value = s3;
                }else if(!isNaN(s1) && !isNaN(s2) && isNaN(p1) && !isNaN(p2)){
                    s3 = parseFloat(s1) + parseFloat(s2) + parseFloat(p2);
                    total[key].value = s3;
                }else if(!isNaN(s1) && !isNaN(s2) && !isNaN(p1) && isNaN(p2)){
                    s3 = parseFloat(s1) + parseFloat(s2) + parseFloat(p1);
                    total[key].value = s3;
                }

                //for each double values if those are not number;
                else if((isNaN(s1) && isNaN(s2)) && !isNaN(p1) && !isNaN(p2)){
                    s3 = parseFloat(p1) + parseFloat(p2);
                    total[key].value = s3;
                }else if(isNaN(p1) && isNaN(p2) && !isNaN(s1) && !isNaN(s2)){
                    s3 = parseFloat(s1) + parseFloat(s2);
                    total[key].value = s3;
                }else if(isNaN(s1) && isNaN(p1) && !isNaN(s2) && !isNaN(p2)){
                    s3 = parseFloat(s2) + parseFloat(p2)
                    total[key].value = s3;
                }else if(isNaN(s2) && isNaN(p2) && !isNaN(s1) && !isNaN(p1)){
                    s3 = parseFloat(s1) + parseFloat(p1)
                    total[key].value = s3;
                }else if(isNaN(s1) && isNaN(p2) && !isNaN(s2) && !isNaN(p1)){
                    s3 = parseFloat(s2) + parseFloat(p1)
                    total[key].value = s3;
                }

                // for each single value if that is number
                else if(!isNaN(s1) && isNaN(s2) && isNaN(p1) && isNaN(p2)){
                    s3 = parseFloat(s1);
                    total[key].value = s3;
                }else if(!isNaN(p1) && isNaN(s1) && isNaN(s2) && isNaN(p2)){
                    s3 = parseFloat(p1);
                    total[key].value = s3;
                }else if(!isNaN(s2) && isNaN(s1) && isNaN(p1) && isNaN(p2)){
                    s3 = parseFloat(s2)
                    total[key].value = s3;
                }else if(!isNaN(p2) && isNaN(s1) && isNaN(s2) && isNaN(p1)){
                    s3 = parseFloat(p2);
                    total[key].value = s3;
                }else{
                    total[key].value = 'NA';
                    s3 +=s3;
                    if (total[key].value !== 'NA') {
                        bothSem += s3;
                    }
                }
                bothSem += s3;
            }
        }

        if(p1 == "" || isNaN(p1)){
            parseIntPeriodic1 += 0;
        }else{
            parseIntPeriodic1 += parseFloat(p1);
        }

        if(p2 == "" || isNaN(p2)){
            parseIntPeriodic2 += 0;
        }else{
            parseIntPeriodic2 += parseFloat(p2);
        }

        if(s1 == "" || isNaN(s1)){
            parseIntSem1 += 0;
        }else{
            parseIntSem1 += parseFloat(s1);
        }

        if(s2 == "" || isNaN(s2)){
            parseIntSem2 += 0;
        }else{
            parseIntSem2 += parseFloat(s2);
        }
    });
    // let grndTotal = parseIntPeriodic1+parseIntSem1+parseIntPeriodic2+parseIntSem2;
    // change inner HTML for on browser calculation
    periodicTest_1.innerHTML = parseIntPeriodic1;
    semster1.innerHTML = parseIntSem1;
    periodicTest_2.innerHTML = parseIntPeriodic2;
    semster2.innerHTML = parseIntSem2;
    grandTotal.innerHTML = bothSem;
    total_Marks.value   = bothSem;
}

document.addEventListener('DOMContentLoaded', TotalMarks);
</script>
@endsection
