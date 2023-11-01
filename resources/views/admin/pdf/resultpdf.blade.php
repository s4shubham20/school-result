<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        .text-color{
            color: #0dcaf0;
        }
        table #bgImage::before{
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url("{{ storage_path('app/public/result-icon/gautam-buddha.png') }}") no-repeat center center;
            opacity: 0.1;
            z-index: -1;
        }
    </style>
</head>
<body>
    <table style="width: 100%;">
        <tr style="width: 100%;" id="bgImage">
            <td>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <div class="text-center">
                                <img src="{{ storage_path("app/public/result-icon/headline.png") }}" alt="headline" class="img-fluid"/>
                                {{-- <h5 class="text-center text-info opacity-100">असतो मा सदगमय || तमसो मा ज्योतिर्गमय ||</h5> --}}
                            </div>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;" class="my-2">
                    <tr>
                        <td style="width: 39%;"></td>
                        <td style="width: 61%;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">
                                        <img src="{{ storage_path("app/public/result-icon/result-icon-bg.png") }}" alt="result-icon" class="img-fluid"/>
                                    </td>
                                    <td style="width: 50%;">
                                        <h6 style="margin-top:100px; text-align:right;" class="text-color">College Code:E0062</h6>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr style="width: 100%; text-align:center;">
                        <td>
                            <h2 class="text-uppercase text-color opacity-100" style="text-align: center;">H.L.S. Public School</h2>
                            <h2 class="text-uppercase h3 text-color opacity-100">Kursinda Gotani Kunda Praptapgarh U.P. 230202</h2>
                        </td>
                    </tr>
                    <tr style="width: 100%; text-align:center;">
                        <td>
                            <hr class="fs-4 mb-1 border-2 text-color opacity-100">
                            <hr class="fs-4 m-0 mb-1 border-3 text-color opacity-100">
                            <h3 class="text-uppercase mb-0 text-center text-color opacity-100">Progress Report Session {{ date('Y') }}-{{ \Carbon\Carbon::now()->addYear(1)->format('Y') }}</h3>
                            <hr class="fs-4 mt-0 mb-1 border-2 text-color opacity-75">
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;" class="mt-4">
                    <tr style="min-width:100%">
                        <td style="width: 58%; vertical-align: top;">
                            <table style="width: 100%;">
                                <tr style="vertical-align: top;">
                                    <td style="width: 30%; height: 20px;" class="fw-bold">Name</td>
                                    <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                    <td style="width: 60%; height: 20px;">{{ $student->name }}</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td style="width: 30%; height: 20px;" class="fw-bold">Father Name</td>
                                    <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                    <td style="width: 60%; height: 20px;">{{ $student->father_name }}</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td style="width: 30%; height: 20px;" class="fw-bold">Mother Name</td>
                                    <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                    <td style="width: 60%; height: 20px;">{{ $student->mother_name }}</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td style="width: 30%; height: 20px;" class="fw-bold">Roll No.</td>
                                    <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                    <td style="width: 60%; height: 20px;">{{ $student->roll_no }}</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 2%;"></td>
                        <td style="width: 40%; vertical-align: top;">
                            <table style="width: 100%;">
                                <tr style="vertical-align: top;">
                                    <td style="width: 40%; height: 20px;" class="fw-bold">Class</td>
                                    <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                    <td style="width: 50%; height: 20px;">{{ $student->class }}</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td style="width: 40%; height: 20px;" class="fw-bold">Admission No</td>
                                    <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                    <td style="width: 50%; height: 20px;">{{ $student->admission_no }}</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td style="width: 40%; height: 20px;" class="fw-bold">DOB</td>
                                    <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                    <td style="width: 50%; height: 20px;">{{ date('d-M-Y',strtotime($student->dob)) }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;" class="mb-3">
                    <tr style="vertical-align: top;">
                        <td style="width: 17%; height: 20px;" class="fw-bold">Address</td>
                        <td style="width: 6%; height: 20px;" class="ms-5 fw-bold">:</td>
                        <td style="width: 76%; height: 20px;">{{ $student->address }}</td>
                    </tr>
                </table>
                <table style="border: 1px solid black; width:100%;">
                    <thead>
                        <tr style="border: 1px solid black;">
                            <th style="border: 1px solid black; padding-left: 5px;">Subject</th>
                            <th style="border: 1px solid black; text-align:center;">PA 1</th>
                            <th style="border: 1px solid black; text-align:center;">SA 1</th>
                            <th style="border: 1px solid black; text-align:center;">PA 2</th>
                            <th style="border: 1px solid black; text-align:center;">SA 2</th>
                            <th style="border: 1px solid black; text-align:center;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $grandTotal = '';
                            $periodicTest1 = 0;
                            $periodicTest2 = 0;
                            $semester1 = 0;
                            $semester2 = 0;
                            $subjectCount = 0;
                            @endphp
                        @foreach($marks as $key => $item)
                        @php
                            if(is_numeric($item->periodic_test1)){
                                $periodicTest1 += $item->periodic_test1;
                            }else{
                                $periodicTest1 += 0;
                            }
                            if(is_numeric($item->periodic_test2)){
                                $periodicTest2 += $item->periodic_test2;
                            }else{
                                $periodicTest2 += 0;
                            }
                            if(is_numeric($item->semester1)){
                                $semester1 += $item->semester1;
                            }else{
                                $semester1 += 0;
                            }
                            if(is_numeric($item->semester2)){
                                $semester2 += $item->semester2;
                            }else{
                                $semester2 += 0;
                            }
                            $grandTotal = $periodicTest1 + $periodicTest2 + $semester1 + $semester2;
                        @endphp
                        <tr class="border-1">
                            <td class="border-1 ps-1">{{ $item->subject->subject_name }}</td>
                            <td class="border-1 text-center">{{ $item->periodic_test1 }}</td>
                            <td class="border-1 text-center">{{ $item->semester1 }}</td>
                            <td class="border-1 text-center">{{ $item->periodic_test2 }}</td>
                            <td class="border-1 text-center">{{ $item->semester2 }}</td>
                            <td class="border-1 text-center">{{ $item->semester1 + $item->semester2 }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="border-1 fw-bold">Grand Total</td>
                            <td class="border-1 fw-bold text-center">{{ $periodicTest1== 0 ?"":$periodicTest1 }}</td>
                            <td class="border-1 fw-bold text-center">{{ $semester1== 0 ?"":$semester1 }}</td>
                            <td class="border-1 fw-bold text-center">{{ $periodicTest2 == 0 ?"":$periodicTest2 }}</td>
                            <td class="border-1 fw-bold text-center">{{ $semester2== 0 ?"":$semester2 }}</td>
                            <td class="border-1 fw-bold text-center" id="grandTotal">{{ $grandTotal }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="my-3" style="width: 100%;">
                    <tr style="width: 100%; text-align:center;">
                        <td>
                            <hr class="fs-4 m-0 mb-1 border-3 text-color opacity-100">
                            <h3 class="text-uppercase mb-0 text-color opacity-100">Student Co Curricular Activities</h3>
                            <hr class="fs-4 mt-0 mb-1 border-2 text-color opacity-75">
                        </td>
                    </tr>
                </table>
                <table class="table">
                    <tr style="width: 100%">
                        <td class="border-1 ps-1" colspan="3">Class Rank</td>
                        <td class="border-1 text-center" colspan="1">{{ $student->rank_in_class ?? 'NA' }}</td>
                    </tr>
                    <tr class="border-1">
                        <td class="border-1 w-50 ps-1" colspan="3">Sports & Cultural Activities</td>
                        <td class="border-1 text-center">{{ $student->sports_cultural_activities }}</td>
                    </tr>
                    <tr>
                        <td class="border-1 w-50 ps-1" colspan="3">Punctual Activities</td>
                        <td class="border-1 text-center" >{{ $student->punctual_activities }}</td>
                    </tr>
                    <tr>
                        <td class="border-1 w-50 ps-1" colspan="3">Holiday Assignment</td>
                        <td class="border-1 text-center">{{ $student->holiday_assignment }}</td>
                    </tr>
                    <tr style="width: 100%">
                        <td class="border-1 w-50 ps-1">Attendance</td>
                        <td class="border-1 text-center">{{ $student->attendance }}</td>
                        <td class="border-1 ps-1">Percentage</td>
                        @php
                            $subjectCount = count($subjects)*2;
                            $percentage = $grandTotal/$subjectCount;
                        @endphp
                        <td class="border-1 text-center">{{ round($percentage, 2)  }}</td>
                    </tr>
                    <tr>
                        <td class="border-1 ps-1" colspan="3">Result</td>
                        <td class="border-1 text-center">Passed</td>
                    </tr>
                    <tr style="width: 100%;">
                        <td style="width: 33%;" colspan="4">
                            <table>
                                <tr>
                                    <td>Issue Date:</td>
                                    <td>{{ date('d-M-Y') }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;" class="m-0 mb-1">
                    <tr style="width: 100%;">
                        <td>Class Teacher</td>
                        <td>Principle</td>
                        <td class="text-center">Parent</td>
                    </tr>
                    <tr style="width: 100%; text-align: center;">
                        <td colspan="3">
                            <hr class="fs-4 m-0 mt-2 border-2 text-color opacity-75"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
