<div x-data="themeToggle">
    <button @click="toggle()"
        class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200"
        title="Theme Switcher">
        <template x-if="theme === 'light'">
            <i class="fa-regular fa-moon"></i>
        </template>

        <template x-if="theme === 'dark'">
            <i class="fa-regular fa-sun"></i>
        </template>
    </button>
</div>
