<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XO United</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/views/components/header.blade.php">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-stadium { font-family: 'Bebas Neue', cursive; }
    </style>
</head>
<body class="bg-white text-gray-900 selection:bg-red-600 selection:text-white">

   <x-header />

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
             @forelse($services as $service)
        <div class="bg-white p-10 border-b-8 border-red-600 shadow-lg text-center w-full max-w-sm">
            <div class="text-4xl mb-4">{{ $service->icon }}</div>
            <h3 class="font-stadium text-2xl mb-2">{{ $service->title }}</h3>
            <p class="text-gray-600">{{ $service->description }}</p>
        </div>
    @empty
        <p class="text-center col-span-3 text-gray-400 italic">No services found in the database.</p>
    @endforelse
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
            <img src="our_team.jpg" alt="Our Team" class="w-200 h-100 justify-center mx-auto mt-5 shadow-lg " >
        </div>
    </section>

    <footer class="py-8 bg-red-600 text-center border-t border-gray-100 mt-12">
        <p class="font-stadium text-xl text-white">Copyright &copy; 2026 XO United</p>
    </footer>

</body>
</html>
