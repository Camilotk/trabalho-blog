<?php

namespace App\Http\Controllers;

use App\Models\{Post, Tag};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $tags = Tag::all();
        return view('post.list', compact('posts', 'tags'));
    }

    /**
     * Display the admin of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $posts = Post::all();
        $tags = Tag::all();
        return view('post.admin', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $post->active = true;
        $tags = Tag::all();
        return view('post.form', compact('post', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:3',
            'text' => 'required|min:3'
        ];

        $messages = [
            'title.min' => 'O titulo deve ter no mínimo 3 caracteres',
            'text.min' => 'O texto deve ter no mínimo 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $post = new Post();
        $post->post_date = Carbon::now();
        $post->title = $request->input('title');
        $post->summary = (strlen($request->text) > 500) ? substr($request->text, 0, 497) . '...' : $request->text;
        $post->text = $request->input('text');

        $post->active = ($request->input('active') === 'on') ? true : false;

        $post->save();
        $post->tags()->attach($request->input('tags'));

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::all();
        $post = Post::find($id);

        return view('post.show', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();

        return view('post.form', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:3',
            'text' => 'required|min:3'
        ];

        $messages = [
            'title.min' => 'O titulo deve ter no mínimo 3 caracteres',
            'text.min' => 'O texto deve ter no mínimo 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $post = Post::find($id);
        $post->post_date = Carbon::now();
        $post->title = $request->input('title');
        $post->summary = (strlen($request->text) > 500) ? substr($request->text, 0, 497) . '...' : $request->text;
        $post->text = $request->input('text');

        $post->active = ($request->input('active') === 'on') ? true : false;

        $post->save();
        $post->tags()->sync($request->input('tags'));

        return redirect()->route('posts-admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts-admin');
    }
}
