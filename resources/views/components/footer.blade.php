<footer class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-lg">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @include('components.footer-brand')
            @include('components.footer-links')
            @include('components.footer-legal')
        </div>
        @include('components.footer-bottom')
    </div>
</footer>