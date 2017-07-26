@extends('layouts.app')

@section('content')

    
    <div class="panel panel-primary">
        <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">Users Table</div>
            <div class="col-md-2">
                <a href="{{ route('user.create') }}" class="btn btn-default btn-xs">                      Add User</a></div>             
            </div>
        </div>
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
                            
                         <img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" width="50px" height="50px" style="border-radius:20%;"/> 
                            <!-- //-->
                         
                        
                     </td>
                    <td>
                       <strong> {{$user->name}} </strong>
                     </td> 
                   
                    <td>
                        @if(Auth::id() == $user->id)
                                              
                        @if($user->admin)
                            <a href="{{route('user.not.admin', ['id'=> $user->id])}}" class="btn btn-danger btn-xs" disabled>
                        Remove Admin</a>
     
                        @else
                           <a href="{{route('user.admin', ['id'=> $user->id])}}" class="btn btn-success btn-xs">
                        Make Admin</a>
                        @endif
                        
                        @else
                        @if($user->admin)
                            <a href="{{route('user.not.admin', ['id'=> $user->id])}}" class="btn btn-danger btn-xs" >
                        Remove Admin</a>
     
                        @else
                           <a href="{{route('user.admin', ['id'=> $user->id])}}" class="btn btn-success btn-xs">
                        Make Admin</a>
                        @endif
                         @endif
                     </td>
                    <td>
                        @if(Auth::id() == $user->id)
                        <a href="{{route('user.delete', ['id'=> $user->id])}}" class="btn btn-danger btn-xs" disabled>
                        Delete</a>
                        @else
                         <a href="{{route('user.delete', ['id'=> $user->id])}}" class="btn btn-danger btn-xs">
                        Delete</a>
                        @endif
                     </td>
                    
                </tr>
                  @endforeach               
            </tbody>
    </table>
    </div>
</div>

@stop