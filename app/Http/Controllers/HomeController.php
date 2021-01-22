<?php

namespace App\Http\Controllers;

use App\Models\{Post, Tag};

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->where('active', true)->take(4)->get();
        $tags = Tag::all();
        return view('index', compact('posts', 'tags'));
    }
}
