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
    public function store(Post $post) {
        $data = request()->validate([
            'comment' => 'required',
        ]);
        $data['post_id'] = $post->id;
        $data['user_id'] = $post->user_id;
        //dd($data);
        $post = $post->comments()->create($data);

        return redirect('/posts/'.$post->post_id);
    }
}
