@extends('layouts.app')

@section('styles')
    <style>
    #outer {
        width: auto;
        text-align: center;

    }
    .inner
    {
        display: inline-block;
    }

    </style>

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <a href="{{route('post.create')}}" class=" inner btn btn-sm btn-success">Create New Post</a>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">

                        @if(Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('alert-success')}}
                            </div>

                        @endif

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Body</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->body}}</td>
                                                <td id="outer">
                                                    <a href="{{route('post.show', $post->id)}}" class=" inner btn btn-sm btn-info">View</a>
                                                    <a href="{{route('posts.edit', $post->id)}}" class="inner btn btn-sm btn-success">Edit</a>
                                                    <form action="" class="inner">
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
