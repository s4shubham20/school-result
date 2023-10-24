<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view("admin.student.index", compact("students"));
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
            "address"       => "required",
        ]);
        Student::create($request->all());
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
        $request->validate([
            "name"          => "required",
            "admission_no"  => "required|unique:students,admission_no,".$id,
            "class"         => "required",
            "roll_no"       => "required",
            "father_name"   => "required",
            "mother_name"   => "required",
            "dob"           => "required",
            "address"       => "required",
        ]);
        $student->update($request->all());
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
}
