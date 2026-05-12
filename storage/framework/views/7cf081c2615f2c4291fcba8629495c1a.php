<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Player Roster</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom aspect ratio fallback for older browsers */
        .aspect-3\/4 { aspect-ratio: 3 / 4; }
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

    <section class="max-w-7xl mx-auto px-4 md:px-6 py-8 mt-4">

        <div class="flex flex-col md:flex-row items-start md:items-center justify-between w-full gap-6 mb-12">
            <h1 class="px-4 py-1 border-l-4 border-red-600 bg-red-50 text-red-600 font-bold text-xl uppercase tracking-wider">
                Team Squad
            </h1>

            <div class="grid grid-cols-2 sm:flex sm:flex-row gap-4 md:gap-8 w-full md:w-auto">
                <?php
                    $roleConfig = [
                        'GK' => ['title' => 'GOALKEEPER', 'count' => $players->where('role', 'GK')->count()],
                        'DF' => ['title' => 'DEFENDER', 'count' => $players->where('role', 'DF')->count()],
                        'MF' => ['title' => 'MIDFIELDER', 'count' => $players->where('role', 'MF')->count()],
                        'FW' => ['title' => 'FORWARD', 'count' => $players->where('role', 'FW')->count()],
                    ];
                ?>

                <?php $__currentLoopData = $roleConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col items-center sm:items-start">
                    <p class="text-black leading-none ">
                        <span class="font-bold text-3xl md:text-4xl items-center text-center"><?php echo e($data['count']); ?></span>
                    </p>
                    <p class="text-red-600 font-bold text-[10px] md:text-xs tracking-widest mt-1 uppercase">
                        <?php echo e($data['title']); ?>

                    </p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php $__currentLoopData = $roleConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex gap-4 md:gap-6 items-baseline mt-12 mb-6 md:mb-8">
                <h1 class="text-red-900 font-bold text-5xl md:text-7xl opacity-80 select-none" style="-webkit-text-stroke: 0.2px rgb(0, 0, 0);"><?php echo e($code); ?></h1>
                <div class="flex flex-col">
                    <p class="text-black">
                        <span class="font-bold text-2xl md:text-3xl tracking-tight uppercase"><?php echo e($data['title']); ?></span>
                    </p>
                    <p class="text-gray-400 text-[10px] md:text-sm ">
                        <?php echo e($data['count']); ?> Players
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-6 md:grid-cols-3 lg:grid-cols-4 mb-10">
                <?php $__empty_1 = true; $__currentLoopData = $players->where('role', $code); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white rounded-xl md:rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col group">

                        <div class="relative w-full aspect-3/4 overflow-hidden bg-[#064e3b]">
                            <?php if($player->image): ?>
                                <img src="<?php echo e(asset($player->image)); ?>"
                                     alt="<?php echo e($player->name); ?>"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php else: ?>
                                <div class="flex flex-col items-center justify-center h-full text-green-200/20 p-4">
                                    <span class="text-4xl md:text-6xl mb-2">⚽</span>
                                </div>
                            <?php endif; ?>

                            <div class="absolute inset-0 bg-line-to-t from-black/90 via-transparent to-transparent opacity-80"></div>

                            <div class="absolute top-2 left-2 md:top-4 md:left-4 bg-green-500/30 backdrop-blur-md px-2 py-0.5 md:px-3 md:py-1 rounded border border-white/20">
                                <span class="text-[9px] md:text-xs font-black text-white tracking-widest"><?php echo e($code); ?></span>
                            </div>

                            <div class="absolute bottom-2 left-2 right-2 md:bottom-4 md:left-4 md:right-4 flex items-baseline gap-1 md:gap-2">
                                 <span class="text-xl md:text-4xl font-black text-white italic leading-none" style="-webkit-text-stroke: 0.5px black;"><?php echo e($player->number); ?></span>
                                <h2 class=" backdrop-blur-sm text-white text-[10px] md:text-sm font-bold uppercase tracking-wider px-2 py-1.5 md:px-5 md:py-2 rounded-full border border-white/20 bg-green-500/30 shadow-xl truncate max-w-full">
                                        <?php echo e($player->name); ?>

                                </h2>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full py-12 border-2 border-dashed border-gray-200 rounded-2xl flex items-center justify-center bg-gray-50/50">
                        <p class="text-gray-400 italic text-sm md:text-base font-medium">
                            No <?php echo e(strtolower($data['title'])); ?>s found.
                        </p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if(!$loop->last): ?>
                <hr class="border-gray-200 my-8 md:my-16">
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </section>
</body>
</html>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/player.blade.php ENDPATH**/ ?>