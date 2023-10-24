<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use \PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class PDFController extends Controller
{
    public function generatePDF($eid)
    {
        $id = Crypt::decrypt($eid);
        $student = Student::findOrFail($id);
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('admin.pdf.resultpdf');
        return $pdf->stream('report.pdf', array('Attachment' => 0));
    }
}
