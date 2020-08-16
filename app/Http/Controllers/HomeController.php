<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = \App\User::findOrFail($id);
        // dd($user);
        if(!$user->profile) $user->profile = [];
        if(!$user->posts) $user->posts = [];
        // dd($user);
        return view('profiles.index',[
            'user' => $user
        ]);
    }
}
