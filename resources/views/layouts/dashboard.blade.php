<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

    @include('backend.partials.styles')

    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (prefersDark ? 'dark' : 'light');

            if (theme === 'dark') {
            document.documentElement.classList.add('dark');
            } else {
            document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ sidebarOpen: true }"
    x-init="const updateSidebar = () => {
        sidebarOpen = window.innerWidth >= 768;
    };
    updateSidebar();
    window.addEventListener('resize', updateSidebar);"
>
    <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900">
        @include('backend.partials.sidebar')

        <div class="flex-1 flex flex-col transition-all duration-300" :class="sidebarOpen ? 'ml-64' : 'ml-0'">
            @include('backend.partials.topbar')

            <!-- Main content grows to push footer down -->
            <main class="flex-1 p-4">
                {{ $slot }}
            </main>

            <!-- Footer as part of flex layout -->
            <footer
                class="bg-white dark:bg-gray-800 border-t border-dashed border-gray-400 dark:border-gray-700 text-center px-2 py-3 text-sm text-gray-600 dark:text-gray-300 transition-all duration-300 w-full">
                    &copy; {{ date('Y') }} <span class="font-semibold">{{ config('app.name') }}</span> All rights reserved.
                    Design by <a href="https://github.com/search4asraful/" class="text-purple-700" target="_blank"
                    rel="noopener noreferrer">Md. Asraful Islam</a>
            </footer>
        </div>
    </div>
</body>

</html>
