<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;700&display=swap">
    <title>Header</title>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-stadium { font-family: 'Bebas Neue', cursive; }
    </style>
</head>
<body>
   <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b-2 border-red-600 shadow-sm">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-2">
            <a class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-white overflow-hidden shadow-lg shadow-red-600/30" href="{{ url('/') }}">
                <img src="{{ asset('XO.png') }}" alt="Logo" class="object-cover w-full h-full">
            </a>
            <a href="{{ url('/') }}">
                <span class="font-stadium text-3xl tracking-wide uppercase">XO United</span>
            </a>
        </div>

        <div class="hidden md:flex gap-10 font-bold uppercase text-sm tracking-widest">
            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors">Home</a>
            <a href="{{ url('/matches') }}" class="{{ Request::is('matches') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors">Matches</a>
            <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors">Contact</a>
        </div>

        <div class="flex items-center gap-4">
            <a href="{{ url('/player') }}" class="{{ Request::is('player') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-white' }} px-6 py-2 rounded-md bg-red-600 text-white font-stadium text-xl tracking-wider hover:bg-black transition-all active:scale-95 md:text-sm lg:text-sm">
                All Players
            </a>
            <a href="{{ url('/managers') }}" class="{{ Request::is('managers') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-white' }} px-6 py-2 rounded-md bg-red-600 text-white font-stadium text-xl tracking-wider hover:bg-black transition-all active:scale-95 md:text-sm lg:text-sm">
                        Manager Team
                    </a>

            <button class="md:hidden text-2xl p-2" onclick="toggleMobileMenu()">
                ☰
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden flex-col bg-white border-t border-gray-100 p-8 gap-8 font-bold uppercase text-sm tracking-widest shadow-xl max-h-[calc(100vh-80px)] overflow-y-auto">
        <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors w-max py-1">Home</a>
        <a href="{{ url('/matches') }}" class="{{ Request::is('matches') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors w-max py-1">Matches</a>
        <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors w-max py-1">Contact</a>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
        menu.classList.toggle('flex');
    }
</script>
</body>
</html>
