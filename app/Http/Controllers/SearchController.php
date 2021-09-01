<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchPost(Request $request)
    {
        $search = $request->input('search');
        $post = Post::where('title','LIKE', '%'.$search.'%')->get();
        //dd($post);

        return view('posts.search')->with('posts', $post);
    }
}
