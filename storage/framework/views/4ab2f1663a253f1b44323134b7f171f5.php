<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-lg border-b border-zinc-200 shadow-[0_1px_12px_rgba(0,0,0,0.06)]">
    <div class="h-1 bg-gradient-to-r from-red-700 via-red-600 to-red-700"></div>
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 py-3 sm:py-3.5">
        <div class="flex items-center gap-2.5 sm:gap-3">
            <a class="w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center overflow-hidden shadow-sm ring-1 ring-zinc-200 hover:ring-red-500 transition-all" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('img/XO.png')); ?>" alt="Logo" class="object-cover w-full h-full">
            </a>
            <a href="<?php echo e(url('/')); ?>">
                <span class="font-stadium text-2xl sm:text-3xl tracking-wide uppercase text-zinc-900">XO United</span>
            </a>
        </div>

        <div class="hidden md:flex gap-7 lg:gap-9 font-semibold uppercase text-xs tracking-widest text-zinc-600">
            <a href="<?php echo e(url('/')); ?>" class="<?php echo e(Request::is('/') ? 'text-red-600' : 'hover:text-red-600'); ?> transition-colors">Home</a>
            <a href="<?php echo e(url('/matches')); ?>" class="<?php echo e(Request::is('matches') ? 'text-red-600' : 'hover:text-red-600'); ?> transition-colors">Matches</a>
            <a href="<?php echo e(url('/standings')); ?>" class="<?php echo e(Request::is('standings') ? 'text-red-600' : 'hover:text-red-600'); ?> transition-colors">Standings</a>
            <a href="<?php echo e(url('/contact')); ?>" class="<?php echo e(Request::is('contact') ? 'text-red-600' : 'hover:text-red-600'); ?> transition-colors">Contact</a>
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
            <a href="<?php echo e(url('/player')); ?>" class="hidden sm:inline-block px-4 lg:px-5 py-2 rounded-lg xo-btn-primary font-stadium text-sm tracking-wider">
                All Players
            </a>
            <a href="<?php echo e(url('/managers')); ?>" class="hidden lg:inline-block px-4 lg:px-5 py-2 rounded-lg xo-btn-outline font-stadium text-sm tracking-wider">
                Manager Team
            </a>
            <button class="md:hidden text-2xl p-2 text-zinc-800 hover:text-red-600 transition-colors" onclick="toggleMobileMenu()" aria-label="Toggle menu">☰</button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden flex-col bg-white border-t border-zinc-100 px-6 py-5 gap-4 font-semibold uppercase text-xs tracking-widest shadow-lg md:hidden">
        <a href="<?php echo e(url('/')); ?>" class="<?php echo e(Request::is('/') ? 'text-red-600' : 'text-zinc-600 hover:text-red-600'); ?> transition-colors">Home</a>
        <a href="<?php echo e(url('/matches')); ?>" class="<?php echo e(Request::is('matches') ? 'text-red-600' : 'text-zinc-600 hover:text-red-600'); ?> transition-colors">Matches</a>
        <a href="<?php echo e(url('/standings')); ?>" class="<?php echo e(Request::is('standings') ? 'text-red-600' : 'text-zinc-600 hover:text-red-600'); ?> transition-colors">Standings</a>
        <a href="<?php echo e(url('/contact')); ?>" class="<?php echo e(Request::is('contact') ? 'text-red-600' : 'text-zinc-600 hover:text-red-600'); ?> transition-colors">Contact</a>
        <hr class="border-zinc-100">
        <a href="<?php echo e(url('/player')); ?>" class="text-zinc-600 hover:text-red-600 transition-colors">All Players</a>
        <a href="<?php echo e(url('/managers')); ?>" class="text-zinc-600 hover:text-red-600 transition-colors">Manager Team</a>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
        menu.classList.toggle('flex');
    }
</script>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/components/header.blade.php ENDPATH**/ ?>