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

    <x-header />

    <!-- Main Content Container -->
    <main class="max-w-6xl mx-auto px-6 py-12 md:py-20">
        <div class="text-center mb-16">
            <h1 class="font-stadium text-5xl md:text-7xl tracking-tight uppercase leading-none">Management Staff</h1>
            <p class="text-lg text-gray-500 mt-4 max-w-xl mx-auto">The strategic brains behind our operations, training schedules, and team growth directives.</p>
        </div>

        <!-- Management Loop Matrix Block -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($managers as $manager)
                <div class="bg-white border border-gray-100 rounded-3xl p-8 text-center shadow-lg hover:shadow-xl transition-all group duration-3xl">

                    <!-- Profile Picture Logic Output Container -->
                    <div class="relative w-40 h-40 mx-auto mb-6">
                        @if($manager->image)
                            <img src="{{ asset('storage/' . $manager->image) }}" alt="{{ $manager->name }}"
                                 class="w-40 h-40 rounded-2xl mx-auto object-cover border-4 border-gray-50 shadow-inner group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-40 h-40 bg-red-50 border-4 border-gray-50 rounded-2xl mx-auto flex items-center justify-center text-red-500 font-stadium text-2xl tracking-wide">
                                XO STAFF
                            </div>
                        @endif
                    </div>

                    <!-- Details Output -->
                    <h3 class="font-stadium text-3xl tracking-wide text-gray-900 leading-tight uppercase">{{ $manager->name }}</h3>
                    <div class="mt-2 inline-block bg-red-100 text-red-600 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full">
                        {{ $manager->role }}
                    </div>
                </div>
            @empty
                <!-- Empty Dataset Safe Response State -->
                <div class="col-span-full bg-white border border-gray-100 rounded-3xl p-16 text-center shadow-md">
                    <span class="text-5xl block mb-4">📋</span>
                    <h3 class="font-stadium text-3xl uppercase tracking-wider text-gray-400">Roster Empty</h3>
                    <p class="text-gray-400 text-sm mt-1">There are currently no staff profile members available.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>
