<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradeSubject;
use App\Subject;
use App\Grade;

class GradeSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade_subjects = GradeSubject::with('Grade','Subject')->get();
        return view('gradeSubject.index',compact('grade_subjects'));
        return $grade_subjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Grade::pluck('id','gradeName');
        $subject = Subject::pluck('id','subjectCode');
        return view('gradeSubject.create',compact('grade','subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $graSub =GradeSubject::pluck('grade_id','subject_id');
        $request-> validate([
            'grade_id'=>'required',
            'subject_id'=>'required|unique:grade_subjects,subject_id,Null,id,grade_id,'.$request->grade_id,
            // 'grade_id,subject_id'=>'required|unique:grade_subjects,grade_id,subject_id'
            // 'course_id'=>'required|unique:course_subjects,course_id,'

            
        ],
        [
            'grade_id.required'=>'Fill out the grade',
            'subject_id.required'=>'Fill out the subject',
        ]);
        $gradeSubject = new GradeSubject;
        $gradeSubject->grade_id = $request->grade_id;
        $gradeSubject->subject_id = $request->subject_id;
        $gradeSubject->save();
        return redirect('/gradeSubject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gradeSubject = GradeSubject::find($id);
        return view('gradeSubject.show',compact('gradeSubject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gradeSubject = GradeSubject::find($id);
        $grade = Grade::pluck('id','gradeName');
        $subject = Subject::pluck('id','subjectCode');
        return view('gradeSubject.edit',compact('gradeSubject','grade','subject'));
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
            'grade_id'=>'required',
            // 'grade_id,subject_id'=>'required|unique:grade_subjects,grade_id,subject_id'
            'subject_id'=>'required|unique:grade_subjects,id,'.$id.',id,grade_id,'.$request->grade_id,
        ],
        [
            'grade_id.required'=>'Fill out the grade',
            'subject_id.required'=>'Fill out the subject'
        ]);
        
        $gradeSubject = GradeSubject::find($id);
        $gradeSubject->grade_id = $request->grade_id;
        $gradeSubject->subject_id = $request->subject_id;
        $gradeSubject->update();
        return redirect('/gradeSubject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gradeSubject = GradeSubject::find($id);
        $gradeSubject->delete();
        return redirect('/gradeSubject');
    }
}
