<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Scholar's Identity Card</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<table style="width: 100%; background: yellow; border: 1px solid brown;">
    <tr>
        <td style="width: 13%;" class="p-2">
            <table style="width: 100%;">
                <tr class="text-center">
                    <td style="width: 100%; display:inline-block; border: 2px solid rgb(250, 71, 197); border-radius: 50%; vertical-align:center; padding:10px 4px;">
                        <img src="{{ storage_path('app/public/indentity-card/buddha.png') }}" alt="Buddha" width="70kb" height="70px">
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: 2%;"></td>
        <td style="width: 85%;">
            <table style="width: 100%;">
                <tr>
                    <td>
                        <h2 class="text-capitalize mb-0" style="color: red;">
                            {{ $student->school_name }}
                        </h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="text-capitalize mb-0">Kursinda Gotani Kunda</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6 class="text-capitalize mb-0">Praptapgarh U.P. 230202</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6 class="text-capitalize m-0 p-0 fs-6">Contact No. (+91) 770-303-1714, 998-490-9463</h6>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table style="width: 100%; border: 1px solid brown; border-top:0px;">
    <tr>
        <td style="width: 30%;"></td>
        <td>
            <table style="width: 100%;">
                <tr>
                    <td class="text-uppercase fw-bold text-decoration-underline text-center" style="color: brown;">Identity-Card</td>
                    <td class="text-end fw-bold pe-4">2023-24</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="vertical-align: top;">
        <td class="px-3 pb-3 pt-1">
            <table style="width: 100%;">
                <tr>
                    <td style="border: 2px solid brown;" class="text-center">
                        @if(isset($student->profile_pic))
                            <img src="{{ storage_path("app/public/student-image/".$student->profile_pic) }}" alt="{{ $student->profile_pic ?? "student-icon" }}"  width="110" height="110"/>
                        @else
                            <img src="{{ storage_path("app/public/student-image/dummy-profile.png") }}" alt="{{ $student->profile_pic ?? "student-icon" }}"  width="110" height="110"/>
                        @endif
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table style="width: 100%;">
                <tr>
                    <td><span class="fw-bold" style="color:red;">Name: </span><span class="fw-bold">{{ $student->name }}</span></td>
                </tr>
                <tr>
                    <td><span class="fw-bold" style="color:red;">F. Name: </span><span class="fw-bold">{{ $student->father_name }}</span></td>
                </tr>
                <tr>
                    <td><span class="fw-bold" style="color:red;">D.O.B: </span><span class="fw-bold">{{ date('d-m-Y', strtotime($student->dob)) }}</span></td>
                </tr>
                <tr>
                    <td><span class="fw-bold" style="color:red;">Class: </span><span class="fw-bold">{{ $student->class }}</span></td>
                </tr>
                <tr>
                    <td><span class="fw-bold" style="color:red;">Mobile: </span><span class="fw-bold">{{ $student->mobile }}</span></td>
                </tr>
                <tr>
                    <td><span class="fw-bold" style="color:red;">Address: </span><span class="fw-bold">{{ $student->address }}</span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="text-end">
        <td colspan="2" class="pe-3">
             <img src="{{ storage_path("app/public/indentity-card/principle-signature.jpg") }}" alt="Principle Signature" width="100" height="50"/>
        </td>
    </tr>
    <tr class="text-end">
        <td colspan="2" class="p-2 pt-0" >
             Principle Signature
        </td>
    </tr>
</table>
</body>
</html>
