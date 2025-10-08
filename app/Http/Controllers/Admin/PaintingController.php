<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PaintingController extends Controller
{
    public function index()
    {
        $paintings = Painting::latest()->paginate(10);
        return view('admin.paintings.index', compact('paintings'));
    }

    public function create()
    {
        return view('admin.paintings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'art_type' => 'required|string',
            'orientation' => 'required|string',
            'dimensions' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'medium' => 'nullable|string',
            'color_palette' => 'nullable|string',
            'year_created' => 'nullable|digits:4|integer',
            'category' => 'nullable|string',
            'artist_name' => 'nullable|string',
            'tags' => 'nullable|string',
            'status' => 'required|string|in:public,private,draft',
        ]);

        // Handle multiple image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('paintings', 'public');
                $imagePaths[] = $path;
            }
        }

        $validated['images'] = $imagePaths;
        $validated['slug'] = Str::slug($validated['title'] . '-' . Str::random(5));

        Painting::create($validated);

        return redirect()->route('admin.myart')->with('success', 'Painting added successfully!');
    }

    public function destroy($id)
    {
        $painting = Painting::findOrFail($id);

        // Delete images from storage if they exist
        if (!empty($painting->images)) {
            $images = is_array($painting->images) ? $painting->images : json_decode($painting->images, true);
            foreach ($images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        // Delete painting record
        $painting->delete();

        return redirect()->route('admin.myart')->with('success', 'Painting deleted successfully!');
    }
}
