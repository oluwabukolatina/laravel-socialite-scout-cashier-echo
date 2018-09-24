<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function index(Post $post){

        return response()->json(
            $post->comments()->with('user')->latest()->get()
        );

    }

    public function store(Request $request, Post $post){

        $comment = $post->comments()->create([
            'body' => $request->id,
            'user_id' => Auth::user()->id,
            'post_id' => $post->id
        ]);

        return $comment->json();
    }
}
