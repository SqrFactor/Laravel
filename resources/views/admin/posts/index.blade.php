@extends('layouts.app')

@section('content')

    
    <div class="panel panel-primary">
        <div class="panel-heading">Categories Table</div>
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
                  @endforeach               
            </tbody>
    </table>
    </div>
</div>

@stop