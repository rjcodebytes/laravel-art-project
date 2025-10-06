<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | {{ config('app.name', 'Laravel Art Project') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @endif
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/e37f90b971.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg-gradient-to-r from-gray-100 via-blue-100 to-gray-100 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-lg px-8 py-6">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6 tracking-tight">Admin Login</h2>
                @if ($errors->any())
                    <div class="bg-red-100 text-red-800 py-2 px-4 rounded mb-4 border border-red-300 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Email:</label>
                        <input type="email" name="email"
                            class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 transition duration-150"
                            required autofocus>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Password:</label>
                        <input type="password" name="password"
                            class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 transition duration-150"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition duration-150">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>