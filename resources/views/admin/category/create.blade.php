@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Create a new post
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('category.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Create Category">Create a Category</label>
                    <input type="text" class="form-control" placeholder="Category Name" name="categoryInput">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Add Category </button>
                </div>
            </form>
        </div>
         

    </div>


@stop