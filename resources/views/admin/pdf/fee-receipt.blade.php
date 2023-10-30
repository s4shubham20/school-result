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
    </style>
</head>
<body>
    <div style="border: 1px solid rgb(134, 121, 121); border-radius:3px;" class="p-1">
        <div style="border: 1px solid rgb(23, 20, 20); border-radius:3px;" class="p-2">
            <table style="width: 100%;" class="mb-5">
                <tr>
                    <td style="width:27%;">
                        <table style="width: 100%;">
                            <tr>
                                <td class="fw-bold">Print Date: {{ date('d-m-Y') }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:46%;"></td>
                    <td style="width:27%;">
                        <table style="width: 100%;" class="ms-2">
                            <tr>
                                <td  class="fw-bold">Report Date: {{ $fee->created_at->format('d-m-Y') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="text-center">
                <h2 class="text-uppercase text-color">H.L.S. Public School</h2>
                <h2 class="text-uppercase h3 text-color opacity-100">Kursinda Gotani Kunda Praptapgarh U.P. 230202</h2>
            </div>
            <div>
                <hr class="fs-4 mb-1 border-2 text-color opacity-75">
                <hr class="fs-4 m-0 mb-1 border-3 text-color opacity-100">
                <h3 class="text-uppercase mb-0 text-center text-color opacity-100">Fee Receipt</h3>
                <hr class="fs-4 mt-0 mb-1 border-2 text-color opacity-75">
            </div>
            <table style="width: 100%;" class="mt-4">
                <tr style="min-width:100%">
                    <td style="width: 58%; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr style="vertical-align: top;">
                                <td style="width: 30%; height: 20px;" class="fw-bold">Name</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 60%; height: 20px;">{{ $fee->student->name }}</td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 30%; height: 20px;" class="fw-bold">Father Name</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 60%; height: 20px;">{{ $fee->student->father_name }}</td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 30%; height: 20px;" class="fw-bold">Mother Name</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 60%; height: 20px;">{{ $fee->student->mother_name }}</td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 40%; height: 20px;" class="fw-bold">Roll No</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 50%; height: 20px;">{{ $fee->student->roll_no }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 2%;"></td>
                    <td style="width: 40%; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr style="vertical-align: top;">
                                <td style="width: 40%; height: 20px;" class="fw-bold">Class</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 50%; height: 20px;">{{ $fee->student->class }}</td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 40%; height: 20px;" class="fw-bold">Admission No</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 50%; height: 20px;">{{ $fee->student->admission_no }}</td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 40%; height: 20px;" class="fw-bold">DOB</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 50%; height: 20px;">{{ date('d-M-Y',strtotime($fee->student->dob)) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; height: 20px;" class="fw-bold">Course Fee</td>
                                <td style="width: 10%; height: 20px;" class="fw-bold">:</td>
                                <td style="width: 50%; height: 20px;">{{ $fee->student->course_fee }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;" class="mb-4">
                <tr style="vertical-align: top;">
                    <td style="width: 20%; height: 20px;" class="fw-bold">Address</td>
                    <td style="width: 5%; height: 20px;" class="ms-5 fw-bold">:</td>
                    <td style="width: 70%; height: 20px;">{{ $fee->student->address }}</td>
                </tr>
            </table>
            <h3 class="text-uppercase mb-0 text-color opacity-100">Payment Details</h3>
            <table style="width: 100%;" class="my-4">
                <tr>
                    <td style="width: 33%;">
                        <table style="width: 100%;">
                            <tr>
                                <td class="fw-bold" style="width: 40%;">Pay Mode</td>
                                <td class="fw-bold" style="width: 20%;">:</td>
                                <td style="width: 40%;">{{ $fee->payment_mode }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 27%;"></td>
                    @php
                        $collection = collect($fee->student->fee);
                        $dateUntil = $fee->created_at;
                        $filteredPayments = $collection->filter(function ($payment) use ($dateUntil) {
                            return $payment['created_at'] <= $dateUntil;
                        });
                        $sumBeforeLast = $collection->filter(function ($beforePayment) use ($dateUntil) {
                            return $beforePayment['created_at'] < $dateUntil;
                        })->sum('amount');

                        $sumOfAmounts = $filteredPayments->sum('amount');
                        $tolalFeePaid = $fee->student->course_fee;
                        $remainingAmount = $tolalFeePaid-$sumOfAmounts;
                    @endphp
                    <td style="width: 40%;">
                        <table style="width: 100%;">
                            <tr>
                                <td class="fw-bold" style="width: 45%;">Total Amount</td>
                                <td class="fw-bold" style="width: 20%;">:</td>
                                <td style="width: 35%;">{{ $fee->student->course_fee - $sumBeforeLast  }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%;">
                        <table style="width: 100%;">
                            <tr>
                                <td class="fw-bold" style="width: 40%;">Date</td>
                                <td class="fw-bold" style="width: 20%;">:</td>
                                <td style="width: 40%;">{{ $fee->created_at->format('d-m-Y') }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 27%;"></td>
                    <td style="width: 40%;">
                        <table style="width: 100%;">
                            <tr>
                                <td class="fw-bold" style="width: 45%;">Amount Paid</td>
                                <td class="fw-bold" style="width: 20%;">:</td>
                                <td style="width: 35%;">{{ $fee->amount }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%;">
                        <table style="width: 100%;">
                            <tr>
                                <td class="fw-bold" style="width: 40%;">Receipt No</td>
                                <td class="fw-bold" style="width: 20%;">:</td>
                                <td style="width: 40%;">{{ $fee->receipt_no }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 22%;"></td>
                    <td style="width: 45%;">
                        <table style="width: 100%;">
                            <tr>
                                <td class="fw-bold" style="width: 45%;">Remaing Amount</td>
                                <td class="fw-bold" style="width: 20%;">:</td>
                                <td style="width: 35%;">{{ $remainingAmount }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
