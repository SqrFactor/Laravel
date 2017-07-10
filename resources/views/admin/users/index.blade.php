@extends('layouts.app')

@section('content')

    
    <div class="panel panel-primary">
        <div class="panel-heading">Users Table</div>
        <div class="panel-body">
    <table class="table table-hover">
        <thead>
            <th style="width: 20%;">
              Avatar
            </th>
            <th >
              User
            </th>
            <th style="width: 15%;">
              Permission
            </th>
            <th style="width: 15%;">
              Delete
            </th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                            @foreach($users->profiles as $profile)
                         <img src="{{asset($profile->avatar)}}" alt="{{$user->name}}" width="50px" height="50px" style="border-radius:20%;"/> 
                            <!-- //-->
                            @endforeach
                        
                     </td>
                    <td>
                       <strong> {{$user->name}} </strong>
                     </td> 
                   
                    <td>
                        Permission
                     </td>
                    <td>
                        Delete
                     </td>
                    
                </tr>
                  @endforeach               
            </tbody>
    </table>
    </div>
</div>

@stop