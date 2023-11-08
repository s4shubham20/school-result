<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Student, Fee, TransferCertificate, MigrationCertificate};
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
        // return $request;
        $studentId                  =   $request->student_id;
        $id                         =   $request->transferId;
        if(TransferCertificate::where('student_id',$studentId)->exists()){
            $transferCertificate    =   TransferCertificate::where('student_id',$studentId)->firstOrFail();
            $certificate_no         =   "required|unique:transfer_certificates,certificate_no,".$id;
        }else{
            $transferCertificate    =   new TransferCertificate();
            $certificate_no         =   "required|unique:transfer_certificates";
        }

        $request->validate([
            "student_id"                    => "required",
            "title"                         => "required",
            "father_title"                  => "required",
            "mother_title"                  => "required",
            "register_no"                   => "required",
            'certificate_no'                => $certificate_no,
            "caste"                         => "required",
            "tahsil"                        => "required",
            "period_of_stay_in_state"       => "required",
            "admission_date"                => "required",
            "admission_regsiter_no"         => "required",
            "admission_last_date"           => "required",
            "last_date_of_school"           => "required",
            "leaving_date"                  => "required",
            "reason_for_leaving"            => "required",
            "character"                     => "required",
            "higher_examination"            => "required",
            "passed_out_date"               => "required",
            "language_of_student"           => "required",
            "free_of_cost"                  => "required",
            "days_school_is_open"           => "required",
            "illness_days"                  => "required",
            "father_occupation"             => "required"
        ]);
        $transferCertificate->student_id                =   $studentId;
        $transferCertificate->name_title                =   $request->title;
        $transferCertificate->fathername_title          =   $request->father_title;
        $transferCertificate->mothername_title          =   $request->father_title;
        $transferCertificate->register_no               =   $request->register_no;
        $transferCertificate->certificate_no            =   $request->certificate_no;
        $transferCertificate->caste                     =   $request->caste;
        $transferCertificate->tahsil                    =   $request->tahsil;
        $transferCertificate->period_of_stay_in_state   =   $request->period_of_stay_in_state;
        $transferCertificate->admission_date            =   $request->admission_date;
        $transferCertificate->admission_regsiter_no     =   $request->admission_regsiter_no;
        $transferCertificate->admission_last_date       =   $request->admission_last_date;
        $transferCertificate->last_date_of_school       =   $request->last_date_of_school;
        $transferCertificate->leaving_date              =   $request->leaving_date;
        $transferCertificate->reason_for_leaving        =   $request->reason_for_leaving;
        $transferCertificate->character                 =   $request->character;
        $transferCertificate->higher_examination        =   $request->higher_examination;
        $transferCertificate->passed_out_date           =   $request->passed_out_date;
        $transferCertificate->language_of_student       =   $request->language_of_student;
        $transferCertificate->free_of_cost              =   $request->free_of_cost;
        $transferCertificate->days_school_is_open       =   $request->days_school_is_open;
        $transferCertificate->illness_days              =   $request->illness_days;
        $transferCertificate->father_occupation         =   $request->father_occupation;
        $transferCertificate->save();

        return redirect()->back()->with('success', "Transfer certificate successfully generated");
    }

    public function getMigrationCertificate($eid)
    {
        $id = Crypt::decrypt($eid);
        $student = Student::with('transfer_certificate')->findOrFail($id);
        return view('admin.student.migration-certificate', compact('student'));
    }

    public function setMigrationCertificate(Request $request)
    {
        $request;
        $studentId                  =   $request->student_id;
        $id                         =   $request->transferId;
        if(MigrationCertificate::where('student_id',$studentId)->exists()){
            $transferCertificate    =   MigrationCertificate::where('student_id',$studentId)->firstOrFail();
            $certificate_no         =   "required|unique:migration_certificates,certificate_no,".$id;
        }else{
            $transferCertificate    =   new MigrationCertificate();
            $certificate_no         =   "required|unique:migration_certificates";
        }
        // return $certificate_no;
        $request->validate([
            "student_id"                => "required",
            "withdraw_file_no"          => "required",
            "certificate_no"            => $certificate_no,
            "title"                     => "required",
            "occupation"                => "required",
            "cast_or_religion"          => "required",
            "mothername_title"          => "required",
            "fathername_title"          => "required",
            "province_of_residence"     => "required",
            "class.*"                   => "required",
            "year_or_session.*"         => "required" ,
            "date_of_admission.*"       => "required" ,
            "date_of_promotion.*"       => "required" ,
            "work.*"                    => "required"
        ]);

        $transferCertificate->student_id            =   $request->student_id;
        $transferCertificate->withdraw_file_no      =   $request->withdraw_file_no;
        $transferCertificate->certificate_no        =   $request->certificate_no;
        $transferCertificate->name_title            =   $request->title;
        $transferCertificate->mothername_title      =   $request->mothername_title;
        $transferCertificate->fathername_title      =   $request->fathername_title;
        $transferCertificate->occupation            =   $request->occupation;
        $transferCertificate->last_institution_name =   $request->last_institution_name;
        $transferCertificate->cast_or_religion      =   $request->cast_or_religion;
        $transferCertificate->province_of_residence =   $request->province_of_residence;
        $transferCertificate->class                 =   json_encode($request->class);
        $transferCertificate->date_of_admission     =   json_encode($request->date_of_admission);
        $transferCertificate->date_of_promotion     =   json_encode($request->date_of_promotion);
        $transferCertificate->date_of_removal       =   json_encode($request->date_of_removal);
        $transferCertificate->year_or_session       =   json_encode($request->year_or_session);
        $transferCertificate->conduct_or_concession =   json_encode($request->conduct_or_concession);
        $transferCertificate->work                  =   json_encode($request->work);
        $transferCertificate->save();

        return redirect()->back()->with('success', "Transfer certificate successfully generated");

    }

}
