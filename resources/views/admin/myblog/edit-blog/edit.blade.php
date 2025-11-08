@extends('layouts.admin_app')

@section('title', 'Edit Blog')

@section('content')
<div class="p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">Edit Blog</h2>

    <form action="{{ route('admin.myblog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="mt-1 w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Image</label>
            @if($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}" class="h-32 mb-2 rounded">
            @endif
            <input type="file" name="image" class="mt-1 w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Description</label>
            <textarea name="description" id="editor" rows="10" class="w-full border rounded-lg p-2">{{ old('description', $blog->description) }}</textarea>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Update Blog</button>
    </form>
</div>
@endsection
