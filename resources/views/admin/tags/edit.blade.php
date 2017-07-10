@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Update Tag : <strong>{{ $tag->tag }}</strong>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('tag.update', ['id'=>$tag->id]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Category name">Tag Name</label>
                    <input type="text" class="form-control" value="{{$tag->tag}}" name="TagUpdate">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Update Tag </button>
                </div>
            </form>
        </div>
         

    </div>


@stop