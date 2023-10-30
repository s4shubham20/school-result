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
        $subjects   =   Subject::all();
        $marks      =   Mark::where('student_id',$id)->get();
        $pdf        =   pdf::loadView('admin.pdf.resultpdf',
                        [   'student'   => $student ,
                            'marks'     => $marks ,
                            'subjects'  => $subjects
                        ]);
        $pdf->set_option('isHtml5ParserEnabled', true);
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
}
