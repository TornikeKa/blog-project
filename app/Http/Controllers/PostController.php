<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostValidationRequests;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('index')->with('posts', Post::orderBy('updated_at', 'DESC')->paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidationRequests $request)
    {
        $data = $request->validated();
        //dd($request->title);
        $newImageName = time() . '-' . $request->title . '.'.
        $request->image_path->extension();

        $request->image_path->move(public_path('images'), $newImageName);
        $data['image_path'] = $newImageName;
        //dd($data);

        $post = auth()->user()->posts()->create($data);

        return redirect('/posts/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($post);
        $post = Post::where('id', $id)->with('user')->with('comments')->first();
        //dd($post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit')
            ->with('post', Post::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidationRequests $request, $id)
    {
        $data = $request->validated();

        $newImageName = time() . '-' . $request->title . '.'.
            $request->image_path->extension();

        $request->image_path->move(public_path('images'), $newImageName);

        $data['image_path'] = $newImageName;
        //dd($data);
        auth()->user()->posts()->where('id', $id)->update($data);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        unlink($_SERVER['DOCUMENT_ROOT']. "\images\\" . $post->image_path);
        $post->delete();
        return redirect('/');
    }
}
