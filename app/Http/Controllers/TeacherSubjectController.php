<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherSubject; // medel name
use App\Teacher;
use App\Subject;

class TeacherSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$teacher_subjects = TeacherSubject::all();
        $teacher_subjects = TeacherSubject::with('Teacher','Subject')->get();

        return view('teacherSubject.index',compact('teacher_subjects'));
        return $teacher_subjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects=Subject::pluck('id','subjectCode'); 
        $teacher=Teacher::pluck('id','teacherName');
        return view('teacherSubject.create',compact('subjects','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'sec'=>'required',
            'teaid'=>'required',
            'subid'=>'required|unique:teacher_subjects,subject_id,Null,id,teacher_id,'.$request->teaid,
            'medi'=>'required'
        ],
        [
            'teaid.required'=>'Fill out the teacher',
            'sec.required'=>'Fill out the section',
            'subid.required'=>'Fill out the subject',
            'medi.required'=>'Fill out the medium of subject'
        ]);
        $teacherSubjects = new TeacherSubject;
       
        $teacherSubjects->teacher_id=$request->teaid;
        $teacherSubjects->section= $request->sec;
        $teacherSubjects->subject_id= $request->subid;
        $teacherSubjects->medium= $request->medi; 
        $teacherSubjects->save();
        return redirect('/teacherSubject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacherSubjects = TeacherSubject::find($id);
        return view('teacherSubject.show',compact('teacherSubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacherSubjects = TeacherSubject::find($id); 
        $subject=Subject::pluck('id','subjectCode'); 
        $teacher=Teacher::pluck('id','teacherName');       
        return view('teacherSubject.edit',compact('teacherSubjects','subject','teacher'));
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
        $request-> validate([
            'sec'=>'required',
            'medi'=>'required',
        ],
        [
            'sec.required'=>'Fill out the Section',
            'medi.required'=>'Fill out the medium',
        ]);
        $teacherSubjects = TeacherSubject::find($id);                
        $teacherSubjects->teacher_id= $request->teaid;
        $teacherSubjects->section= $request->sec;
        $teacherSubjects->subject_id= $request->subid;
        $teacherSubjects->medium= $request->medi;      
        $teacherSubjects->update(); // or $teacherSubjects->save();
        return redirect('/teacherSubject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacherSubjects = TeacherSubject::find($id);
        $teacherSubjects->delete();
        return redirect('/teacherSubject');
    }
}
