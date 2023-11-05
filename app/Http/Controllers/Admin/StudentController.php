<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Student, Fee, TransferCertificate};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest('rank_in_class')->get();
        $rank = 1;
        foreach($students as $key => $student){
            $student->rank_in_class = $rank;
            $student->save();
            $rank++;
        }
        return view('admin.student.index', compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.student.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"          => "required",
            "admission_no"  => "required|unique:students",
            "class"         => "required",
            "roll_no"       => "required",
            "father_name"   => "required",
            "mother_name"   => "required",
            "dob"           => "required",
            "course_fee"    => "required|numeric|gt:0",
            "profile_pic"   => "required|image|mimes:jpeg,jpg,png|max:200",
            "address"       => "required",
        ]);
        if ($request->hasFile('profile_pic')) {
            $file           = $request->file('profile_pic');
            $fileName       = $request->file('profile_pic')->getClientOriginalName();
            $filewithoutext = pathinfo($fileName, PATHINFO_FILENAME);
            $fileExt        = $file->getClientOriginalExtension();
            $fileSlug       = Str::slug(uniqid() . '_' . $filewithoutext);
            $saveImage      = $fileSlug.'.'.$fileExt;
            $file->storeAs('public/student-image', $fileSlug . '.' . $fileExt);
        } else {
            $saveImage      = null;
        }
        $data                   =   $request->all();
        $data['profile_pic']    =   $saveImage;
        Student::create($data);
        return redirect()->route("student.index")->with("success","Student registration has been successfully done!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail(Crypt::decrypt($id));
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $eid)
    {
        $id         = Crypt::decrypt($eid);
        $student    = Student::findOrFail($id);
        $validator  = Validator::make($request->all(), [
            "name"          => "required",
            "admission_no"  => "required|unique:students,admission_no,".$id,
            "class"         => "required",
            "roll_no"       => "required",
            "father_name"   => "required",
            "mother_name"   => "required",
            "dob"           => "required",
            "profile_pic"   => "mimes:jpeg,jpg,png|max:200",
            "course_fee"    => "required|numeric|gt:0",
            "address"       => "required",
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $fileName = $request->file('profile_pic')->getClientOriginalName();
            $filewithoutext = pathinfo($fileName, PATHINFO_FILENAME);
            $fileExt = $file->getClientOriginalExtension();
            $fileSlug = Str::slug(uniqid() . '_' . $filewithoutext);
            $saveImage = $fileSlug.'.'.$fileExt;
            $file->storeAs('public/student-image', $fileSlug . '.' . $fileExt);
            if(File::exists(storage_path("app/public/student-image/".$student->profile_pic))){
                File::delete(storage_path("app/public/student-image/".$student->profile_pic));
            }
        } else {
            $saveImage = $student->profile_pic;
        }
        $data                   =   $request->all();
        $data['profile_pic']    =   $saveImage;
        $student->update($data);
        return redirect()->route("student.index")->with("success","Student details have been successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $eid)
    {
        $id      = Crypt::decrypt($eid);
        Student::destroy($id);
        return redirect()->route("student.index")->with("success","Student has been successfully deleted!");
    }

    public function getFee()
    {
        $students = Student::with(['fee' => function($query){
            $query->latest('id');
        }])->latest()->get();
        return view('admin.student.fee', compact('students'));
    }

    public function studentFeeDetails($eid)
    {
        $id = Crypt::decrypt($eid);
        $student = Student::with([
            'fee' => function($query){
            $query->latest('id');
        }])->findOrFail($id);
        return view('admin.student.fee-receipt', compact('student'));
    }

    public function feePayment(Request $request)
    {
        $request->validate([
            'student_id'        =>  'required',
            'admission_no'      =>  'sometimes|required',
            'amount'            =>  'required|numeric|gt:0',
            'payment_mode'      =>  'required'
        ]);

        $fee = Fee::latest('id')->first();
        if ($fee) {
            $receiptNo = ($fee->receipt_no)+1;
        }else{
            $receiptNo = '10000';
        }
        $studentId = Crypt::decrypt($request->student_id);
        $student = Student::findOrFail($studentId);
        $totalFeePaid = collect($student->fee);
        $totalAmount = $totalFeePaid->sum('amount');
        $totalRemainAmount = $student->course_fee - $totalAmount;
        if($totalRemainAmount < $request->amount){
            return redirect()->back()->with('error', 'The remaining fee amount is less than amount added!');
        }
        Fee::create([
            'receipt_no'    =>  $receiptNo,
            'payment_mode'  =>  $request->payment_mode,
            'student_id'    =>  $studentId,
            'admission_no'  =>  $request->admission_no,
            'amount'        =>  $request->amount,
        ]);

        return redirect()
            ->back()
        ->with("success","Fee amount successfully paid!");
    }

    public function feeDelete($eid)
    {
        $id = Crypt::decrypt($eid);
        Fee::destroy($id);
        return redirect()
            ->back()
        ->with("success","Successfully Deleted!");
    }

    public function getTransferCertificate($eid)
    {
        $id = Crypt::decrypt($eid);
        $student = Student::with('transfer_certificate')->findOrFail($id);
        return view('admin.student.transfer-certificate', compact("student"));
    }

    public function setTransferCertificate(Request $request)
    {
        $studentId                  =   $request->student_id;
        $id                         =   $request->transferId;
        if(TransferCertificate::where('student_id',$studentId)->exists()){
            $transferCertificate    =   TransferCertificate::where('student_id',$studentId)->firstOrFail();
            $reference_no           =   "required|unique:transfer_certificates,reference_no,".$id;
        }else{
            $transferCertificate    =   new TransferCertificate();
            $reference_no           =   "required|unique:transfer_certificates";
        }

        $request->validate([
            "student_id"            =>  "required",
            "title"                 =>  "required",
            "father_title"          =>  "required",
            'reference_no'          =>  $reference_no,
            "town"                  =>  "required",
            "district"              =>  "required",
            "state"                 =>  "required",
            "admission_date"        =>  "required",
            "leaving_date"          =>  "required",
            "leaving_class"         =>  "required",
            "status"                =>  "required",
            "examinaiton_month"     =>  "required",
            "examinaiton_year"      =>  "required",
            "character"             =>  "required",
            "reason_for_leaving"    =>  "required",
        ]);

        $transferCertificate->student_id            =   $studentId;
        $transferCertificate->name_title            =   $request->title;
        $transferCertificate->fathername_title      =   $request->father_title;
        $transferCertificate->reference_no          =   $request->reference_no;
        $transferCertificate->town                  =   $request->town;
        $transferCertificate->district              =   $request->district;
        $transferCertificate->state                 =   $request->state;
        $transferCertificate->admission_date        =   $request->admission_date;
        $transferCertificate->leaving_date          =   $request->leaving_date;
        $transferCertificate->leaving_class         =   $request->leaving_class;
        $transferCertificate->examinaiton_month     =   $request->examinaiton_month;
        $transferCertificate->examinaiton_year      =   $request->examinaiton_year;
        $transferCertificate->character             =   $request->character;
        $transferCertificate->reason_for_leaving    =   $request->reason_for_leaving;
        $transferCertificate->status                =   $request->status;
        $transferCertificate->save();

        return redirect()->back()->with('success', "Transfer certificate successfully generated");
    }

}
