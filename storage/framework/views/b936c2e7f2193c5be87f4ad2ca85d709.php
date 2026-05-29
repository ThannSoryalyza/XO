<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;700&display=swap">
    <title>Our Management Team | XO United</title>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-stadium { font-family: 'Bebas Neue', cursive; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

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

    <!-- Main Content Container -->
    <main class="max-w-6xl mx-auto px-6 py-12 md:py-20">
        <div class="text-center mb-16">
            <h1 class="font-stadium text-5xl md:text-7xl tracking-tight uppercase leading-none">Management Staff</h1>
            <p class="text-lg text-gray-500 mt-4 max-w-xl mx-auto">The strategic brains behind our operations, training schedules, and team growth directives.</p>
        </div>

        <!-- Management Loop Matrix Block -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white border border-gray-100 rounded-3xl p-8 text-center shadow-lg hover:shadow-xl transition-all group duration-3xl">

                    <!-- Profile Picture Logic Output Container -->
                    <div class="relative w-40 h-40 mx-auto mb-6">
                        <?php if($manager->image): ?>
                            <img src="<?php echo e(asset('storage/' . $manager->image)); ?>" alt="<?php echo e($manager->name); ?>"
                                 class="w-40 h-40 rounded-2xl mx-auto object-cover border-4 border-gray-50 shadow-inner group-hover:scale-105 transition-transform duration-300">
                        <?php else: ?>
                            <div class="w-40 h-40 bg-red-50 border-4 border-gray-50 rounded-2xl mx-auto flex items-center justify-center text-red-500 font-stadium text-2xl tracking-wide">
                                XO STAFF
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Details Output -->
                    <h3 class="font-stadium text-3xl tracking-wide text-gray-900 leading-tight uppercase"><?php echo e($manager->name); ?></h3>
                    <div class="mt-2 inline-block bg-red-100 text-red-600 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full">
                        <?php echo e($manager->role); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <!-- Empty Dataset Safe Response State -->
                <div class="col-span-full bg-white border border-gray-100 rounded-3xl p-16 text-center shadow-md">
                    <span class="text-5xl block mb-4">📋</span>
                    <h3 class="font-stadium text-3xl uppercase tracking-wider text-gray-400">Roster Empty</h3>
                    <p class="text-gray-400 text-sm mt-1">There are currently no staff profile members available.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

</body>
</html>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/manager.blade.php ENDPATH**/ ?>