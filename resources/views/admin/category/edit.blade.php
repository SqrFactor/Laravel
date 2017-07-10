@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Update Category {{ $category->category_name }}
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('category.update', ['id'=>$category->id]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Category name">Category Name</label>
                    <input type="text" class="form-control" value="{{$category->category_name}}" name="categoryUpdate">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Update Category </button>
                </div>
            </form>
        </div>
         

    </div>


@stop