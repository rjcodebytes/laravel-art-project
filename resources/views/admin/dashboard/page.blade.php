@extends('layouts.admin_app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-gradient-to-r from-gray-100 via-blue-100 to-gray-100 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-lg px-8 py-6">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6 tracking-tight">Admin Dashboard</h2>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-800 py-2 px-4 rounded mb-4 border border-red-300 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection