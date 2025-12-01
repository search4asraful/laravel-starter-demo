<x-admin-layout>
    <x-breadcrumb :items="[
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Single Menu', 'url' => route('test2')]
    ]" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {!! __("This is a test page 2 for backend layout, logged in as <span class=\"font-bold underline\">" . Auth::user()->name . "</span>!") !!}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>