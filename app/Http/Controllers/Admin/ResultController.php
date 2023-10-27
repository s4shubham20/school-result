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
        $student = Student::findOrFail($request->student_id);
        $request->validate([
            'subject_id'                    => 'required',
            'attendance'                    => 'required',
            'sports_cultural_activities'    => 'required',
            'punctual_activities'           => 'required',
            'holiday_assignment'            => 'required',
            'subject_id.*'                  => 'required',
            'semester1.*'                   => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value) && !is_string($value)) {
                        $fail("$attribute must be a positive number or a string.");
                    } elseif (is_numeric($value) && ($value < 0)) {
                        $fail("$attribute must be a positive number.");
                    } elseif (is_numeric($value) && ($value > 100)) {
                        $fail("$attribute must not be greater than 100.");
                    }
                }
            ],
            'semester2.*'   => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value) && !is_string($value)) {
                        $fail("$attribute must be a positive number or a string.");
                    } elseif (is_numeric($value) && ($value < 0)) {
                        $fail("$attribute must be a positive number.");
                    } elseif (is_numeric($value) && ($value > 100)) {
                        $fail("$attribute must not be greater than 100.");
                    }
                }
            ],
            'periodic_test1.*'    => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value) && !is_string($value)) {
                        $fail("$attribute must be a positive number or a string.");
                    } elseif (is_numeric($value) && ($value < 0)) {
                        $fail("$attribute must be a positive number.");
                    } elseif (is_numeric($value) && ($value > 100)) {
                        $fail("$attribute must not be greater than 100.");
                    }
                }
            ],
            'periodic_test2.*'    => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value) && !is_string($value)) {
                        $fail("$attribute must be a positive number or a string.");
                    } elseif (is_numeric($value) && ($value < 0)) {
                        $fail("$attribute must be a positive number.");
                    } elseif (is_numeric($value) && ($value > 100)) {
                        $fail("$attribute must not be greater than 100.");
                    }
                }
            ]
        ]);
        $marks = Mark::where('student_id',$request->student_id)->with('student')->count();
        if($marks > 0){
            Mark::where('student_id',$request->student_id)->delete();
        }

        foreach($request->subject_id as $key => $subjectId){
            Mark::create([
                'student_id'         => $request->student_id,
                'subject_id'         => $subjectId,
                'semester1'          => $request->semester1[$key],
                'semester2'          => $request->semester2[$key],
                'periodic_test1'     => $request->periodic_test1[$key],
                'periodic_test2'     => $request->periodic_test2[$key],
            ]);
        }
        $student->attendance                    = $request->attendance;
        $student->sports_cultural_activities    = $request->sports_cultural_activities;
        $student->punctual_activities           = $request->punctual_activities;
        $student->holiday_assignment            = $request->holiday_assignment;
        $student->totalmarks                    = $request->totalmarks;
        $student->remarks                       = $request->remarks;
        $student->save();
        return redirect()->back()->with('success', 'You have successfully add marks!');

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
