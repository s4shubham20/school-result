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
            background: url("{{ storage_path('app/public/result-icon/gautam-buddha.png') }}") no-repeat top center;
            opacity: 0.1;
            z-index: -1;
        }
    </style>
</head>
<body>
    <table style="width: 100%; margin: 15px 0px;">
        <tr style="width: 100%; border: 1px solid grey; display:block; border-radius:5px; padding: 5px;">
            <td style="width: 100%; border: 1px solid grey; display:block; border-radius:5px; padding: 20px 0px;">
                <table style="width: 100%;" class="px-1">
                    <tr style="width: 100%;">
                        <td style="width: 50%;">
                            <table>
                                <tr>
                                    <td><span class="fw-bold">Register No.: </span>{{ $student->transfer_certificate->register_no }}</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 50%;">
                            <table style="width: 100%;">
                                <tr style="text-align :right;">
                                    <td><span class="fw-bold">Certificate No.: </span>{{ $student->transfer_certificate->certificate_no }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;" colspan="2">
                            <h1 class="h2 text-uppercase fw-bold text-center"  style="border: 1.8px solid #969a9b; border-radius:5px; width: 60%; margin: auto;">Leaving Certificate<h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="m-0"><span class="fw-bold">School name (with registration no.):</span> H.L.S. Public School (E0062)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0"><span class="fw-bold">Place:</span>Kursinda Gotani Kunda</p>
                        </td>
                        <td style="text-align: right;">
                            <p class="m-0"><span class="fw-bold">District:</span>Praptapgarh</p>
                        </td>
                    </tr>
                    <tr class="mt-2">
                        <td colspan="2">
                            <p class="m-0"><h4 class="fw-bold h5">Description:-</h4></p>
                        </td>
                    </tr>
                </table>
                <table style="width:100%;" class="mb-3 px-1">
                    <tr>
                        <td style="width:48%;">
                            <table>
                                <tr>
                                    <td>
                                        <p class="m-0"><span class="fw-bold">Student Name: </span>{{ $student->transfer_certificate->name_title.' '.$student->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">DOB: </span>
                                            {{ date('d-M-Y', strtotime($student->dob)) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    @php
                                    $birthdate = \Carbon\Carbon::parse($student->dob);
                                    $currentDate = \Carbon\Carbon::parse($student->transfer_certificate->leaving_date);
                                    $age = $birthdate->diffInYears($currentDate);
                                    $remainingMonths = $birthdate->diffInMonths($currentDate)%12;
                                    @endphp
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Age at school leaving: </span>{{ $age }} Years
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Years:</span> {{ $age }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Month:</span>{{  $remainingMonths }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Father Name:</span>
                                            {{ $student->transfer_certificate->fathername_title }}
                                            {{ $student->father_name }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Mother Name:</span>
                                            {{ $student->transfer_certificate->mothername_title }}
                                            {{ $student->mother_name }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Caste (Hindu or religion):</span>
                                            {{ $student->transfer_certificate->caste }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Residence Address:</span>
                                            {{ $student->address }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Tahsil:</span>
                                            {{ $student->transfer_certificate->tahsil }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Period of stay in state:</span>
                                            {{ $student->transfer_certificate->period_of_stay_in_state }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Date of admission to this school:</span>
                                            {{ date('d-M-Y' ,strtotime($student->transfer_certificate->admission_date)) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Admission register no.:</span>
                                            {{ $student->transfer_certificate->admission_regsiter_no }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Last date of school admission:</span>
                                            {{ $student->transfer_certificate->admission_last_date }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Last date of school:</span>
                                            {{ date('d-M-Y' ,strtotime($student->transfer_certificate->last_date_of_school)) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Date of withdrawal from school:</span>
                                            {{ date('d-M-Y' ,strtotime($student->transfer_certificate->leaving_date)) }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 4%;"></td>
                        <td style="width:48%; vertical-align: top;">
                            <table style="width:100%;">
                               <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Reason of withdrawal from school:</span>
                                            {{ $student->transfer_certificate->reason_for_leaving }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Character:</span>
                                            {{ $student->transfer_certificate->character }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Name of the higher examination passed out:</span>
                                            {{ $student->transfer_certificate->higher_examination }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Passed out date:</span>
                                            {{ date('d-M-Y', strtotime($student->transfer_certificate->passed_out_date)) }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">Language of Student:</span>
                                            {{ $student->transfer_certificate->language_of_student }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <h4 class="fw-bold h5">Additional information</h4>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">(1) That means it was free:</span>
                                            {{ $student->transfer_certificate->free_of_cost }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">(2) From class scheduled date:</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">(a) Number of days school is open:</span>
                                            {{ $student->transfer_certificate->days_school_is_open }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">(b) Number of Student attendance days:</span>
                                            {{ $student->attendance }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">(c) Number of illness days:</span>
                                            {{ $student->transfer_certificate->illness_days }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            <span class="fw-bold">(d) Occupation of father:</span>
                                            {{ $student->transfer_certificate->father_occupation }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;" class="px-1">
                    <tr>
                        <td style="width: 25%;">
                            <p class="m-0">
                                <span class="fw-bold">Date: </span>{{ date('d-M-Y') }}
                            </p>
                        </td>
                        <td style="width: 25%;">
                            <p class="m-0">
                                <span class="fw-bold">Month: </span>{{ date('M') }}
                            </p>
                        </td>
                        <td style="width: 25%;">
                            <p class="m-0">
                                <span class="fw-bold">Year: </span>{{ date('Y') }}
                            </p>
                        </td>
                        <td style="width: 25%;">
                            <p class="m-0">
                                <span class="fw-bold">Principle: </span>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
