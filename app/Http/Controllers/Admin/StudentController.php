<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Student,Fee};
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
            $file = $request->file('profile_pic');
            $fileName = $request->file('profile_pic')->getClientOriginalName();
            $filewithoutext = pathinfo($fileName, PATHINFO_FILENAME);
            $fileExt = $file->getClientOriginalExtension();
            $fileSlug = Str::slug(uniqid() . '_' . $filewithoutext);
            $saveImage = $fileSlug.'.'.$fileExt;
            $file->storeAs('public/student-image', $fileSlug . '.' . $fileExt);
        } else {
            $saveImage = null;
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
        $id      = Crypt::decrypt($eid);
        $student = Student::findOrFail($id);
        $validator = Validator::make($request->all(), [
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
        return redirect()->route("student.index")->with("success","Student registration has been successfully updated!");
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
        if($totalAmount >= $student->course_fee){
            return redirect()->back()->with('success', 'No more fee payment required for this student anymore!');
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

}
