@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')


    <div class="card">

        <div class="card-header">

            Edit post : {{ $post->title }}

        </div>

        <div class="card-body">

            <form action="{{ route('post.update',['id' => $post->id]) }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Current featured image
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ $post->featured }}" class="img-responsive" width="100px" height="100px">

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="featured">Featured image</label>
                            <input type="file" name="featured" class="form-control">
                        </div>
                    </div>
                </div>

                <br>


                <div class="form-group">
                    <label for="category">Select a category</label>
                    <select id="category" name="category_id" class="form-control">
                        <option selected="selected" disabled="disabled">Please select a category for this post</option>
                        @foreach($categories as $category)
                            <option @if($category->id == $post->category_id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" cols="5" rows="5" name="content" class="form-control" >{{$post->content}}</textarea>

                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update post</button>
                    </div>
                </div>
            </form>
        </div>

    </div>



@endsection

