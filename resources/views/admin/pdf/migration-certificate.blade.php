<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Scholar's Register & Transfer Certificate Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>
    <table style="width: 100%;" class="mt-4">
        <tr style="width: 100%;" class="mt-3" style="border: 1px groove black; border-bottom: 0px;">
            <td style="width:100%; font-size: 14px;" class="px-1">
                <table style="width: 100%;" class="mt-2">
                    <tr>
                        <td style="text-align: left;">
                            <p class="m-0 p-0">
                                <span class="fw-bold mb-1">
                                    Admission File No.:
                                </span>
                                {{ $student->admission_no }}
                            </p>
                        </td>
                        <td style="text-align: center;">
                            <p class="m-0 p-0">
                                <span class="fw-bold mb-1">
                                    Withdrawal File No. :
                                </span>
                                {{ $student->transfer_certificate->withdraw_file_no }}
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p class="m-0 p-0">
                                <span class="fw-bold mb-1">
                                    Transfer Certificate File No. :
                                </span>
                                {{ $student->transfer_certificate->certificate_no }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="text-center mb-1" style="border: 1px groove black;">
            <td>
                <h1 class="fw-bold m-0 my-2">Scholar's Register & Transfer Certificate Form</h1>
            </td>
        </tr>
        <tr style="border: 1px groove black; border-bottom: 0px;">
            <td class="p-1" style="font-size: 15px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">Name of Institution:</span>
                    H.L.S. PUBLIC SCHOOL KURSINDA GOTANI KUNDA PRAPTAPGARH U.P. 230202
                </p>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr class="px-1" style="vertical-align: top; border: 1px groove black;">
            <td class="border border-1 text-center pt-1 pb-2" style="width: 25%; font-size: 14px;" >
                <p class="m-0 p-0">
                    <span class="fw-bold">Scholar's Name</span>
                    <br/>
                    {{ $student->transfer_certificate->name_title }}
                    {{ $student->name }}
                </p>
            </td>
            <td class="text-center pt-1 pb-2" style="width: 25%; font-size: 14px; border: 1px groove black;">
                <p class="m-0 p-0">
                    <span class="fw-bold">
                        Name , occupatin and address
                    </span>
                    <br/>
                    {{ $student->transfer_certificate->occupation }}
                </p>
            </td>
            <td class="text-center pt-1 pb-2" style="width: 25%; font-size: 14px; border: 1px groove black;">
                <p class="m-0 p-0">
                    <span class="fw-bold">
                        Date of the birth of the scholar
                    </span>
                    <br/>
                    {{ date('d-M-Y' , strtotime($student->dob)) }}
                </p>
            </td>
            <td class="text-center pt-1 pb-2" style="width: 25%; font-size: 14px; border: 1px groove black;">
                <p class="m-0 p-0">
                    <span class="fw-bold">
                        Last institution attended before joining this one if any
                    </span>
                    {{ $student->transfer_certificate->last_institution_name }}
                </p>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr class="px-1 border border-1 border-top-0" style="vertical-align: top;">
            <td class="text-center pt-1 pb-2" style="width: 25%; font-size: 14px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">Cast or Religion</span>
                    <br/>
                    {{ $student->transfer_certificate->cast_or_religion }}
                </p>
            </td>
            <td class="text-center border border-1 border-top-0 pt-1 pb-2" style="width: 25%; font-size: 14px;">
                <table style="width: 100%;">
                    <tr style="width: 100%; border-bottom:1px groove black;">
                        <td style="width: 100%;" class="text-center pb-1">
                            <p class="m-0 p-0">
                                <span class="fw-bold">
                                    Mother's Name
                                </span>
                                <br/>
                                {{ $student->transfer_certificate->mothername_title }}
                                {{ $student->mother_name }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <p class="m-0 p-0">
                                <span class="fw-bold">
                                    Father's Name
                                </span>
                                <br/>
                                {{ $student->transfer_certificate->fathername_title }}
                                {{ $student->father_name }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="text-center" style="width: 25%; font-size: 14px; border-left: 1.4px groove black;">
            </td>
            <td class="border border-1 border-top-0 text-center pt-1 pb-2" style="width: 25%; font-size: 14px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">
                        Length of residence in this Province
                    </span>
                    <br/>
                    {{ $student->transfer_certificate->province_of_residence }}
                </p>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr class="border border-1" style="vertical-align: middle; font-size: 14px;">
            <th style="border-right: 1px groove black; border-left: 1px groove black; text-align: center;" class="py-2 px-1">Class</th>
            <th style="border-right: 1px groove black; text-align: center;" class="py-2">Date of Admission</th>
            <th style="border-right: 1px groove black; text-align: center;" class="py-2">Date of Promotion</th>
            <th style="border-right: 1px groove black; text-align: center;" class="py-2">Date of Removal</th>
            <th style="border-right: 1px groove black; text-align: center;" class="py-2">
                Cause of Removal e.g non payment of dues , removal of family, explusion etc.
            </th>
            <th style="border-right: 1px groove black; text-align: center;">Year or Session</th>
            <th style="border-right: 1px groove black; text-align: center;">Conduct or Concession</th>
            <th style="border-right: 1px groove black; text-align: center;" class="px-1">Work</th>
        </tr>
        @php
            $jsonData               = json_decode($student->transfer_certificate->class);
            $date_of_admission      = json_decode($student->transfer_certificate->date_of_admission, true);
            $date_of_promotion      = json_decode($student->transfer_certificate->date_of_promotion, true);
            $date_of_removal        = json_decode($student->transfer_certificate->date_of_removal, true);
            $cause_of_removal       = json_decode($student->transfer_certificate->cause_of_removal, true);
            $year_or_session        = json_decode($student->transfer_certificate->year_or_session, true);
            $conduct_or_concession  = json_decode($student->transfer_certificate->conduct_or_concession, true);
            $work                   = json_decode($student->transfer_certificate->work, true);
        @endphp
        @isset($jsonData)
        @foreach ($jsonData as $key => $item)
            <tr style="font-size: 13px;  width:100%;" class="border border-1">
                <td style="text-align: center; border-right: 1px groove black;" class="fw-bold" rowspan="3">{{ $item }}</td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;">{{ $date_of_admission[$key] ? date('d-m-Y', strtotime($date_of_admission[$key])): "" }}</td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;">{{ $date_of_promotion[$key] ? date('d-m-Y', strtotime($date_of_promotion[$key])) : ""}}</td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;">{{ $date_of_removal[$key] ? date('d-m-Y', strtotime($date_of_removal[$key])) : ""}}</td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;">{{ $cause_of_removal[$key] ?? "" }}</td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;">{{ $year_or_session[$key] ?? "" }}</td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;">{{ $conduct_or_concession[$key] ?? "" }}</td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;">{{ $work[$key] ?? "" }}</td>
            </tr>
            <tr style="font-size: 13px; width:100%;" class="border border-1">
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
            </tr>
            <tr style="font-size:13px; width:100%;" class="border border-1">
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
                <td style="text-align: center; border-right: 1px groove black; height: 20px;"></td>
            </tr>
        @endforeach
        @endisset
        <tr style="font-size:14px; width:100%; border: 1px groove black; border-bottom: 2px groove black;">
            <td colspan="8" class="px-1" style="height: 30px;">
                Certified that the above Scholar's has been posted up to date of the Scholar's leaving as required by the department rules.
            </td>
        </tr>
    </table>
</body>
</html>
