<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'body' => ['required', 'string']
        ]);
        $post->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body
        ]);

        return redirect()->back();
    }
}
