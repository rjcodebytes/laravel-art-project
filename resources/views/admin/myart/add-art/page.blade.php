@extends('layouts.admin_app')

@section('title', 'Add New Painting')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-indigo-100 p-8">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">🎨 Add New Painting</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.myart.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-200 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-200"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Art Type</label>
                    <input type="text" name="art_type" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Orientation</label>
                    <select name="orientation" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>Portrait</option>
                        <option>Landscape</option>
                        <option>Square</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Dimensions (W x H)</label>
                    <input type="text" name="dimensions" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Medium</label>
                    <input type="text" name="medium" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Category</label>
                    <input type="text" name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Year Created</label>
                    <input type="number" name="year_created" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Upload Images (up to 5)</label>
                <input id="images-input" type="file" name="images[]" multiple accept="image/*" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <!-- preview container -->
                <div id="image-preview" class="mt-3 grid grid-cols-3 gap-3"></div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Tags</label>
                <input type="text" name="tags" placeholder="e.g. abstract, modern, canvas" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                    <option value="draft" selected>Draft</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Save Painting
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Preview script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('images-input');
    const preview = document.getElementById('image-preview');
    const MAX_FILES = 5;

    function renderPreviews(files) {
        preview.innerHTML = '';
        const filesToShow = files.slice(0, MAX_FILES);
        filesToShow.forEach((file) => {
            if (!file.type.startsWith('image/')) return;
            const reader = new FileReader();
            reader.onload = (e) => {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative rounded overflow-hidden border border-gray-200';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = file.name;
                img.className = 'w-full h-32 object-cover';

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'absolute top-1 right-1 bg-white bg-opacity-80 rounded-full p-1 text-red-600 shadow';
                removeBtn.innerHTML = '&times;';
                removeBtn.title = 'Remove';

                removeBtn.addEventListener('click', () => {
                    // remove this file from input.files using DataTransfer
                    const dt = new DataTransfer();
                    Array.from(input.files).forEach((f) => {
                        if (!(f.name === file.name && f.size === file.size && f.lastModified === file.lastModified)) {
                            dt.items.add(f);
                        }
                    });
                    input.files = dt.files;
                    // re-render based on updated files
                    renderPreviews(Array.from(input.files));
                });

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });

        if (files.length > MAX_FILES) {
            const note = document.createElement('p');
            note.className = 'text-xs text-gray-500 col-span-3 mt-1';
            note.textContent = `Showing first ${MAX_FILES} images. Only ${MAX_FILES} will be uploaded.`;
            preview.appendChild(note);
        }
    }

    input.addEventListener('change', (e) => {
        renderPreviews(Array.from(e.target.files));
    });
});
</script>
@endsection
