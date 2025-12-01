@props([
    'items' => [],      // ['label' => 'Dashboard', 'url' => route('dashboard')]
    'home'  => true,    // Show home icon or not
])

<nav class="flex items-center space-x-1 text-sm text-gray-400 dark:text-gray-500">
    
    {{-- HOME ICON --}}
    @if($home)
        <a href="{{ url('/') }}"
           class="hover:text-gray-600 dark:hover:text-gray-300 transition">
            <i class="fa-solid fa-house"></i>
        </a>
    @endif

    {{-- BREADCRUMB ITEMS --}}
    @foreach($items as $index => $item)
        @php
            $isLast = $loop->last;
        @endphp

        @if(!$isLast)
            {{-- Regular breadcrumb link --}}
            <a href="{{ $item['url'] ?? 'javascript:void(0)' }}"
               class="hover:text-gray-600 dark:hover:text-gray-300 transition">
                {{ $item['label'] }}
            </a>
            <span class="mx-1">/</span>

        @else
            {{-- Final crumb (active) --}}
            <span class="font-semibold text-gray-700 dark:text-gray-200">
                {{ $item['label'] }}
            </span>
        @endif
    @endforeach

</nav>
