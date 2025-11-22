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

    const selectRelated = document.getElementById("edit_related_paintings");
    const relatedChips = document.getElementById("related_chips");

    const csrfMeta = document.querySelector("meta[name='csrf-token']");
    const CSRF_TOKEN = csrfMeta ? csrfMeta.content : "{{ csrf_token() }}";

    function renderChips(selectedIds, allPaintings) {
        relatedChips.innerHTML = "";

        selectedIds.forEach(id => {
            const p = allPaintings.find(x => x.id == id);
            if (!p) return;

            const chip = document.createElement("div");
            chip.className = "px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm cursor-pointer";
            chip.textContent = p.title;

            chip.addEventListener("click", () => {
                // remove from select
                const option = [...selectRelated.options].find(o => o.value == id);
                if (option) option.selected = false;

                // remove chip
                chip.remove();
            });

            relatedChips.appendChild(chip);
        });
    }

    // OPEN EDIT MODAL
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", async () => {

            const id = button.dataset.id;
            const response = await fetch(`/admin/myart/edit/${id}`);
            const data = await response.json();

            const painting = data.painting;
            const allPaintings = data.allPaintings;

            // Fill fields
            document.getElementById("edit_painting_id").value = id;
            document.getElementById("edit_title").value = painting.title;
            document.getElementById("edit_description").value = painting.description;
            document.getElementById("edit_art_type").value = painting.art_type;
            document.getElementById("edit_orientation").value = painting.orientation;
            document.getElementById("edit_dimensions").value = painting.dimensions;
            document.getElementById("edit_medium").value = painting.medium;
            document.getElementById("edit_tags").value = painting.tags;
            document.getElementById("edit_status").value = painting.status;

            // Existing images
            existingImages.innerHTML = "";
            if (painting.images) {
                painting.images.forEach(img => {
                    const div = document.createElement("div");
                    div.className = "relative inline-block";

                    div.innerHTML = `
                        <img src="/storage/${img}" class="w-20 h-20 object-cover rounded-lg border">
                        <button class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs p-1">❌</button>
                    `;

                    div.querySelector("button").onclick = async () => {
                        if (!confirm("Delete image?")) return;

                        await fetch(`/admin/myart/delete-image/${painting.id}`, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": CSRF_TOKEN,
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({ image: img })
                        });

                        div.remove();
                    };

                    existingImages.appendChild(div);
                });
            }

            // ---- Related Paintings ----
            selectRelated.innerHTML = "";

            allPaintings.forEach(p => {
                const option = document.createElement("option");
                option.value = p.id;
                option.textContent = p.title;

                if (painting.related_paintings?.includes(p.id)) {
                    option.selected = true;
                }

                selectRelated.appendChild(option);
            });

            // Render chips
            renderChips(painting.related_paintings || [], allPaintings);

            // When user selects/deselects
            selectRelated.addEventListener("change", () => {
                const selectedIds = [...selectRelated.options]
                    .filter(o => o.selected)
                    .map(o => o.value);
                renderChips(selectedIds, allPaintings);
            });

            window.dispatchEvent(new Event("open-edit-modal"));
        });
    });

    // PREVIEW new images
    document.getElementById("edit_images").addEventListener("change", e => {
        newImagePreview.innerHTML = "";
        [...e.target.files].forEach(file => {
            const reader = new FileReader();
            reader.onload = ev => {
                newImagePreview.innerHTML += `
                    <img src="${ev.target.result}" class="w-20 h-20 object-cover rounded-lg border">
                `;
            };
            reader.readAsDataURL(file);
        });
    });

    // SUBMIT FORM
    form.addEventListener("submit", async e => {
        e.preventDefault();

        const id = document.getElementById("edit_painting_id").value;
        const formData = new FormData(form);

        const response = await fetch(`/admin/myart/update/${id}`, {
            method: "POST",
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            window.dispatchEvent(new Event("close-edit-modal"));
            location.reload();
        } else {
            alert(result.message || "Update failed");
        }
    });

});
</script>


@endsection