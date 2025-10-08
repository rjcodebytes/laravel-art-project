<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') | {{ config('app.name', 'Laravel Art Project') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts (Tailwind via Vite) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Inline Tailwind fallback. Place your compiled Tailwind CSS here if needed. */
        </style>
    @endif

    <script src="https://kit.fontawesome.com/e37f90b971.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-900 font-inter flex min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 shadow-md 
              transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50">
        <div class="flex flex-col h-full p-5">
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('admin.dashboard') }}">
                    <h2 class="text-xl font-semibold text-gray-800 tracking-tight">Admin Panel</h2>
                </a>

                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            </div>

            <nav class="flex-1 space-y-2">
                <a href="{{ route('admin.myart') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    <i class="fa-brands fa-artstation w-5 h-5"></i>
                    <span>My Art</span>
                </a>

                <a href="{{ route('admin.myblog') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    <i class="fa-solid fa-newspaper w-5 h-5"></i>
                    <span>My Blog</span>
                </a>
            </nav>

            <div class="mt-auto pt-4 border-t border-gray-200 ">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center hover:cursor-pointer justify-center gap-2 px-4 py-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition">
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
    </aside>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-30 hidden z-40 lg:hidden"></div>

    <!-- Main Content -->
    <div class="flex-1 lg:ml-64 flex flex-col overflow-hidden">
        <main class="flex-1 p-0 lg:p-8 overflow-y-auto hide-scrollbar">
            <header class="flex items-center justify-between mb-8 p-4 lg:p-0 bg-transparent">
                <div class="flex items-center gap-">
                    <!-- Mobile Menu Toggler -->
                    <button id="mobileMenuButton" class="text-gray-700 focus:outline-none lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-semibold">@yield('title', 'Dashboard')</h1>
                </div>
                <p class="text-sm text-gray-500">Welcome, Admin 👋</p>
            </header>


            <div class="bg-white min-h-[600px] p-8 lg:p-0 overflow-y-auto hide-scrollbar max-h-[calc(100vh-160px)]">
                @yield('content')
            </div>
        </main>

    </div>


    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuButton = document.getElementById('mobileMenuButton');

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
    <!-- Toast Notification -->
    @if (session('success') || session('error') || session('info'))
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-5 right-5 z-[9999]">
            <div class="flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg text-white
                        @if(session('success')) bg-green-500
                        @elseif(session('error')) bg-red-500
                        @else bg-blue-600 @endif">
                <i class="fa-solid 
                        @if(session('success')) fa-circle-check
                        @elseif(session('error')) fa-circle-xmark
                        @else fa-circle-info @endif text-xl"></i>
                <span class="font-medium">
                    {{ session('success') ?? session('error') ?? session('info') }}
                </span>
            </div>
        </div>
    @endif

</body>

</html>