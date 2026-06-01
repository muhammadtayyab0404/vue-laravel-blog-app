<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{
    public function index()
    {

        $query = Post::with('users')->get();
      $query->transform( function($query){
      $query->can_edit=Gate::allows('update',$query);
      $query->can_delete=Gate::allows('delete',$query);
      return $query;

      });


        return response()->json($query);
    }

    public function store(Request $request)
    {
        $post= new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $id= Auth::user()->id;
        $post->user_id = $id;
        $post->save();

        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->with('users')->first();

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

        if(Gate::denies('update', $post)){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return response()->json($post, 200);
    }

    public function destroy($id){
     
    $postss =Post::where('id', $id)->first();

     if (Gate::denies('delete', $postss)) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 403);
    }
        

        $post =Post::where('id', $id)->delete();

        if($post) {
            return response()->json(['message' => 'Post deleted successfully'], 200);
        }else{
            return response()->json(['message' => 'Post not found'], 404);
        }

    }
}
