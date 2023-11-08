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
    <table style="width: 100%; border: 1px solid black; margin: 15px 0px;">
        <tr>
            <td style="padding:10px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width:33%;">
                            <p class="m-0">Admission File No. <span class="fw-bold">{{ $student->admission_no }}</span></p>
                        </td>
                        <td style="width:33%; text-align: center;">
                            <p class="m-0">Withdrawal File No.
                                <span class="fw-bold">
                                    {{ $student->transfer_certificate->withdraw_file_no }}
                                </span>
                            </p>
                        </td>
                        <td style="width:33%; text-align: right;">
                            <p class="m-0">
                                Transfer Certificate File No.
                                <span class="fw-bold">
                                    {{ $student->transfer_certificate->certificate_no }}
                                </span>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
