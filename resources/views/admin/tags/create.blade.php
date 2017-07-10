@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Create a new tag
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('tag.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Create Category">Create a Tag</label>
                    <input type="text" class="form-control" placeholder="Tag Name" name="TagInput">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Add Tag </button>
                </div>
            </form>
        </div>
         

    </div>


@stop