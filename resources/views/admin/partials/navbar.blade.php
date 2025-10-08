<div class="flex flex-col bg-white border-r border-gray-200 h-screen w-64 p-5 shadow-sm">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl font-semibold text-gray-800 tracking-tight">Admin Panel</h2>
        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
    </div>

    <nav class="flex-1 space-y-2">
        <a href="{{ route('admin.myart') }}"
            class="hover:cursor-pointer flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
            <i class="fa-brands fa-artstation w-5 h-5"></i>
            <span>My Art</span>
        </a>

        <a href="{{ route('admin.myblog') }}"
            class="hover:cursor-pointer flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
            <i class="fa-solid fa-newspaper w-5 h-5"></i>
            <span>My Blog</span>
        </a>
    </nav>

    <div class="mt-auto pt-4 border-t border-gray-200">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 hover:cursor-pointer transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>