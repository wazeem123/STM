<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;// Group is the medel name that we have created
use App\GroupSubject;
use App\Subject;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('group.index',compact('groups'));
        return $groups;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
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
            'group'=>'required|unique:groups,groupName'
        ],
        [
            'group.required'=>'Fill out the Group name',
            'group.unique'=>'Group name has already been taken'
        ]);
        $group = new Group;  
        $group->groupName= ucfirst($request->group);
        $group->save();
        return redirect('/group');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group =Group::find($id);
        return view('group.show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group =Group::find($id);
        return view('group.edit',compact('group'));
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
        $group = Group::find($id);        
        $group->groupName= $request->group;
        $group->update(); // or $group->save();
        return redirect('/group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group =Group ::find($id);
        $group->delete();
        $groupSubject =GroupSubject::where('group_id',$id)->delete();
        //$subject =Subject::where('group_id',$id)->delete();
        
        return redirect('/group');
    }
}
