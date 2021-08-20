<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
    public function store(Request $request) {
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
    public function edit(Post $post) {
        return view('posts.edit', compact('post', ));
    }
    public function update(Request $request) {
        $data = request()->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $post = auth()->user()->posts()->update($data);

        return redirect('/');
    }
    public function delete(Post $post) {
        $post->delete();
        redirect('/posts');
    }
}
