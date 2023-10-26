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
                                    <h5 class="text-center text-info opacity-100">असतो मा सदगमय || तमसो मा ज्योतिर्गमय ||</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                    </div>
                                    <div class="col-md-7 d-flex justify-content-between align-items-center">
                                        <div>
                                            <img src="{{ asset('assets/images/result-icon/result-icon.png') }}" alt="" class="img-fluid"/>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="text-info opacity-100 mt-5">College Code:E0062</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h2 class="text-uppercase text-info opacity-100">H.L.S. Public School</h2>
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
                                                        <input type="text" name="periodic_test1" onchange="TotalMarks('');" class="form-control periodicTest1 @error('periodic_test1.'.$key) is-invalid @enderror" value="{{ old('periodic_test1.'.$key,$mark[$key]->periodic_test1 ?? "") }}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="semester1[]" onchange="TotalMarks('');" class="form-control totalMarks sem1 @error('semester1.'.$key) is-invalid @enderror" value="{{ old('semester1.'.$key,$mark[$key]->semester1 ?? "") }}"/>
                                                        @error('semester1.'.$key)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="periodic_test2" onchange="TotalMarks('');" class="form-control periodicTest2  @error('periodic_test2.'.$key) is-invalid @enderror" value="{{ old('periodic_test2.'.$key,$mark[$key]->periodic_test2 ?? "") }}"/>
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
                                                <tr>
                                                    <td colspan="5" class="text-end fw-bold pe-3">Grand Total</td>
                                                    <td class="fw-bold ps-3" id="grandTotal"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-flex">
                                            <div class="d-grid col-3">
                                                <button class="btn btn-success"><i class="bx bx-check-circle"></i>Save</button>
                                            </div>
                                            <div class="d-grid col-3 ms-3">
                                                @isset($mark[0])
                                                <a href="{{ route('print.result',Crypt::encrypt($student->id)) }}" class="btn btn-primary"><i class="lni lni-printer"></i>View Result</a>
                                                @endisset
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
    const grandTotal = document.querySelector("#grandTotal");

    let bothSem = 0;

    totalMarks.forEach((element, key) => {
        let s1 = element.value;
        let s2 = totalMarks2[key].value;
        let p1 = periodicTest1[key].value;
        let p2 = periodicTest2[key].value;

        if(s1 == "" || s2 == "" || p1 == "" || p2 == ""){
            total[key].value = '';
        }else{
            if (!isNaN(s1) && !isNaN(s2) && !isNaN(p1) && !isNaN(p2)) {
            // If all inputs are numbers, calculate the sum.
                let s3 = parseFloat(s1) + parseFloat(s2) + parseFloat(p1) + parseFloat(p2);
                total[key].value = s3;
                bothSem += s3;
                console.log('Helllo')
            } else {
                // Check each input and add them accordingly based on conditions.
                if (isNaN(s1)) {
                    s3 = parseFloat(s2) + parseFloat(p1) + parseFloat(p2);
                } else if (isNaN(s2)) {
                    s3 = parseFloat(s1) + parseFloat(p1) + parseFloat(p2);
                } else if (isNaN(p1)) {
                    s3 = parseFloat(s1) + parseFloat(s2) + parseFloat(p2);
                } else if (isNaN(p2)) {
                    s3 = parseFloat(s1) + parseFloat(s2) + parseFloat(p1);
                } else {
                    // If all inputs are non-numeric, set s3 to 'NA'.
                    s3 = 'NA';
                }

                total[key].value = s3;
                if (s3 !== 'NA') {
                    bothSem += parseFloat(s3);
                }
            }
        }
    });

    grandTotal.innerHTML = bothSem;
}

document.addEventListener('DOMContentLoaded', TotalMarks);

/* function TotalMarks() {
    let totalMarks = document.querySelectorAll(".sem1");
    let totalMarks2 = document.querySelectorAll(".sem2");
    let periodicTest1 = document.querySelectorAll(".periodicTest1");
    let periodicTest2 = document.querySelectorAll(".periodicTest2");
    let total = document.querySelectorAll(".totalnum");
    const grandTotal = document.querySelector("#grandTotal");

    let bothSem = 0;

    totalMarks.forEach((element, key) => {
        let s1 = element.value;
        let s2 = totalMarks2[key].value;
        let p1 = periodicTest1[key].value;
        let p2 = periodicTest2[key].value;
        if(s1 == "" || s2 == ""){
            if(s1 == ""){
                total[key].value = s2;
            }else if(s2 == ""){
                total[key].value = s1;
            }else{
                total[key].value = '';
            }
        }else{

            if (!isNaN(s1) && !isNaN(s2)) {
                // If both s1 and s2 are numbers, calculate the sum.
                let s3 = parseFloat(s1) + parseFloat(s2) + parseFloat(p1) + parseFloat(p2);
                total[key].value = s3;
                bothSem += s3;
            } else if (!isNaN(s1)) {
                // If s1 is a number and s2 is not, use the value of s1.
                total[key].value = s1;
                bothSem += parseFloat(s1);
            } else if (!isNaN(s2)) {
                // If s2 is a number and s1 is not, use the value of s2.
                total[key].value = s2;
                bothSem += parseFloat(s2);
            } else {
                // If both are non-numeric, set s3 to 'NA'.
                total[key].value = 'NA';
            }
        }
    });

    grandTotal.innerHTML = bothSem;
}

document.addEventListener('DOMContentLoaded', TotalMarks); */

</script>
@endsection
