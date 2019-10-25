<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timetable;
use App\Grade;
use App\Teacher;
use App\Subject;
use App\Period;
use DB;

class viewController extends Controller
{
    public function show()
    {
        
        // $id = $request -> id ;
        // $data = teacher ::find($id);
        $grades = DB::table('grades')->get();
        $subjects = DB::table('subjects')->get();
        $teachers = DB::table('teachers')->get();
        $periods = DB::table('periods')->get();
        $grades1 = '1';
        $grd = '6A' ;
        //$timetables = DB::table('timetables')->get();
        $timetables = DB::table('timetables')->where('grade_id', '=',$grades1  )->get();
        // $data -> delete();
        //return redirect()->back();
        return view('dashboard',compact('timetables','subjects','grades1','grades','periods','grd','teachers'));
    }
    public function update(Request $request)
    {
        $request-> validate([
            'grade'=>'required'            
        ],
    [
        'grade.required'=>'Select the grade'
    ]);
        $id = $request ->grade ;
        $grades = DB::table('grades')->get();
        $subjects = DB::table('subjects')->get();
        $periods = DB::table('periods')->get();
        $teachers = DB::table('teachers')->get();
        $grades1 = $id ;
        $grd = Grade ::find($id);
        $grd = $grd->gradeName;
        $timetables = DB::table('timetables')->where('grade_id', '=', $grades1 )->get();
        // $data = teacher ::find($id);
        // $users = DB::table('timetables')->where('teacher_id', '=', $data ->teacher_id )->delete();
        // $users1 = DB::table('teaches')->where('teacher_id', '=', $data ->teacher_id )->delete();
        // $users2 = DB::table('attendances')->where('teacher_id', '=', $data ->teacher_id )->delete();
        // $data -> delete();
        // return redirect()->back();
        return view('dashboard',compact('timetables','subjects','grades1','grades','periods','grd','teachers'));
    }
}
