@extends('layouts.admin_app')

@section('title', 'Add Blog')

@section('content')
<div class="p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">Add Blog</h2>

    <form action="{{ route('admin.myblog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="mt-1 w-full border rounded-lg p-2">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Image</label>
            <input type="file" name="image" class="mt-1 w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Description</label>
            <textarea name="description" id="editor" rows="10" class="w-full border rounded-lg p-2">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Save Blog</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jodit@3.24.5/build/jodit.min.js"></script>
<script>
    const editor = new Jodit('#editor', {
        height: 400,
        uploader: { insertImageAsBase64URI: true },
        toolbarAdaptive: false,
        buttons: 'bold,italic,underline,|,ul,ol,|,link,image,video,|,align,left,center,right,|,undo,redo,|,source',
    });
</script>
@endsection
