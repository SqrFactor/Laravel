@extends('layouts.app')

@section('content')

    
    <div class="panel panel-primary">
        <div class="panel-heading">
         <div class="row">
            <div class="col-sm-10">Trashed Post Table</div>
            <div class="col-sm-1 col-sm-offset-1"><a href="{{ route('posts.index') }}" class="btn btn-default btn-xs">
                        Back</a></div>
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
              Restore
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
                        Edit
                     </td>
                    <td>
                        <a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success btn-xs">Restore</a>
                        
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