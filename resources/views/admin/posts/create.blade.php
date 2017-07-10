@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Create a new post
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title"> Title</label>
                    <input type="text" class="form-control" placeholder="Title of the post" name="postTitleInput">
                </div>
                <div class="form-group">
                    <label for="featured"> Featured Image </label>
                    <input type="file" class="form-control" placeholder="Title of the post" name="featuredImageInput">
                </div>
                <div class="form-group">
                    <label for="category"> Select a Category </label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags"> Select tags </label>

                    @foreach($tags as $tag)
                    <div class="checkbox">
                         <label><input type="checkbox" value="{{$tag->id}}" name="tags[]">{{$tag->tag}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content"> Content</label>
                    <textarea class="form-control" placeholder="Content of the post" name="postContentInput" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Publish Post</button>
                </div>
            </form>
        </div>
         

    </div>


@stop