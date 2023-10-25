<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-top border-0 border-4 border-danger">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ storage_path("app/public/result-icon/headline.png") }}" alt="">
                                    {{-- <h5 class="text-center text-info opacity-100 hindi">असतो मा सदगमय || तमसो मा ज्योतिर्गमय ||</h5> --}}
                                </div>
                                {{-- <table style="width: 100%;" class="my-4">
                                    <tr>
                                        <td style="width: 37%;"></td>
                                        <td style="width: 63%;">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <img src="{{ storage_path("app/public/result-icon/result-icon.png") }}" alt="" class="img-fluid"/>
                                                    </td>
                                                    <td style="width: 50%;">
                                                        <h6 style="margin-top:100px; text-align:right;">College Code:E0062</h6>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
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
                                <table style="width: 100%;" class="my-4">
                                    <tr style="min-width:100%">
                                        <td style="width: 50%; vertical-align: top;">
                                            <table style="width: 100%;">
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">Name</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ $student->name }}</td>
                                                </tr>
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">Father Name</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ $student->father_name }}</td>
                                                </tr>
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">Mother Name</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ $student->mother_name }}</td>
                                                </tr>
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">Address</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ $student->address }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width: 50%; vertical-align: top;">
                                            <table style="width: 100%;">
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">Class</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ $student->class }}</td>
                                                </tr>
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">Admission No</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ $student->admission_no }}</td>
                                                </tr>
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">DOB</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ date('d-M-Y',strtotime($student->dob)) }}</td>
                                                </tr>
                                                <tr style="vertical-align: top;">
                                                    <td style="width: 30%; height: 20px;">Roll No</td>
                                                    <td style="width: 10%; height: 20px;">:</td>
                                                    <td style="width: 60%; height: 20px;">{{ $student->roll_no }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table style="border: 1px solid black; width:100%;">
                                    <thead>
                                        <tr style="border: 1px solid black;">
                                            <th style="border: 1px solid black; padding-left: 5px;">Subject</th>
                                            <th style="border: 1px solid black; text-align:center;">SA 1</th>
                                            <th style="border: 1px solid black; text-align:center;">SA 2</th>
                                            <th style="border: 1px solid black; text-align:center;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $gradTotal = 0;
                                        @endphp
                                        @foreach($marks as $key => $item)

                                        @php
                                            $gradTotal += $item->semester1 + $item->semester2
                                        @endphp
                                        <tr style="border: 1px solid black;">
                                            <td style="border: 1px solid black; padding-left: 5px;">{{ $item->subject->subject_name }}</td>
                                            <td style="border: 1px solid black; text-align:center;">{{ $item->semester1 }}</td>
                                            <td style="border: 1px solid black; text-align:center;">{{ $item->semester2 }}</td>
                                            <td style="border: 1px solid black; text-align:center;" class="subTotal">{{ $item->semester1 + $item->semester2 }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td style="text-align:right; padding-right: 12px; font-weight: 700" colspan="3">Grand Total</td>
                                            <td style="border: 1px solid black; text-align:center; font-weight: 700" id="grandTotal">{{ $gradTotal }}</td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
