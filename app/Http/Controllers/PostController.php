<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Post $post) {
        $posts = auth()->user()->posts;
        //dd($posts);
        return  view('index', compact('posts'));
    }
    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'required'
        ]);

        $post = auth()->user()->posts()->create($data);

        return redirect('/posts/'.$post->id);
    }

    public function show(Post $post) {
        $post->load('comments.replays');
        //dd($post);
        return view('posts.show', compact('post', ));
    }
}
