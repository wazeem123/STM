<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupSubject;
use App\Subject;
use App\Group;

class GroupSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $group_subjects = GroupSubject::all();
       $group_subjects = GroupSubject::with('Group','Subject')->get();
        return view('groupSubject.index',compact('group_subjects'));
        return $group_subjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = Group::pluck('id','groupName');
        $subject = Subject::pluck('id','subjectCode');
        return view('groupSubject.create',compact('group','subject'));
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
            'subid'=>'required|unique:group_subjects,subject_id',
            'gid'=>'required'
        ],
        [
            'gid.required'=>'Fill out the group of the subject',
            'subid.required'=>'Fill out the subject',
            'subid.unique'=>'Grade has already been taken'

        ]);
        $groupSubject = new GroupSubject;
        $groupSubject->group_id = $request->gid;
        $groupSubject->subject_id = $request->subid;
        $groupSubject->save();
        return redirect('/groupSubject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupSubject = GroupSubject::find($id);
        return view('groupSubject.show',compact('groupSubject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groupSubject = GroupSubject::find($id);
        $group = Group::pluck('id','groupName');
        $subject = Subject::pluck('id','subjectCode');
        return view('groupSubject.edit',compact('groupSubject','group','subject'));
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
        $groupSubject = GroupSubject::find($id);
        $groupSubject->group_id = $request->gid;
        $groupSubject->subject_id = $request->subid;
        $groupSubject->update();
        return redirect('/groupSubject');
    }
        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupSubject = GroupSubject::find($id);
        $groupSubject->delete();
        return redirect('/groupSubject');
    }
}
