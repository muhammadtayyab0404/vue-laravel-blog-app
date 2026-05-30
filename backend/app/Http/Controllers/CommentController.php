<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showcomments($post)
    {
    
        $comments= Comment::where('post_id', $post)->get();

        if($comments->isEmpty()){
            return response()->json($comments, 200);
        }
        return response()->json($comments);
    }

    public function addComment($id,Request $request ){

     $validated = $request->validate([
        'title' => 'required',
        'content' => 'required'
    ]);

    $comment = new Comment;

    $comment->name =$request['title'];
    $comment->content =$request['content'];
    $comment->post_id = $id;
    
    if ($comment->save()){


    return response()->json([
        'message' => 'Comment Added',
        'data' => $comment
    ], 201);
    }
    else
    {
        return response()->json([
            'message' => 'Comment is not added, error'] 
            ,500);

    }
}
    }



