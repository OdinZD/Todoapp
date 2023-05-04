@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{url()->previous()}}" class="btn btn-sm btn-info">Go Back</a> <br>
                        <b>Your Post title is:</b>{{$post->title}}

                            <b>Your Post Body is:</b>{{$post->body}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
