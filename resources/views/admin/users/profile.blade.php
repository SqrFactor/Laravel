@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit your profile
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title"> UserName</label>
                    <input type="text" class="form-control" value="{{$user->name}}" placeholder="Name of the User" name="user_name_edit">
                </div>
                <div class="form-group">
                    <label for="title"> Email</label>
                    <input type="email" class="form-control" value="{{$user->email}}"placeholder="Email of the User" name="user_email_edit">
                </div>
                <div class="form-group">
                    <label for="title"> New Password</label>
                    <input type="password" class="form-control" placeholder="Email of the User" name="user_password_edit">
                </div>
                <div class="form-group">
                    <img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" width="100px" height="100px" style="border-radius:20%;"/> 
                    <input type="file" class="form-control"  name="user_avatar_edit">
                </div>
                
                <div class="form-group">
                    <label for="title"> Facebook profile</label>
                    <input type="text" class="form-control" value="{{$user->profile->facebook}}" placeholder="https://www.facebook.com/agnim" name="user_facebook_edit">
                </div>
                <div class="form-group">
                    <label for="title"> Linkedin profile</label>
                    <input type="text" class="form-control" placeholder="https://www.linkedin.com/agnim" name="user_linkedin_edit" value="{{$user->profile->linkedin}}">
                </div>
                <div class="form-group">
                    <label for="title"> About you</label>
                    <textarea class="form-control" placeholder="Describe yourself" name="user_about_edit" id="user_about_edit" cols="6" rows="6" value="{{$user->profile->about}}"></textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                </div>
            </form>
        </div>
         

    </div>


@stop