@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-4">
                    <img src="{{ asset('images/'.$post->image_path) }}" class="card-img-top" alt="Sorry images couldn't be loaded">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                            {{ $post->description }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-4">
                    <div class="card-body">
                        @forelse($post->comments as $comment)
                            <p>{{$comment->comment}}</p>
                        @empty
                            <p>No Comments yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <form action="/posts/{{ $post->id }}" method="post">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            @csrf
                            <input type="text" class="form-control @error('comment') is-invalid @enderror" placeholder="Type Comment"
                                   name="comment" value="{{ old('comment') }}">
                            <button class="btn btn-outline-info" type="submit" id="comment">{{ __('Add Comment') }}</button>
                            @error('comment')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
