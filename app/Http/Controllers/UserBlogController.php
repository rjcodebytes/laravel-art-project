<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $posts = Blog::latest()->paginate(6);
        return view('blog', compact('posts'));
    }

    // Show single blog
    public function show($slug)
    {
        $post = Blog::where('slug', $slug)->firstOrFail();
        $recent = Blog::where('id', '!=', $post->id)->latest()->take(3)->get();

        return view('blog.show', compact('post', 'recent'));
    }
}
