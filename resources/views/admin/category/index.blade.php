@extends('layouts.app')

@section('content')

    
    <div class="panel panel-primary">
        <div class="panel-heading">Categories Table</div>
        <div class="panel-body">
    <table class="table table-hover">
        <thead>
            <th>
              Category Name
            </th>
            <th style="width: 10%;">
              Edit
            </th>
            <th style="width: 10%;">
              Delete
            </th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{$category->category_name}}
                     </td> 
                    <td>
                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-default btn-xs">
                        Edit</a>
                     </td>
                    <td>
                        <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger btn-xs">
                        Delete</a>
                     </td>
                    
                </tr>
                  @endforeach               
            </tbody>
    </table>
    </div>
</div>

@stop