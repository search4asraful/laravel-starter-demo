import collapse from '@alpinejs/collapse';
import Alpine from 'alpinejs';
import './bootstrap';

Alpine.data("themeToggle", () => ({
    theme: document.documentElement.classList.contains("dark") ? "dark" : "light",

    toggle() {
        this.theme = this.theme === "dark" ? "light" : "dark";
        document.documentElement.classList.toggle("dark", this.theme === "dark");
        localStorage.setItem("theme", this.theme);
    }
}));

Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();
