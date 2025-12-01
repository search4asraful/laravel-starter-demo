@php
    $menus = config('sidebar');
@endphp

<div class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-lg
    transform transition-all duration-300 z-50 border-r border-dashed border-gray-400 dark:border-gray-700"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Logo -->
    <a href="{{ route('dashboard') }}"
        class="block p-4 border-dashed border-b border-gray-400 dark:border-gray-700 bg-slate-100 dark:bg-gray-700 cursor-pointer">
        <h1 class="text-2xl text-center font-bold text-gray-700 dark:text-gray-100">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/logo/Linux.svg') }}" class="rounded-full mr-2 w-8 sm:w-12 h-8 sm:h-12" />
            </div>
            <span class="font-medium text-sm uppercase">{{ config('app.name') }}</span>
        </h1>
    </a>

    <!-- Scrollable Menu -->
    <div class="overflow-y-auto h-[calc(100vh-80px)] no-scrollbar">

        <nav class="p-2 space-y-2">

            <!-- Dashboard link -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center p-2 rounded text-gray-700 dark:text-gray-200
                hover:bg-gray-100 dark:hover:bg-gray-700 text-sm sm:text-base
                {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                <i class="fa fa-house mr-3"></i> Dashboard
            </a>

            @foreach ($menus as $section)
                <!-- SECTION TITLE -->
                @if (isset($section['group']))
                    <p
                        class="px-2 pt-3 text-[11px] font-semibold tracking-wider text-gray-400 dark:text-gray-500 uppercase">
                        {{ $section['group'] }}
                    </p>
                @endif


                @foreach ($section['items'] as $menu)
                    @php
                        $hasChildren = isset($menu['children']) && is_array($menu['children']);

                        // Fallback route
                        $menuRoute = $menu['route'] ?? null;
                        $menuHref = $menuRoute && Route::has($menuRoute) ? route($menuRoute) : 'javascript:void(0)';
                        $menuActive = $menuRoute && request()->routeIs($menuRoute);

                        // Child detection
                        $childRoutes = $hasChildren
                            ? collect($menu['children'])->pluck('route')->filter()->toArray()
                            : [];
                        $hasActiveChild = $hasChildren && request()->routeIs($childRoutes);

                        $openKey = Str::slug($menu['name'], '_');
                    @endphp


                    {{-- ITEM WITH CHILDREN --}}
                    @if ($hasChildren)
                        <div x-data="{ open_{{ $openKey }}: {{ $hasActiveChild ? 'true' : 'false' }} }">

                            <!-- PARENT (NEVER active) -->
                            <button @click="open_{{ $openKey }} = !open_{{ $openKey }}"
                                class="w-full flex justify-between items-center p-2 rounded text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">

                                <span class="flex items-center truncate w-full">
                                    <i class="{{ $menu['icon'] }} w-5 text-center mr-3"></i>
                                    <span class="truncate text-sm">{{ $menu['name'] }}</span>
                                </span>

                                <!-- right side placeholder dot -->
                                <span class="h-2 w-2 rounded-full bg-transparent mr-2"></span>

                                <i class="fa fa-chevron-down text-xs transition-transform"
                                    :class="{ 'rotate-180': open_{{ $openKey }} }"></i>
                            </button>

                            <!-- CHILDREN -->
                            <div x-show="open_{{ $openKey }}" x-collapse class="ml-4 mt-1 space-y-1">

                                @foreach ($menu['children'] as $child)
                                    @php
                                        $route = $child['route'] ?? null;
                                        $href = $route && Route::has($route) ? route($route) : 'javascript:void(0)';
                                        $isActive = $route && request()->routeIs($route);
                                    @endphp

                                    <a href="{{ $href }}"
                                        class="
                                            flex items-center justify-between
                                            px-2 py-1 rounded text-sm truncate
                                            text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700
                                            {{ $isActive ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}
                                        ">

                                        <span class="flex items-center truncate">
                                            <i class="{{ $child['icon'] }} mr-2"></i>
                                            {{ $child['name'] }}
                                        </span>

                                        <!-- ACTIVE DOT (ONLY CHILDREN) -->
                                        <span
                                            class="h-2 w-2 rounded-full {{ $isActive ? 'bg-green-400 animate-pulse' : 'bg-transparent' }}"></span>
                                    </a>
                                @endforeach

                            </div>

                        </div>

                        {{-- SINGLE MENU ITEM --}}
                    @else
                        <a href="{{ $menuHref }}"
                            class="
                                flex items-center justify-between
                                p-2 rounded text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 truncate
                                {{ $menuActive ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}
                            ">

                            <span class="flex items-center truncate">
                                <i class="{{ $menu['icon'] }} w-5 text-center mr-3"></i>
                                {{ $menu['name'] }}
                            </span>

                            <!-- Single item green dot -->
                            <span
                                class="h-2 w-2 rounded-full {{ $menuActive ? 'bg-green-400 animate-pulse' : 'bg-transparent' }}"></span>
                        </a>
                    @endif
                @endforeach
            @endforeach
        </nav>
    </div>
</div>
