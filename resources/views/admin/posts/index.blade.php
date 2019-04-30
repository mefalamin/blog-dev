@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">
           Published posts
        </div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                <th>Image</th>
                <th> Title </th>
                <th>Edit</th>
                <th>Trash</th>
                </thead>

                <tbody>
                @if($posts->count() > 0)

                    @foreach($posts as $post)

                      <tr>
                            <td><img src="{{ $post->featured }}" class="img-responsive" width="50px" height="50px"> </td>
                            <td>{{ $post->title}}</td>
                            <td>  <a href="{{ route('post.edit',['id' => $post->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a></td>
                            <td>  <a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn btn-sm btn-danger">Trash</a></td>

                        </tr>
                    @endforeach

                @else

                    <tr>
                        <th colspan="5" class="text-center">
                            No post yet
                        </th>
                    </tr>

                @endif

                </tbody>

            </table>
        </div>
    </div>

@endsection