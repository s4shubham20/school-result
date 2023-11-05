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
    <table style="width: 100%;">
        <tr style="width: 100%;">
            <td style="width: 100%;">
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
                <table style="width: 100%;" id="bgImage">
                    <tr style="width: 100%; text-align:center;">
                        <td>
                            <h1 class="text-uppercase text-color opacity-100" style="text-align: center;">H.L.S. Public School</h1>
                            {{-- <h3 class="text-uppercase h4 text-color opacity-100"></h3> --}}
                            <h2 class="text-uppercase h3 text-color opacity-100">Kursinda Gotani Kunda Praptapgarh U.P. 230202</h1>
                            <h5 class="text-color mb-0">College Code:E0062</h5>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr style="width: 100%;">
                        <td style="width: 50%;">
                            <table>
                                <tr>
                                    <td><span class="fw-bold">Certificate No.: </span>{{ $student->transfer_certificate->reference_no }}</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 20%;"></td>
                        <td style="width: 30%;">
                            <table style="width: 100%;">
                                <tr style="text-align :right;">
                                    <td><span class="fw-bold">Date: </span>{{ date('d-M-Y') }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr style="width: 100%; text-align:center;">
                        <td style="width:50%; margin:auto;">
                            <h2 class="text-uppercase h3 text-color opacity-100 mt-5" style="border: 1.8px solid #0dcaf0; border-radius:5px; width: 50%; margin: auto;">Transfer Certificate</h2>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;" class="my-5">
                    <tr style="width: 100%;">
                        <td style="width: 100%;">
                            <p>This is to certify that <span class="text-capitalize fw-bold">{{ $student->transfer_certificate->name_title.' '. $student->name }}, </span>
                                <span>
                                    @php if($student->transfer_certificate->name_title == "Mr."){
                                        $of = "Son/O";
                                        $pronoun = "He";
                                    }else{
                                        $of = "D/O";
                                        $pronoun = "She";
                                    }
                                    @endphp
                                </span>
                                {{ $of }}
                                <span class="text-capitalize fw-bold">{{ $student->transfer_certificate->fathername_title.' '.$student->father_name }}</span>
                                    Village/Town
                                <span class="text-capitalize fw-bold">{{ $student->transfer_certificate->town }}</span>
                                of District
                                <span class="text-capitalize fw-bold">{{ $student->transfer_certificate->district }}</span>
                                State
                                <span class="text-capitalize fw-bold">{{ $student->transfer_certificate->state }}</span>
                                <span>has been a student of this institution from
                                    <span class="text-capitalize fw-bold">
                                        {{ date('M-Y' ,strtotime($student->transfer_certificate->admission_date)) }}
                                    </span>
                                    to
                                    <span class="text-capitalize fw-bold">
                                        {{ date('M-Y' ,strtotime($student->transfer_certificate->leaving_date)) }}.
                                    </span>
                                </span>
                                <span>{{ $pronoun }} appeared at the
                                    <span class="text-capitalize fw-bold">
                                        {{ $student->transfer_certificate->leaving_class }}
                                    </span> class,
                                    Annual Examination in
                                    <span class="text-capitalize fw-bold">
                                        {{ $student->transfer_certificate->examinaiton_month .'/'. $student->transfer_certificate->examinaiton_year }}
                                    </span>
                                    and {{ $student->transfer_certificate->status }} same with Examination Roll No.
                                    <span class="text-capitalize fw-bold">{{ $student->roll_no }}</span>
                                </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="width: 100%;">
                        <td style="width: 100%;">
                            <p>To the best of my knowledge and belief <span class="text-lowercase">{{ $pronoun }}</span> bears a {{ $student->transfer_certificate->character }} moral character.</p>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 70%;">
                            <table>
                                <tr>
                                    <td>
                                        <p style="width: 100%;" class="m-0">
                                            <span style="border-bottom: 2px solid grey;" class="fw-bold">
                                                Reason for leaving School:
                                            </span>
                                            {{ $student->transfer_certificate->reason_for_leaving }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-0">
                                        <p class="m-0">
                                            Date:{{ date('d-M-Y') }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-0">
                                        <p class="m-0">
                                            Place:Gotani Kunda
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%;">
                            <table style="width: 75%; margin: 0px 0px 0px auto;">
                                <tr style="text-align: center;">
                                    <td>
                                        <p class="m-0">
                                            Principle
                                        </p>
                                    </td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>
                                        <p class="m-0">
                                            H.L.S. Public School
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="m-0">
                                            Kursinda Gotani Kunda
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
