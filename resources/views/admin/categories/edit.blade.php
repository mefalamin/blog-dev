@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="card">

        <div class="card-header">


            Update category: {{ $category->name }}

        </div>

        <div class="card-body">

            <form action="{{ route('category.update',['id' => $category->id ]) }}" method="post" >

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" name="name" value="{{ $category->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update category</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection