<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Student,Mark, Subject,Fee};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class PDFController extends Controller
{
    public function generatePDF($eid)
    {
        $id         =   Crypt::decrypt($eid);
        $student    =   Student::findOrFail($id);
        $subjects   =   Subject::whereHas('marks', function ($query) use ($id) {
            $query->where('student_id', $id)->whereNotNull('semester1');
        })->with(['marks' => function ($query) use ($id) {
            $query->where('student_id', $id);
        }])->get();
        $marks      =   Mark::whereNotNull('semester1')->where('student_id',$id)->get();
        $pdf        =   pdf::loadView('admin.pdf.resultpdf',
                        [   'student'   => $student ,
                            'marks'     => $marks ,
                            'subjects'  => $subjects
                        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function generateFeeReceipt($eid)
    {
        $id         =   Crypt::decrypt($eid);
        $fee        =   Fee::with('student')->findOrFail($id);
        $pdf        =   pdf::loadView('admin.pdf.fee-receipt',compact('fee'));
        $pdf->set_option('isHtml5ParserEnabled', true);
        return $pdf->stream('fee-receipt.pdf');
    }

    public function generateTransferCertifcate($eid)
    {
        $id         =   Crypt::decrypt($eid);
        $student    =   Student::findOrFail($id);
        // return view('admin.pdf.migration-certificate', compact('student'));
        $pdf        = pdf::loadView('admin.pdf.migration-certificate', compact('student'));
        $pdf->set_option('isHtml5ParserEnabled', true);
        return $pdf->stream('transfer-certificate.pdf');
    }

    public function getIdentityCard($eid)
    {
        $id         =   Crypt::decrypt($eid);
        $student    =   Student::findOrFail($id);
        // return view('admin.pdf.identity-card', compact('student'));
        $customPaper = array(0,0,403,403);
        $pdf        = pdf::loadView('admin.pdf.identity-card', compact('student'))->setPaper($customPaper, 'landscape');
        $pdf->set_option('isHtml5ParserEnabled', true);
        return $pdf->stream('identity-card.pdf');
    }
}
