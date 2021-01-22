<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display the admin of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $tags = Tag::all();
        return view('tag.admin', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Tag();
        $tags = Tag::all();
        return view('tag.form', compact('post', 'tags'));
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
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $post = new Tag();
        $post->name = $request->input('name');
        $post->save();

        return redirect()->route('tags-admin');
    }

    /**
     * Display all posts of a tag resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::all();
        $tag = Tag::find($id);

        $posts = $tag->posts()->get();
        return view('tag.show', compact('posts', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $tags = Tag::all();
        return view('tag.form', compact('tag', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $post = Tag::find($id);
        $post->name = $request->input('name');
        $post->save();

        return redirect()->route('tags-admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Tag::find($id);
        $post->delete();

        return redirect()->route('tags-admin');
    }
}
