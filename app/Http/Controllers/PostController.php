<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import the Post model
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Method to display all posts
    public function index()
    {
        $posts = Post::all();
        return view('post', compact('posts'));
    }


    public function show($id)
    {
        $post = Post::findOrFail($id); // Find the post by ID
        return view('post.show', compact('post'));
    }
}
