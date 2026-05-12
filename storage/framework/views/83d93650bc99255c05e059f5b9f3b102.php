<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Match Schedule</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/views/components/header.blade.php">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-stadium { font-family: 'Bebas Neue', cursive; }
    </style>
</head>
<body class="bg-white">
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

    <section class="max-w-7xl mx-auto px-6 py-2">
        <h1 class="inline-block px-4 py-1 mb-6 border-l-4 border-red-600 bg-red-50 text-red-600 font-bold text-sm uppercase tracking-widest ml-10 mt-8">
            Upcoming Matches
        </h1>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto px-6">
            <?php $__empty_1 = true; $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 flex flex-col">

                <div class="relative w-full h-55 aspect-video md:aspect-square lg:aspect-4/3 overflow-hidden bg-gray-200 rounded-t-xl">
                     <?php if($match->image): ?>
                        <img src="<?php echo e(asset($match->image)); ?>"
                        alt="Match Poster"
                        /* 1. Change 'object-cover' to 'object-contain' */
                        class="w-full h-full rounded-xl object-contain transition-transform duration-300 group-hover:scale-105 p-2">
    <?php else: ?>
        <div class="flex flex-col items-center justify-center h-full text-gray-400 p-4">
            <span class="text-3xl mb-2">🖼️</span>
            <p class="text-sm font-medium">No Poster Available</p>
        </div>
    <?php endif; ?>
</div>
                <div class="p-5">
                    <h2 class="text-2xl font-stadium text-gray-900 uppercase tracking-tight">
                        <?php echo e($match->home_team); ?> <span class="text-red-600 italic text-lg"> vs </span> <?php echo e($match->away_team); ?>

                    </h2>
                    <div class="mt-3 space-y-1">
                        <p class="text-gray-700 font-medium">
                           📍 <?php echo e($match->stadium); ?> <span class="text-red-600 font-bold">(<?php echo e($match->location_type); ?>) </span>
                        </p>
                        <p class="text-gray-600">
                            <span class="font-bold text-gray-900">DATE:</span> <?php echo e(\Carbon\Carbon::parse($match->match_date)->format('d M Y')); ?>

                        </p>
                        <div class="flex gap-4">
                            <p class="text-gray-600"><span class="font-bold text-gray-900">KICK OFF:</span> <?php echo e($match->match_time); ?></p>
                            <p class="text-gray-600"><span class="font-bold text-gray-900">FINISH:</span> <?php echo e($match->Finish_time); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500">No matches scheduled at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <footer class="py-8 bg-red-600 text-center border-t border-gray-100 mt-12">
        <p class="font-stadium text-xl text-white">Copyright &copy; 2026 XO United</p>
    </footer>
</body>
</html>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/matches.blade.php ENDPATH**/ ?>