<nav x-data="{ searchOpen: false }"
    class="relative bg-white dark:bg-gray-800 border-dashed border-b border-gray-400 dark:border-gray-700" >

    <div class="w-full mx-auto px-4">
        <div class="flex justify-between h-14">

            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="text-lg mr-3 p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition"
                    title="Menu Toggler">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            {{-- DESKTOP SEARCH BAR --}}
            <div class="sm:flex items-center w-full max-w-xl hidden">
                <form action="#" method="GET" class="w-full flex">
                    <input type="text" name="search" title="Search area" placeholder="Search..."
                        class="w-full px-3 py-1 rounded-l-md border border-dashed border-gray-400 dark:border-gray-600 
                               bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100
                               focus:outline-none focus:ring-0">

                    <button
                        class="px-3 flex items-center justify-center rounded-r-md bg-gray-500 hover:bg-gray-600 text-white transition"
                        title="Search">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- RIGHT SIDE -->
            <div class="flex items-center space-x-4 ms-6">

                <!-- MOBILE SEARCH BUTTON -->
                <button @click="searchOpen = !searchOpen" type="button" title="Search"
                    class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white text-lg transition w-6 sm:w-8 h-6 sm:h-8 flex justify-center items-center sm:hidden">
                    <i class="fa fa-search"></i>
                </button>

                <div class="text-lg w-6 sm:w-8 h-6 sm:h-8 flex justify-center items-center">
                    <x-theme-toggle />
                </div>

                <a href="{{ url('/') }}" target="_blank"
                    class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white text-lg w-6 sm:w-8 h-6 sm:h-8 flex justify-center items-center"
                    title="Visit Website">
                    <i class="fa fa-globe"></i>
                </a>

                <x-dropdown align="right" width="48" contentClasses="pb-1 bg-white dark:bg-gray-700">
                    <x-slot name="trigger">
                        <div class="flex justify-center items-center border-2 border-dotted border-gray-400 dark:border-gray-600 rounded-full p-1 cursor-pointer"
                            title="Profile">
                            <img src="{{ asset('assets/logo/Linux.svg') }}" class="rounded-full w-6 h-6" />
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <h3
                            class="block w-full px-4 py-3 text-center text-lg font-extrabold text-gray-700 dark:text-gray-300 bg-slate-100 dark:bg-gray-700">
                            {{ Auth::user()->name }}
                        </h3>

                        <hr class="border-gray-200 dark:border-gray-600" />

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- EXPANDING SEARCH BAR (TOPBAR) -->
    <div x-show="searchOpen" x-transition @click.away="searchOpen = false"
        class="absolute top-1 left-0 w-full bg-white dark:bg-gray-800 sm:hidden px-3 py-2">

        <form method="GET" action="#" class="flex">
            <input type="text" name="search" placeholder="Search..."
                class="w-full px-3 py-1 rounded-l-md border border-gray-300 dark:border-gray-600 
                   bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none">

            <button class="px-3 rounded-r-md bg-gray-700 text-white hover:bg-gray-800 transition">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>


</nav>
