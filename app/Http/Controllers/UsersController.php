<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;

class UsersController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        $users = User::all();
        $profiles = Profile::all();
        //dd($users->all()->profile);
        
        
        return view('admin.users.index',  [ 'users' => $users  ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_name' => 'required',
            'user_email' => 'required | email',
        ]);
        $user = User::create([
            'name' => $request->user_name,
            'email'=> $request->user_email,
            'password' => bcrypt('password'),
        ]);
        
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png',
        ]);
        
        Session::flash('success', 'User created successfully.');
        return redirect()->route('users','profile');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('success', 'User deleted permanently.');
        return redirect()->back();
        
    }
    
    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success','Admin made successfully.');
        return redirect()->back();
    }
    
     public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success','Admin removed successfully.');
        return redirect()->back();
    }
}
