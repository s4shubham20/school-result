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
    <table style="width: 100%; border: 1px solid black;" class="mt-3">
        <tr>
            <td style="width:100%; font-size: 14px;" class="px-1">
                <table style="width: 100%;">
                    <tr>
                        <td style="width:33%;">
                            <p class="m-0 p-0">
                                <span class="fw-bold mb-1">
                                    Admission File No.:
                                </span>
                                {{ $student->admission_no }}
                            </p>
                        </td>
                        <td style="width:33%; text-align: center;">
                            <p class="m-0 p-0">
                                <span class="fw-bold mb-1">
                                    Withdrawal File No. :
                                </span>
                                {{ $student->transfer_certificate->withdraw_file_no }}
                            </p>
                        </td>
                        <td style="width:33%; text-align: right;">
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
        <tr class="text-center mb-1">
            <td>
                <h1 class="fw-bold m-0 my-2">Scholar's Register & Transfer Certificate Form</h1>
            </td>
        </tr>
        <tr class="border border-1">
            <td class="p-1" style="font-size: 14px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">Name of Institution:</span>
                    H.L.S. PUBLIC SCHOOL KURSINDA GOTANI KUNDA PRAPTAPGARH U.P. 230202
                </p>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr class="px-1 border border-1" style="vertical-align: top;">
            <td class="border border-1 text-center" style="width: 25%; font-size: 14px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">Scholar's Name</span>
                    <br/>
                    {{ $student->transfer_certificate->name_title }}
                    {{ $student->name }}
                </p>
            </td>
            <td class="border border-1 text-center" style="width: 25%; font-size: 14px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">
                        Name , occupatin and address
                    </span>
                    <br/>
                    {{ $student->transfer_certificate->occupation }}
                </p>
            </td>
            <td class="border border-1 text-center" style="width: 25%; font-size: 14px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">
                        Date of the birth of the scholar
                    </span>
                    <br/>
                    {{ date('d-M-Y' , strtotime($student->dob)) }}
                </p>
            </td>
            <td class="border border-1 text-center" style="width: 25%; font-size: 14px;">
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
            <td class="border border-1  border-top-0 text-center" style="width: 25%; font-size: 14px;">
                <p class="m-0 p-0">
                    <span class="fw-bold">Cast or Religion</span>
                    <br/>
                    {{ $student->transfer_certificate->cast_or_religion }}
                </p>
            </td>
            <td class="border border-1 border-top-0 text-center" style="width: 25%; font-size: 14px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 100%; border-bottom:1px solid black;" class="text-center pb-1">
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
            <td class="border border-1 border-top-0 text-center" style="width: 25%; font-size: 14px;">
                <p class="m-0 p-0">
                </p>
            </td>
            <td class="border border-1 border-top-0 text-center" style="width: 25%; font-size: 14px;">
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
        <tr class="border border-1 border-top-2">
            <td style="width: 33%;">
                <table style="width: 100%;">
                    <tr style="vertical-align: middle; border-bottom: 2px solid black; font-size: 14px;">
                        <th style="border-right: 1px solid black; text-align: center; width: 20%;">Class</th>
                        <th style="border-right: 1px solid black; text-align: center; width: 25%;">Date of Admission</th>
                        <th style="border-right: 1px solid black; text-align: center; width: 25%;">Date of Promotion</th>
                        <th style="border-right: 1px solid black; text-align: center; width: 30%;">Date of Removal</th>
                    </tr>
                    <tr style="font-size: 12px; width:100%;">
                        <td style="border-right: 1px solid rgb(139, 128, 128); text-align: center; width: 20%; font-size: 14px;" class="fw-bold">IV</td>
                        <td style="border-right: 1px solid black; text-align: center; width: 25%;">{{ date('d-m-Y', strtotime($student->transfer_certificate->date_of_admission)) }}</td>
                        <td style="border-right: 1px solid black; text-align: center; width: 25%;">{{ date('d-m-Y', strtotime($student->transfer_certificate->date_of_promotion)) }}</td>
                        <td style="border-right: 1px solid black; text-align: center; width: 30%;">{{ date('d-m-Y', strtotime($student->transfer_certificate->date_of_removal)) }}</td>
                    </tr>
                </table>
            </td>
            <td style="width: 30%">
                <table style="width: 100%;">
                    <tr style="vertical-align: middle; font-size: 14px;">
                        <th>
                            Cause of Removal e.g non payment of dues , removal of family, explusion etc.
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {{  }}
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 37%">
                <table style="width: 100%;"></table>
            </td>
        </tr>
    </table>
</body>
</html>
