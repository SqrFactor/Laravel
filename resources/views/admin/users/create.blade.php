@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Create New User
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title"> Name</label>
                    <input type="text" class="form-control" placeholder="Name of the User" name="user_name">
                </div>
                <div class="form-group">
                    <label for="title"> Email</label>
                    <input type="email" class="form-control" placeholder="Email of the User" name="user_email">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Add User</button>
                </div>
            </form>
        </div>
         

    </div>


@stop