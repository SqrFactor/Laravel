<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::User();
        return view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $this->validate($request,[
           'user_name_edit' => 'required',
            'user_email_edit' => 'required|email',
            'user_facebook_edit' => 'required | url',
            'user_linkedin_edit' => 'required | url',
            'file'         => 'size:max:500',
        ]);
        
        $user = Auth::user();
        if($request->hasFile('user_avatar_edit')){
            $avatar = $request->user_avatar_edit;
        $avatar_new_name = time().$avatar->getClientOriginalName();
        $avatar -> move('uploads/avatars', $avatar_new_name);
        $user->profile->avatar = 'uploads/avatars/'.$avatar_new_name;
            
       }
        
        if($request->has('user_password_edit')){
            $user->password = bcrypt('$request->user_password_edit');
        }
        
            
        
        
        $user->name = $request->user_name_edit;
        $user->email = $request->user_email_edit;
        $user->profile->facebook = $request->user_facebook_edit;
        $user->profile->linkedin = $request->user_linkedin_edit;
        $user->profile->about = $request->user_about_edit;
    
        $user->save();
        $user->profile->save();
        
//        if($request->has('user_password_edit')){
//            $user->password = bcrypt('$request->user_password_edit');
//        }
        //dd($request->all());
        
        Session::flash('success','Profile Updated Successfully.');
        
        return redirect()->back();
        
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
    }
}
