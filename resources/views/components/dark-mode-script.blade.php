<script>
    // Check for saved theme preference, otherwise use system preference
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }

    // Listen for dark mode toggle
    document.querySelector('[x-data]')._x_dataStack[0].darkMode = localStorage.theme === 'dark'
</script>