@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Post
                    </div>

                        <div class="card-body">
                            <h4>Edit Post</h4>
                            <form method="POST" action="{{route('post.update')}}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Body</label>
                                <textarea name="body" class="form-control" cols="5" rows="5">
                                    {{$post->body}}
                                </textarea>
                                <div>
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </div>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection
