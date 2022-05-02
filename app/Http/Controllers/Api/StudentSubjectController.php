<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_subject = StudentSubject::all();

        return response()->json($student_subject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:student_subjects|max:25',
            'subject_code' => 'required|unique:student_subjects|max:25',
        ]);

        StudentSubject::create($request->all());

        return response('Data inserted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_subject = StudentSubject::findOrFail($id);

        return response()->json($student_subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student_subject = StudentSubject::findOrFail($id);
        $student_subject->update($request->all());

        return response('Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentSubject::where('id', $id)->delete();

        return response('Data deleted successfully.');
    }
}
