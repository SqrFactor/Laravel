@extends('layouts.app')

@section('content')

    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
            <div class="col-md-8">Post Table</div>
            <div class="col-md-2" style="margin-right:-20px;"><a href="{{ route('post.trash') }}" class="btn btn-default btn-xs">
                        Trashed Posts</a></div>
            <div class="col-md-2" ><a href="{{ route('post.create') }}" class="btn btn-default btn-xs">
                        Create New Post</a></div>
            </div>
        </div>
        <div class="panel-body">
    <table class="table table-hover">
        <thead>
            <th style="width: 20%;">
              Image
            </th>
            <th >
              Title
            </th>
            <th style="width: 10%;">
              Edit
            </th>
            <th style="width: 10%;">
              Trash
            </th>
            <th style="width: 10%;">
              Delete
            </th>
            </thead>
            <tbody>
                
                @foreach($posts as $post)
                @if($post->count() > 0)
           
                
                <tr>
                    <td>
                         <img src="{{ $post->featured_img }}" alt="{{$post->Post_title}}" width="120px" height="50px"/> 

                        
                     </td>
                    <td>
                       <strong> {{$post->Post_title}} </strong>
                     </td> 
                    <td>
                        <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-primary btn-xs">
                        Edit</a>
                     </td>
                    <td>
                        <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-warning btn-xs">
                        Trash</a>
                     </td>
                    <td>
                        <a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-danger btn-xs">
                        Delete</a>
                     </td>
                    
                </tr>
                @else
                  <td> <strong> No Published Post </strong></td>
                      
                   
                  @endif
                  @endforeach               
            </tbody>
    </table>
    </div>
</div>

@stop