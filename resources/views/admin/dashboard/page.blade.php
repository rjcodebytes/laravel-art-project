@extends('layouts.admin_app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-gradient-to-br from-indigo-50 via-white to-pink-50 h-screen flex items-center justify-center px-6 py-10">
        <div class="w-full max-w-5xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-2 tracking-tight">Welcome to the Admin Dashboard</h2>
                <p class="text-gray-500 text-sm">Manage your creative world with ease 🎨</p>
            </div>

            <!-- Cards Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Art Management Card -->
                <div
                    class="group bg-white/70 backdrop-blur-md border border-gray-200 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 text-indigo-600 mx-auto mb-5">
                        <i class="fa-brands fa-artstation text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center text-gray-800 mb-3">Art Management</h3>
                    <p class="text-gray-500 text-center mb-6 text-sm leading-relaxed">
                        Upload, edit, and manage artworks showcased on the marketplace.
                    </p>
                    <div class="flex justify-center">
                        <a href="{{ route('admin.myart') }}"
                            class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition">
                            Manage Artworks
                        </a>
                    </div>
                </div>

                <!-- Blog Management Card -->
                <div
                    class="group bg-white/70 backdrop-blur-md border border-gray-200 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-pink-100 text-pink-600 mx-auto mb-5">
                        <i class="fa-solid fa-newspaper text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center text-gray-800 mb-3">Blog Management</h3>
                    <p class="text-gray-500 text-center mb-6 text-sm leading-relaxed">
                        Create and manage blog posts to engage with the art community.
                    </p>
                    <div class="flex justify-center">
                        <a href="{{ route('admin.myblog') }}"
                            class="px-5 py-2.5 bg-pink-600 text-white text-sm font-medium rounded-lg shadow hover:bg-pink-700 transition">
                            Manage Blogs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
