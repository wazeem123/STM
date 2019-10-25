<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\GradeSubject;
use App\Timetable;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grade.index',compact('grades'));
        return $grades;
    }
    public function grade()
    {
        $timetables = Timetable :: all();
        $grade1 = Grade::pluck('id','gradeName');
        return view('index',compact('grade1','timetables'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create');
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
            'gradeName'=>'required|min:2|max:10|unique:grades,gradeName',
           // 'orderNo'=>'required|unique:grades,orderNo'
         ],
         [
            'gradeName.required'=>'Fill out the Grade',
            'gradeName.unique'=>' Grade name has already been taken',
           // 'orderNo.required'=>'Fill out the Order number',
           // 'orderNo.unique'=>'Order number has already been taken'
         ]);
         
        $grade = new Grade;
        $upname = $request->gradeName; 
        $grade->gradeName=strtoupper($upname);
        $grade->section=$request->section;
       // $grade->orderNo=$request->orderNo;
        $grade->save();
        return redirect('/grade');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade =grade::find($id);
        return view('grade.show',compact('grade'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade =Grade::find($id);
        return view('grade.edit',compact('grade'));
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
            'gradeName'=>'required|unique:grades,id,'.$id,
           // 'orderNo'=>'required|unique:grades,id,'.$id
         ],
         [
            'gradeName.required'=>'Fill out the Grade',
            'gradeName.unique'=>' Grade name has already been taken',
           // 'orderNo.required'=>'Fill out the Order number',
            'orderNo.unique'=>'Order number has already been taken'
         ]);
        $grade = Grade::find($id);        
        $grade->gradeName= $request->gradeName;
        $grade->section=$request->section;
        //$grade->orderNo = $request->orderNo;
        $grade->update(); // or $grade->save();
        return redirect('/grade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $grade =Grade ::find($id);
        $grade->delete();
        // $grade=Grade::where('grade_id',$id);
        $gradeSubject=GradeSubject::where('grade_id',$id)->delete();
        $timetable=Timetable::where('grade_id',$id)->delete();

        // $grade->delete();
        return redirect('/grade');
    }
}
