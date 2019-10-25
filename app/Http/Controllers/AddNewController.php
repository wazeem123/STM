<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class AddNewController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $data2=User::all();

        return view('addNewUser.addnew')->with('user',$data2);     

         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data2=User::all();
        return view('addNewUser.addnew')->with('user',$data2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data2=User::all();

        $request -> validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email'=>$request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect('addNewUser')->with('flash_message', 'Succefully Added New User!');
		
		//return Redirect::to('/user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id)
    {
        //
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
   
}

