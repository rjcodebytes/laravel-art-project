<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Painting;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        // Redirect if already logged in
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login'); // create this blade
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function dashboard()
    {
        return view('admin.dashboard.page'); // create this blade
    }

    public function myArt()
    {
        $paintings = Painting::latest()->paginate(10);
        return view('admin.myart.page', compact('paintings'));
    }

    public function addNewArt()
    {
        return view('admin.myart.add-art.page'); // create this blade
    }

    public function myBlog()
    {
        return view('admin.myblog.page'); // create this blade
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
