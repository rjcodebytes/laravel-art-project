<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Painting;
use Illuminate\Http\Request;

class PaintingController extends Controller
{
    public function index()
    {
        $paintings = Painting::latest()->paginate(10);
        return view('collection', compact('paintings'));
    }

    // Fetch single painting details
    public function show($slug)
    {
        $painting = Painting::where('slug', $slug)->firstOrFail();
        return response()->json($painting);
    }
}
