<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post = new Post;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->room_id = $request->room_id;

            $post->save();

            $data = Post::where('title', $request->title)->orderBy('created_at', 'desc')->first();

            return response()->json(['massage' => 'Success', 'data' => $data]);

        } catch (\Exception $e) {
            return response()->json(['massage' => 'Failed', 'data' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->room_id = $request->room_id;

            $post->save();

            $data = Post::where('title', $request->title)->orderBy('created_at', 'desc')->first();

            return response()->json(['massage' => 'Success', 'data' => $data]);

        } catch (\Exception $e) {
            return response()->json(['massage' => 'Failed', 'data' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);

            $post->delete();

            return response()->json(['massage' => 'Success', 'data' => null]);

        } catch (\Exception $e) {
            return response()->json(['massage' => 'Failed', 'data' => $e->getMessage()]);
        }
    }
}
