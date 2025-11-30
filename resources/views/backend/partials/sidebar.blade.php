<div class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-lg
            transform transition-all duration-300 z-50 border-r border-dashed border-gray-400 dark:border-gray-700"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <div class="p-4 border-dashed border-b border-gray-400 dark:border-gray-700 bg-slate-100 dark:bg-gray-700 cursor-pointer" >
        <h1 class="text-2xl text-nowrap text-center font-bold text-gray-700 dark:text-gray-100 user-select-none pointer-events-none">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/logo/Linux.svg') }}" class="rounded-full mr-2 w-12 h-12" />
            </div>
            <span class="font-medium text-sm text-wrap uppercase">
                {{ config('app.name') }}
            </span>
        </h1>
    </div>

    <!-- Scrollable container -->
    <div class="overflow-y-auto h-[calc(100vh-80px)] no-scrollbar font-mono">
        <nav class="p-4 space-y-2.5" x-data="{ openSample: false }">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center px-3 py-2 rounded text-gray-700 dark:text-gray-200
                   hover:bg-gray-100 dark:hover:bg-gray-700
                   {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                <i class="fa fa-house mr-3"></i>
                Dashboard
            </a>

            <div class="uppercase font-light font-mono text-sm text-gray-500">Sample</div>

            <!-- USERS DROPDOWN -->
            <div>
                <button @click="openSample = !openSample"
                    class="w-full flex justify-between items-center px-3 py-2 rounded
                       text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="flex items-center">
                        <i class="fa fa-users mr-3"></i>
                        Main menu
                    </span>

                    <i class="fa fa-chevron-down transition-transform text-xs" :class="{ 'rotate-180': openSample }"></i>
                </button>

                <div x-show="openSample" x-collapse class="ml-5 mt-1 space-y-1">
                    <a href="#"
                        class="block px-2 py-1 text-gray-600 dark:text-gray-300 
                          hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                        <i class="fa fa-minus text-xs"></i> Child menu
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
