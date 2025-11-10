<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.myblog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.myblog.add-blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('title', 'description', 'keywords');
        $data['slug'] = Str::slug($data['title']);
        $data['excerpt'] = Str::limit(strip_tags($data['description']), 120);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);
        return redirect()->route('admin.myblog')->with('success', 'Blog created successfully!');
    }


    public function edit(Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);
        return view('admin.myblog.edit-blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('title', 'description', 'keywords');
        $data['slug'] = Str::slug($data['title']);
        $data['excerpt'] = Str::limit(strip_tags($data['description']), 120);

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.myblog')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return back()->with('success', 'Blog deleted successfully!');
    }

    public function toggleFeatured($id)
    {
        $blog = Blog::findOrFail($id);

        // ✅ If we're trying to set this blog as featured
        if (!$blog->featured) {
            $featuredCount = Blog::where('featured', true)->count();

            if ($featuredCount >= 5) {
                return back()->with('error', 'You can only feature up to 5 blogs.');
            }
        }

        // ✅ Toggle featured state
        $blog->featured = !$blog->featured;
        $blog->save();

        return back()->with('success', $blog->featured ? 'Blog marked as featured!' : 'Blog unfeatured.');
    }

}
