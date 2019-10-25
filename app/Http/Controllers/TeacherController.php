<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Attendance;
use App\Timetable;
use App\TeacherSubject;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index',compact('teachers'));
        return $teachers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request ;
        $request->validate([
            'teana'=>'required',// instead of teana the colum name 'teacherName' can be also used
            'teacherCode'=>'required|max:7|min:7|unique:teachers,teacherCode'

            
        ],[
            'teana.required'=>'Fill out the teacher name',
            'teacherCode.required'=>'Fill out the teacher code ',
            'teacherCode.unique'=>'Teacher code has already been taken'


        ]);
        $teacher = new Teacher; 
        $teacher1 = new Attendance;
        $teacher->teacherName=$request->teana;
        $teacher->teacherCode=strtoupper($request->teacherCode);
        $teacher->save();
        $teacher1->teacher_id=$teacher->id ;
        
        $teacher1->save();
        return redirect('/teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher =Teacher::find($id);
        return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher =Teacher::find($id);
        return view('teacher.edit',compact('teacher'));
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
        $request->validate([
            'teana'=>'required',// instead of teana the colum name 'teacherName' can be also used
            'teacherCode'=>'required|min:7|max:7|unique:teachers,teacherCode,'.$id

        ],[
            'teana.required'=>'Fill out the teacher name',
            'teacherCode.required'=>'Fill out the teacher code ',
            'teacherCode.unique'=>'Teacher code has already been taken'

        ]);
        $teacher = Teacher::find($id);
        
        $teacher->teacherName= $request->teana;
        $teacher->teacherCode=strtoupper($request->teacherCode);

        $teacher->update(); // or $teacher->save();
        return redirect('/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher =Teacher ::find($id);
        $teacher->delete();
        $timetable=Timetable::where('teacher_id',$id)->delete();
        $teacherSubject =TeacherSubject::where('teacher_id',$id)->delete();
        $teacherSubject =Attendance::where('teacher_id',$id)->delete();
        // $teacher1 =Attendance ::find($id);
        // $teacher1->delete();
       

        // $grade->delete();
        return redirect('/teacher');
    }
}
