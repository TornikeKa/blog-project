@extends('layouts.app')

@section('content')
    @guest

    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($posts as $post)
                            <div class="col">
                                <div class="card mt-4">
                                    <img src="{{ asset('images/'.$post->image_path) }}" class="card-img-top" alt="Sorry images couldn't be loaded">
                                    <div class="card-body">
                                        <a href="posts/{{ $post->id }}">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                        </a>
                                        <p class="card-text">{{ $post->description }}</p>
                                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                                        <form action="/posts/{{ $post->id }}" method="POST"> @csrf @method('delete')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-muted">{{ $post->created_at }}</div>
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
