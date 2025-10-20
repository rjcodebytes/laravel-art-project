@extends('layouts.admin_app')

@section('title', 'Manage Paintings')

@include('admin.partials.edit-painting-modal')

@section('content')
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Painting Management</h2>
            <a href="{{ route('admin.myart.add') }}"
                class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">
                <i class="fa-solid fa-plus"></i>
                Add Painting
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Art Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Dimensions</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($paintings as $painting)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $painting->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $painting->art_type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $painting->dimensions }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $painting->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button type="button" class="text-indigo-600 hover:text-indigo-900 mr-3 edit-btn"
                                    data-id="{{ $painting->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('admin.myart.destroy', $painting->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Are you sure you want to delete this painting?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                No paintings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $paintings->links() }}
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const existingImages = document.getElementById("existingImages");
            const newImagePreview = document.getElementById("newImagePreview");
            const form = document.getElementById("editPaintingForm");

            // safe CSRF token retrieval: prefer meta tag, fallback to server token
            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
            const CSRF_TOKEN = csrfMeta ? csrfMeta.content : '{{ csrf_token() }}';

            // ✅ Open Modal and Fetch Painting
            document.querySelectorAll(".edit-btn").forEach(button => {
                button.addEventListener("click", async () => {
                    const id = button.dataset.id;
                    try {
                        const response = await fetch(`/admin/myart/edit/${id}`);
                        if (!response.ok) throw new Error('Failed to fetch painting');
                        const painting = await response.json();

                        // Fill form fields (guarding existence)
                        if (document.getElementById("edit_painting_id")) document.getElementById("edit_painting_id").value = id;
                        if (document.getElementById("edit_title")) document.getElementById("edit_title").value = painting.title || '';
                        if (document.getElementById("edit_description")) document.getElementById("edit_description").value = painting.description || '';
                        if (document.getElementById("edit_art_type")) document.getElementById("edit_art_type").value = painting.art_type || '';
                        if (document.getElementById("edit_orientation")) document.getElementById("edit_orientation").value = painting.orientation || '';
                        if (document.getElementById("edit_dimensions")) document.getElementById("edit_dimensions").value = painting.dimensions || '';
                        if (document.getElementById("edit_medium")) document.getElementById("edit_medium").value = painting.medium || '';
                        if (document.getElementById("edit_tags")) document.getElementById("edit_tags").value = painting.tags || '';
                        if (document.getElementById("edit_status")) document.getElementById("edit_status").value = painting.status || 'draft';

                        // Show existing images with delete option (guard container)
                        if (existingImages) {
                            existingImages.innerHTML = "";
                            if (painting.images && painting.images.length > 0) {
                                painting.images.forEach((img) => {
                                    const wrapper = document.createElement("div");
                                    wrapper.className = "relative inline-block mr-2";

                                    const imgTag = document.createElement("img");
                                    // use absolute storage asset (prevents relative-path confusion)
                                    imgTag.src = "{{ rtrim(asset('storage'), '/') }}/" + img.replace(/^\/+/, '');
                                    imgTag.className = "w-20 h-20 object-cover rounded-lg border";

                                    const deleteBtn = document.createElement("button");
                                    deleteBtn.type = "button";
                                    deleteBtn.innerHTML = "❌";
                                    deleteBtn.className =
                                        "absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full p-1 hover:bg-red-600";
                                    deleteBtn.addEventListener("click", async () => {
                                        if (!confirm("Delete this image?")) return;
                                        try {
                                            const res = await fetch(`/admin/myart/delete-image/${painting.id}`, {
                                                method: "POST",
                                                headers: {
                                                    "X-CSRF-TOKEN": CSRF_TOKEN,
                                                    "Content-Type": "application/json",
                                                    "X-Requested-With": "XMLHttpRequest"
                                                },
                                                body: JSON.stringify({ image: img }),
                                                credentials: "same-origin"
                                            });
                                            if (!res.ok) throw new Error('Delete failed');
                                            wrapper.remove();
                                            window.dispatchEvent(new CustomEvent("show-toast", {
                                                detail: { type: "success", message: "Image deleted" }
                                            }));
                                        } catch (err) {
                                            console.error(err);
                                            window.dispatchEvent(new CustomEvent("show-toast", {
                                                detail: { type: "error", message: "Failed to delete image" }
                                            }));
                                        }
                                    });

                                    wrapper.appendChild(imgTag);
                                    wrapper.appendChild(deleteBtn);
                                    existingImages.appendChild(wrapper);
                                });
                            }
                        }

                        // Open modal via Alpine event
                        window.dispatchEvent(new Event('open-edit-modal'));
                    } catch (err) {
                        console.error(err);
                        alert('Could not load painting. Check console.');
                    }
                });
            });

            // ✅ New image preview (guard input)
            const editImagesInput = document.getElementById("edit_images");
            if (editImagesInput && newImagePreview) {
                editImagesInput.addEventListener("change", e => {
                    newImagePreview.innerHTML = "";
                    for (let file of e.target.files) {
                        if (!file.type.startsWith('image/')) continue;
                        const reader = new FileReader();
                        reader.onload = ev => {
                            const img = document.createElement("img");
                            img.src = ev.target.result;
                            img.className = "w-20 h-20 object-cover rounded-lg border";
                            newImagePreview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // ✅ Update painting (guard form)
            if (form) {
                form.addEventListener("submit", async e => {
                    e.preventDefault();
                    const id = document.getElementById("edit_painting_id").value;
                    const formData = new FormData(form);

                    try {
                        const response = await fetch(`/admin/myart/update/${id}`, {
                            method: "POST",
                            body: formData,
                            credentials: 'same-origin',
                            headers: {
                                "X-Requested-With": "XMLHttpRequest"
                                // Do NOT set Content-Type when sending FormData
                            }
                        });
                        const result = await response.json();
                        if (response.ok && result.success) {
                            window.dispatchEvent(new CustomEvent("show-toast", {
                                detail: { type: "success", message: result.message }
                            }));
                            window.dispatchEvent(new Event('close-edit-modal'));
                            setTimeout(() => window.location.reload(), 1000);
                        } else {
                            window.dispatchEvent(new CustomEvent("show-toast", {
                                detail: { type: "error", message: result.message || "Failed to update painting." }
                            }));
                        }
                    } catch (err) {
                        console.error(err);
                        window.dispatchEvent(new CustomEvent("show-toast", {
                            detail: { type: "error", message: "An error occurred." }
                        }));
                    }
                });
            }
        });
    </script>




@endsection