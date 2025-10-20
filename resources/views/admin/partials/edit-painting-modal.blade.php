<!-- Edit Painting Modal -->
<div
    id="editPaintingModalWrapper"
    x-data="{ open: false }"
    x-cloak
    x-show="open"
    @open-edit-modal.window="open = true"
    @close-edit-modal.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm"
>
    <style>
        /* utility to hide scrollbars but keep scrolling */
        .hide-scrollbar {
            -ms-overflow-style: none; /* IE/Edge */
            scrollbar-width: none; /* Firefox */
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none; /* Chrome, Safari */
        }
    </style>

    <div
        x-show="open"
        x-transition:enter="transition transform ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="open = false"
        @keydown.escape.window="open = false"
        class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-2xl relative transform"
    >
        <button
            type="button"
            @click="open = false"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl leading-none"
        >&times;</button>

        <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">🎨 Edit Painting</h2>

        <!-- make form body scrollable with hidden scrollbar; keep submit area sticky -->
        <form id="editPaintingForm" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            <input type="hidden" id="edit_painting_id" name="id">

            <!-- scrollable fields container -->
            <div class="space-y-4 overflow-y-auto hide-scrollbar pr-3" style="max-height:60vh;">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Title</label>
                    <input type="text" id="edit_title" name="title" class="w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Description</label>
                    <textarea id="edit_description" name="description" class="w-full border rounded-lg px-3 py-2"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Art Type</label>
                        <input type="text" id="edit_art_type" name="art_type" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Orientation</label>
                        <select id="edit_orientation" name="orientation" class="w-full border rounded-lg px-3 py-2">
                            <option>Portrait</option>
                            <option>Landscape</option>
                            <option>Square</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Dimensions (W x H)</label>
                        <input type="text" id="edit_dimensions" name="dimensions" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Medium</label>
                        <input type="text" id="edit_medium" name="medium" class="w-full border rounded-lg px-3 py-2">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Tags</label>
                    <input type="text" id="edit_tags" name="tags" class="w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Status</label>
                    <select id="edit_status" name="status" class="w-full border rounded-lg px-3 py-2">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Existing Images</label>
                    <div id="existingImages" class="flex flex-wrap gap-3"></div>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Add New Images</label>
                    <input type="file" id="edit_images" name="images[]" multiple class="w-full border rounded-lg px-3 py-2">
                    <div id="newImagePreview" class="flex flex-wrap gap-3 mt-2"></div>
                </div>
            </div>

            <!-- sticky footer so button always visible -->
            <div class="pt-4 mt-4 bg-white sticky bottom-0 -mx-6 px-6 pb-4">
                <div class="text-right">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Update Painting
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
