<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function show(User $user) {
        //$user = auth()->user()->user;
        //dd($user);
        return view('user.settings', compact('user'));
    }
    public function update() {
        $data = request()->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $post = auth()->user()->update($data);

        return redirect('/');
    }
}
