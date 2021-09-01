<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function store(Post $post, Request $request) {
        $data = $request->validate([
            'comment' => 'required|string|max:255',
        ]);
        $data['post_id'] = $post->id;
        $data['user_id'] = $post->user_id;
        //dd($data);
        $post = $post->comments()->create($data);

        return redirect('/posts/'.$post->post_id);
    }
}
