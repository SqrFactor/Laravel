@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Create a new post
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('post.update', ['id'=>$post->id])}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title"> Title</label>
                    <input type="text" class="form-control"  name="postTitleUpdate" value="{{$post->Post_title}}">
                </div>
                <div class="form-group">
                    <label for="featured"> Featured Image </label>
                    <input type="file" class="form-control" value="{{$post->featured_img}}" name="featuredImageUpdate">
                </div>
                <div class="form-group">
                    <label for="category"> Select a Category </label>
                    <select class="form-control" id="category" name="category_id_update">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                    @if($post->category->id == $category->id)
                                        selected
                                    @endif>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags"> Select tags </label>

                    @foreach($tags as $tag)
                    <div class="checkbox">
                         <label><input type="checkbox" value="{{$tag->id}}" name="tags[]" 
                                @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                                    />{{$tag->tag}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content"> Content</label>
                    <textarea class="form-control" value="{{$post->Post_body}}" name="postContentUpdate" rows="5">
                        {{$post->Post_body}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Update Post</button>
                </div>
            </form>
        </div>
         

    </div>


@stop

