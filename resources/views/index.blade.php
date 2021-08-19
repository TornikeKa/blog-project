@extends('layouts.app')

@section('content')
    @guest
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Posts</div>

                        <div class="card-body">
                            <ul class="list-group-item-info">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/posts/create" class="btn btn-info">Create Post</a>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($posts as $post)
                            <div class="col">
                                <div class="card mt-4">
                                    <!--<img src="{{ $post->image_path }}" class="card-img-top" alt="Sorry image couldn't be loaded">-->
                                    <div class="card-body">
                                        <a href="posts/{{ $post->id }}">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        </a>
                                        <p class="card-text">{{ $post->description }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $post->created_at }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
