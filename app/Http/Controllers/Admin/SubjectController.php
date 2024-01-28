<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|unique:subjects',
        ]);
        Subject::create($request->all());
        return redirect()->route('subject.index')->with('success','Successfully added!');
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
        $subject = Subject::findOrFail(Crypt::decrypt($id));
        return view('admin.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $eid)
    {
        $id = Crypt::decrypt($eid);
        $request->validate([
            'subject_name' => 'required|unique:subjects,subject_name,'.$id,
        ]);
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        return redirect()->route('subject.index')->with('success','Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $eid)
    {
        $id = Crypt::decrypt($eid);
        Subject::destroy($id);
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
