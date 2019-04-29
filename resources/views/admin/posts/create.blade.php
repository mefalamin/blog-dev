@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')


    <div class="card">

        <div class="card-header">

            Create a new post

        </div>

        <div class="card-body">

            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Select a category</label>
                    <select id="category" name="category_id" class="form-control">
                        <option selected="selected" disabled="disabled">Please select a category for this post</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" cols="5" rows="5" name="content" class="form-control" ></textarea>

                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Store post</button>
                    </div>
                </div>
            </form>
        </div>

    </div>



@endsection

