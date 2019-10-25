<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\GroupSubject;
use App\GradeSubject;
use App\TeacherSubject;
use App\Timetable;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index',compact('subjects'));
        return $subjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $request-> validate([
            'subcode'=>'required|min:2|max:6|unique:subjects,subjectCode',
            'subna'=>'required|unique:subjects,subjectName',
            // 'gid'=>'required'
        ],
        [
            'subcode.required'=>'Fill out the Subject Code',
            'subcode.unique'=>'Subject code has already been taken',
            'subna.required'=>' Fill out the subject',
            'subna.unique'=>'Subject name has already been taken',
            // 'gid.required'=>'Fill out the grade'

        ]);

        $subject = new Subject;
        $subject->subjectCode=ucfirst(trans($request->subcode));
        $subject->subjectName=ucfirst(trans($request->subna));
        // $subject->group_id=$request->gid;
        $subject->save();
        return redirect('/subject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject =Subject::find($id);
        return view('subject.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject =Subject::find($id);
        return view('subject.edit',compact('subject'));        
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
            'subcode'=>'required|max:6|min:2|unique:subjects,subjectCode,'.$id,
            'subna'=>'required|unique:subjects,subjectName,'.$id,
            // 'gid'=>'required'
        ],
        [
            'subcode.required'=>'Fill out the Subject Code',
            'subcode.unique'=>'Subject code has already been taken',
            'subna.required'=>' Fill out the subject',
            'subna.unique'=>'Subject name has already been taken',
            // 'gid.required'=>'Fill out the grade'

        ]);
        $subject =Subject::find($id);
        $subject->subjectCode=ucfirst(trans($request->subcode));
        $subject->subjectName=ucfirst(trans($request->subna));
        // $subject->group_id=$request->gid;
        $subject->update();
        return redirect('/subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject =Subject::find($id);
        $subject->delete();
        $gradeSubject = GradeSubject::where('subject_id',$id)->delete();
        $teacherSubject=TeacherSubject::where('subject_id',$id)->delete();
        $groupSubject=GroupSubject::where('subject_id',$id)->delete();
        $timetable=Timetable::where('subject_id',$id)->delete();
        return redirect('/subject');         
    }
}
