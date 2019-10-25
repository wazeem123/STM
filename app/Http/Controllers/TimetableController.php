<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Timetable,Subject,Period,Teacher,Grade,GradeSubject,TeacherSubject};



class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function teacherAjax(){
        //$available_ids = Timetable::where('grade_id',request()->grade_id)->pluck('period_id');
       // return request()->grade_id ;
        //$periods  = Period::whereNotIn('id',$available_ids)->get();

       // $available_idsSub = GradeSubject::where('grade_id',request()->grade_id)->pluck('subject_id');
       // $avaiSub = Subject::whereIn('id',$available_idsSub)->get();
        // $available_idsSub = GradeSubject::find(1)->subject;
       // return $avaiSub;
        $subjectId = TeacherSubject::where('subject_id',request()->subject_id)->pluck('teacher_id');
        $section = Grade::where('id',request()->grade_id)->pluck('section');
        $teaSec = TeacherSubject::where('section',$section)->orWhere('section','B')->pluck('teacher_id');
        $array = Teacher::whereIn('id',$subjectId)->whereIn('id',$teaSec)->get(); 
        //array_intersect($subjectId,$teaSec);
        //return $array;
       // return $teaSec;
        //return $subjectId;
       // $avaiTeacher =Teacher::whereIn('id','$subjectId')->get();
        
        return response()->json([
            'success'=>true,
            //'lists'=>$periods,
            'sublists'=>$array

        ]);

     }
    public function index()
    {
        $timetables = Timetable::with('Teacher','Subject','Period','Grade')->get();
        $grade =Grade::pluck('id','gradeName'); 

        if(isset(request()->grade)){
         $timetables = Timetable::with('Teacher','Subject','Period')->where('timetable',request()->grade);
        }
        //return $timetables;
        // if (isset(request()->division)){
        //  $timetables = $timetables->where('division',request()->division)->get();
        //return $timetables;
return view('timetable.index',compact('timetables','grade'));
return $timetables;
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects=Subject::pluck('id','subjectCode');
        $grade =Grade::pluck('id','gradeName'); 
       // $division =Timetable::pluck('id','division');   
        $teacher=Teacher::pluck('id','teacherName');
        //$steacher = TeacherSubject::pluck('id',); 
        
       // $g6 = Timetable::pluck('period_id');
        //$period=Period::whereNotIn('id',$g6)->pluck('id','periodCode');  
        //return $subjects;
        //return $division;
        //return $teacher;

        $period=Period::pluck('id','periodCode');
        return view('timetable.create',compact('subjects','period','teacher','grade'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'period_id'=>'required',        
            //'division'=>'required',
            'grade_id'=>'required',

            'subject_id'=>'required',
            'teacher_id'=>'required'
        ],
        [
            'period_id.required'=>'Fill out the period',
            'grade_id.required'=>'Fill out the grade',
            'subject_id.required'=>'Fill out the subject',
            'teacher_id.required'=>'Fill out the teacher'
        ]);

      //  if(request()->ajax()){

            $timetable = new Timetable;
            
            $timetable->grade_id = $request->grade_id;
            
            $timetable->period_id = $request->period_id;
            // $timetable->division = $request->division;
            
            $timetable->subject_id = $request->subject_id;
            $timetable->teacher_id = $request->teacher_id;
            $timetable->save();
        //     return response()->json([
        //         'success'=>true,
        //         'message'=>'Saved Succefully',
        //     ]);
        // }

             return redirect('/timetable');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get period list 
        if(request()->ajax()){
            //return "ajax";
            $available_ids = Timetable::where('grade_id',request()->grade_id)->pluck('period_id');
            $periods  = Period::whereNotIn('id',$available_ids)->get();

            $available_idsSub = GradeSubject::where('grade_id',request()->grade_id)->pluck('subject_id');
            $avaiSub = Subject::whereIn('id',$available_idsSub)->get();
            // $available_idsSub = GradeSubject::find(1)->subject;
           // return $avaiSub;

            return response()->json([
                'success'=>true,
                'lists'=>$periods,
                'sublists'=>$avaiSub

            ]);
        }

        $timetable = timetable::find($id);
        return view('timetable.show',compact('timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax()){
            $available_ids = TeacherSubject::where('subject_id',request()->subject_id)->pluck('teacher_id');
            $teachers =Teacher::whereIn('id',$available_ids)->get();
            return response()->json([
                'success'=>true,
                'lists'=>$teachers
            ]);
        }
        $timetable = Timetable::find($id);
        
        // $period=Period::pluck('id','periodCode');   
        // return $timetable;
         $subjects=Subject::pluck('id','subjectCode'); 
         //$division =Timetable::pluck('id','division');  
        // $timetable1 =Timetable::pluck('id','timetable');  
         $grade=Grade::pluck('id','gradeName'); 
         //return $grade;  
         $period=Period::pluck('id','periodCode');   
         $teacher=Teacher::pluck('id','teacherName'); 
         return view('timetable.edit',compact('timetable','subjects','grade','period','teacher'));
 
   
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
        $timetable = Timetable::find($id);
        //$timetable->timetable=$request->timetable;

        $timetable->period_id = $request->period_id;
        $timetable->grade_id = $request->grade_id;

      //  $timetable->division = $request->division;
        $timetable->subject_id = $request->subject_id;
        $timetable->teacher_id = $request->teacher_id;
        $timetable->update();
        return redirect('/timetable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = Timetable::find($id);
        $timetable->delete();
        return redirect('/timetable');
    }
}
