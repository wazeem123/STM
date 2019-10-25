<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Timetable;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();
        return view('period.index',compact('periods'));
        return $periods;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('period.create');
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
            'day'=>'required',
            // 'grade_id,subject_id'=>'required|unique:grade_subjects,grade_id,subject_id'
            'pcode'=>'required|max:5|min:5|unique:periods,PeriodCode,Null,id,day,'.$request->day
            //'stime'=>'required',
            //'etime'=>'required',
        ],
        [
            'pcode.required'=>'Fill out the grade',
            'pcode.unique'=>'Period code name has already been taken'


           // 'stime.required'=>'Fill out the subject',
            //'etime.required'=>'Fill out the subject',

        ]);
        $period = new Period; 
        $period->day=$request->day;
        $period->periodCode=ucfirst($request->pcode);
        // $period->startTime=$request->stime;// stime is the value we receive in create form for start Time
        // $period->endTime=$request->etime;
        $period->save();
        return redirect('/period');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $period =Period::find($id);
        return view('period.show',compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $period =Period::find($id);
        $day=Period::pluck('id','day');       

        return view('period.edit',compact('period','day'));
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
            'day'=>'required',
            // 'grade_id,subject_id'=>'required|unique:grade_subjects,grade_id,subject_id'
            'pcode'=>'required|max:5|min:5|unique:periods,PeriodCode,'.$id
            //'stime'=>'required',
            //'etime'=>'required',
        ],
        [
            'pcode.required'=>'Fill out the grade'
           // 'stime.required'=>'Fill out the subject',
            //'etime.required'=>'Fill out the subject',

        ]);
        
        $period = Period::find($id);        
        $period->day= $request->day;
        $period->periodCode=ucfirst( $request->pcode);
        // $period->startTime= $request->stime;
        // $period->endTime= $request->etime;
        $period->update(); 
        return redirect('/period');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period =Period ::find($id);
        $period->delete();
        $timetable=Timetable::where('period_id',$id)->delete();
        return redirect('/period');
    }
}
