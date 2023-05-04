@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Todo App
                    </div>
                    <form method="POST" action="{{route('post.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="body" class="form-control" cols="5" rows="5"></textarea>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
