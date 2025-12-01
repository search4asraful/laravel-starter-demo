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
    <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900 overflow-hidden">
        @include('backend.partials.sidebar')

        <div class="flex-1 flex flex-col transition-all duration-300" :class="sidebarOpen ? 'ml-64' : 'ml-0'">
            @include('backend.partials.topbar')

            <!-- Main content grows to push footer down -->
            <main class="flex-1 p-4">
                {{ $slot }}

                <div 
                    x-show="sidebarOpen"
                    x-transition.opacity
                    class="fixed inset-0 bg-black/50 z-40 md:hidden"
                    @click="sidebarOpen = false"
                ></div>
            </main>

            <!-- Footer as part of flex layout -->
            <footer
                class="bg-white dark:bg-gray-800 border-t border-dashed border-gray-400 dark:border-gray-700 text-center px-2 py-3 text-xs sm:text-sm text-gray-400 transition-all duration-300 w-full">
                <span>
                    &copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ config('app.name') }}</a> All rights
                    reserved.
                </span>
                <span>
                    Design & Developed by
                    <a href="https://github.com/search4asraful/"
                        class="underline decoration-wavy underline-offset-3 decoration-green-400" target="_blank"
                        rel="noopener noreferrer">Md. Asraful Islam</a>
                </span>
            </footer>
        </div>
    </div>
</body>

</html>
