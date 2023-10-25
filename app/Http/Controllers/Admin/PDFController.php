<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Student,Mark};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class PDFController extends Controller
{
    public function generatePDF($eid)
    {
        $id = Crypt::decrypt($eid);
        $student    =   Student::findOrFail($id);
        $marks      =   Mark::with('student')->where('student_id',$id)->get();
        $pdf        =   pdf::loadView('admin.pdf.resultpdf', ['student' => $student,'marks' => $marks]);
        $pdf->set_option('isHtml5ParserEnabled', true);
        return $pdf->stream('invoice.pdf');
    }
}
