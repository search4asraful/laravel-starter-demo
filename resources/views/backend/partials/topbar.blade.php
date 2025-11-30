<nav x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 border-dashed border-b border-gray-400 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="mr-3 p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition" title="Menu Toggler">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            {{-- search area --}}
            <div class="flex items-center w-full max-w-xl">
                <form action="#" method="GET" class="w-full flex">
                    <!-- Input -->
                    <input type="text" name="search" title="Search area" placeholder="Search..."
                        class="w-full px-3 py-1 rounded-l-md border border-dashed border-gray-400 dark:border-gray-600 
                   bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100
                   focus:outline-none focus:ring-0 focus:ring-gray-500">

                    <!-- Button -->
                    <button
                        class="px-3 flex items-center justify-center rounded-r-md
                   bg-gray-500 hover:bg-gray-600 text-white transition-colors"
                        title="Search"
                        type="button"
                    >
                        <i class="fa fa-search"></i>
                    </button>

                </form>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center space-x-4 ms-6">

                <div
                    class="text-lg transition-colors duration-200 font-bold border border-dashed rounded-full border-gray-400 dark:border-gray-600 p-1 h-8 w-8 flex justify-center items-center">
                    <x-theme-toggle />
                </div>

                <a href="{{ url('/') }}" title="Visit Website" target="_blank"
                    class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 text-lg font-bold border border-dashed rounded-full border-gray-400 dark:border-gray-600 p-1 h-8 w-8 flex justify-center items-center">
                    <i class="fa fa-globe"></i>
                </a>

                <x-dropdown align="right" width="48" contentClasses="pb-1 bg-white dark:bg-gray-700">
                    <x-slot name="trigger">
                        <div class="flex justify-center items-center border-2 border-dotted cursor-pointer border-gray-400 dark:border-gray-600 rounded-full p-1"
                            title="Profile">
                            <img src="{{ asset('assets/logo/Linux.svg') }}" class="rounded-full w-8 h-8" />
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <h3
                            class="block w-full px-4 py-3 text-center text-lg font-extrabold leading-5 text-gray-700 dark:text-gray-300 bg-slate-100 dark:bg-gray-700">
                            {{ Auth::user()->name }}
                        </h3>

                        <hr class="border-gray-200 dark:border-gray-600" />

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
