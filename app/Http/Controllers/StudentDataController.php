<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\StudentData;
use Illuminate\Http\Request;

class StudentDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['student'] = StudentData::get();
        return view('admin.student.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['academic_year'] = AcademicYear::get();
        return view('admin.student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'=>'required|unique:student_data,student_id',
            'name'=>'required',
            'email'=>'required|email|unique:student_data,email',
            'year'=>'required',
        ]);
        $data = new StudentData;
        $data->student_id = $request->student_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->academic_year = $request->year;
        $data->save();
        return redirect()->route('student.index')->with('success','Student Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentData $studentData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentData $studentData, $id)
    {
        $data['student'] = $studentData->find($id);
        $data['academic_year'] = AcademicYear::get();
        return view ('admin.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentData $studentData)
    {
        $data = $studentData->find($request->id);
        $data->student_id = $request->student_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->academic_year = $request->year;
        $data->update();
        return redirect()->route('student.index')->with('success','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentData $studentData, $id)
    {
        $data = $studentData->find($id);
        $data->delete();
        return redirect()->route('student.index')->with('success','Student Data Deleted Successfully');
    }
}
