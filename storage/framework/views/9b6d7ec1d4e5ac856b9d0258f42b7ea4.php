<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XO United</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/views/components/header.blade.php">
    <link rel="stylesheet" href="/views/components/footer.blade.php">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-stadium { font-family: 'Bebas Neue', cursive; }
    </style>
</head>
<body class="bg-white text-gray-900 selection:bg-red-600 selection:text-white">

   <?php if (isset($component)) { $__componentOriginalfd1f218809a441e923395fcbf03e4272 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd1f218809a441e923395fcbf03e4272 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $attributes = $__attributesOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__attributesOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $component = $__componentOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__componentOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>

    <header class="relative max-w-7xl mx-auto px-6 py-16 lg:py-28 flex flex-col lg:flex-row items-center gap-12 overflow-hidden">
        <div class="absolute -top-10 -right-10 w-96 h-96 bg-red-50 rounded-full blur-[100px] -z-10"></div>

        <div class="flex-1 text-center lg:text-left">
            <div class="inline-block px-4 py-1 mb-6 border-l-4 border-red-600 bg-red-50 text-red-600 font-bold text-xs uppercase tracking-widest">
                Transfer Season 2026 Open
            </div>
            <h1 class="font-stadium text-7xl md:text-9xl leading-[0.8] mb-6">
                PLAY FOR THE <br> <span class="text-red-600">BADGE.</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-500 mb-10 max-w-lg leading-relaxed font-medium">
                Professional player management and technical scouting for the next generation of football stars. Join the XO United family.
            </p>
            <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                <a href="/matches" class="px-10 py-4 bg-red-600 text-white font-stadium text-2xl tracking-wider rounded-none hover:bg-black transition-colors shadow-xl shadow-red-600/20">
                    VIEW MATCHES
                </a>
            </div>
        </div>

        <div class="flex-1 flex justify-center lg:justify-end">
            <div class="relative group">
                <div class="absolute -inset-2 bg-red-600 rounded-lg blur opacity-10 group-hover:opacity-30 transition duration-500"></div>
                <div class="relative w-72 h-96 md:w-96 md:h-[500px] overflow-hidden rounded-lg bg-gray-200 border-4 border-white shadow-2xl">
                    <img src="capitan.jpg"
                         alt="Football Player"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-linear-to-t from-red-900/40 to-transparent"></div>
                </div>
            </div>
        </div>
    </header>

    <section id="services" class="bg-red-600 py-20 px-6 ">
        <div class="max-w-7xl mx-auto">
            <div class="mb-16 text-center text-white">
                <h2 class="font-stadium text-5xl md:text-6xl tracking-tight">CLUB SERVICES</h2>
                <div class="w-20 h-1 bg-white mx-auto mt-4"></div>
            </div>

           <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
             <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white p-10 border-b-8 border-red-600 shadow-lg text-center w-full max-w-sm">
            <div class="text-4xl mb-4"><?php echo e($service->icon); ?></div>
            <h3 class="font-stadium text-2xl mb-2"><?php echo e($service->title); ?></h3>
            <p class="text-gray-600"><?php echo e($service->description); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-center col-span-3 text-gray-400 italic">No services found in the database.</p>
    <?php endif; ?>
</div>
            </div>
        </div>
    </section>

    <section class="space-y-6 mt-12 justify-center items-center text-cente">
        <div class="max-w-7xl mx-auto text-center text-black">
                <h2 class="font-stadium text-5xl md:text-6xl tracking-tight">Our Team</h2>
            <p class="text-lg md:text-sm text-gray-600 mt-4 max-w-2xl mx-auto">
                Whether you're a player, coach, scout, agent, sponsor, or media professional, XO United is your home for football excellence. Contact us today to learn how we can support your career and help you achieve your goals.
            </p>
                <div class="mt-5 hidden md:flex gap-10 uppercase text-sm tracking-widest justify-center">
                    <a href="<?php echo e(url('/player')); ?>" class="<?php echo e(Request::is('player') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-white'); ?> px-6 py-2 rounded-md bg-red-600 text-white font-stadium text-xl tracking-wider hover:bg-black transition-all active:scale-95 md:text-sm lg:text-sm">
                        All Players
                    </a>
                    <a href="<?php echo e(url('/managers')); ?>" class="<?php echo e(Request::is('managers') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-white'); ?> px-6 py-2 rounded-md bg-red-600 text-white font-stadium text-xl tracking-wider hover:bg-black transition-all active:scale-95 md:text-sm lg:text-sm">
                        Manager Team
                    </a>
                </div>
            <img src="team.jpg" alt="Our Team" class="w-200 h-100 justify-center mx-auto mt-5 shadow-lg " >
        </div>
    </section>

<?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>

</body>
</html>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/home.blade.php ENDPATH**/ ?>