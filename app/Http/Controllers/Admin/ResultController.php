<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Student,Subject,Mark};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.result.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id.*'  => 'required',
            'semester1.*'   => 'required',
            'semester2.*'   => 'required',
        ]);
        $marks = Mark::where('student_id',$request->student_id)->count();
        if($marks > 0){
            Mark::where('student_id',$request->student_id)->delete();
        }

        foreach($request->subject_id as $key => $subjectId){
            Mark::create([
                'student_id'    => $request->student_id,
                'subject_id'    => $subjectId,
                'semester1'     => $request->semester1[$key],
                'semester2'     => $request->semester2[$key],
            ]);
        }
        return redirect(route('result.index'))->with('success', 'You have successfully add marks!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $eid)
    {
        $id = Crypt::decrypt($eid);
        $student    =   Student::findOrFail($id);
        $subjects   =   Subject::all();
        $mark       =   Mark::where('student_id',$id)->get();
        return view('admin.result.create', compact('student','subjects','mark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
