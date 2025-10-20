<?php
<div 
    x-data="{ show: true }" 
    x-init="setTimeout(() => show = false, 2000)" 
    x-show="show"
    x-transition:leave="transition ease-in-out duration-700"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 text-white overflow-hidden">

    <!-- Left Panel -->
    <div 
        class="absolute inset-0 bg-indigo-600 transform origin-bottom-left"
        x-show="show"
        x-transition:leave="transition-transform ease-in-out duration-1000"
        x-transition:leave-start="translate-x-0 rotate-0"
        x-transition:leave-end="-translate-x-full -rotate-45">
    </div>

    <!-- Right Panel -->
    <div 
        class="absolute inset-0 bg-indigo-700 transform origin-top-right"
        x-show="show"
        x-transition:leave="transition-transform ease-in-out duration-1000"
        x-transition:leave-start="translate-x-0 rotate-0"
        x-transition:leave-end="translate-x-full rotate-45">
    </div>

    <!-- Center Logo/Text -->
    <div 
        x-show="show"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="relative z-10 text-center">
        <h1 class="text-3xl sm:text-5xl font-playfair tracking-wide">Art Project</h1>
        <p class="mt-2 text-sm text-gray-200">Loading creativity...</p>
    </div>
</div>