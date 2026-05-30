<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $query = Post::get();

        return response()->json($query);
    }

    public function store(Request $request)
    {
        $post= new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json($post, 200);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return response()->json($post, 200);
    }

    public function destroy($id){
        $post =Post::where('id', $id)->delete();
        if($post) {
            return response()->json(['message' => 'Post deleted successfully'], 200);
        }else{
            return response()->json(['message' => 'Post not found'], 404);
        }

    }
}
