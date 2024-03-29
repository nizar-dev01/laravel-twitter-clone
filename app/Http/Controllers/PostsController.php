<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data = request()->validate([
            'image' => ['required','image'],
            'caption' => 'required'
        ]);

        $img_path = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$img_path}"))->fit(1200,1200);

        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $img_path
        ]);



        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(\App\Post $post){
        return view('profiles.show',compact('post'));
    }
}
