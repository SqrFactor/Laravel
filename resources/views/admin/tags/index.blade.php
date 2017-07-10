@extends('layouts.app')

@section('content')

    
    <div class="panel panel-primary">
        <div class="panel-heading">Tags Table</div>
        <div class="panel-body">
    <table class="table table-hover">
        <thead>
            <th>
              Tag Name
            </th>
            <th style="width: 10%;">
              Edit
            </th>
            <th style="width: 10%;">
              Delete
            </th>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->tag}}
                     </td> 
                    <td>
                        <a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-default btn-xs">
                        Edit</a>
                     </td>
                    <td>
                        <a href="{{route('tag.delete',['id'=>$tag->id])}}" class="btn btn-danger btn-xs">
                        Delete</a>
                     </td>
                    
                </tr>
                  @endforeach               
            </tbody>
    </table>
    </div>
</div>

@stop