<?php

namespace App\Http\Controllers;

use \App\Post;

use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,

        ]);

        return redirect('/profile/' . auth()->user()->id);

    }

    public function index()
    {

        $posts = Post::latest()->get();

        return view('/home', compact('posts'));
    }

    public function deletePost($id)
    {

        DB::table('posts')->where('id', $id)->delete();

        return redirect('/home');

    }


}
