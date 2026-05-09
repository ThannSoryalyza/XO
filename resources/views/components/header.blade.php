<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
</head>
<body>
    <nav class="sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-white/90 backdrop-blur-md border-b-2 border-red-600 shadow-sm">
    <div class="flex items-center gap-2">
        <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white overflow-hidden shadow-lg shadow-red-600/30">
            <img src="{{ asset('XO.jpg') }}" alt="Logo" class="object-cover w-full h-full">
        </div>
        <span class="font-stadium text-3xl tracking-wide uppercase">XO United</span>
    </div>

    <div class="hidden md:flex gap-10 font-bold uppercase text-sm tracking-widest">
        <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors">Home</a>
        <a href="{{ url('/matches') }}" class="{{ Request::is('matches') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors">Matches</a>
        <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'text-red-600 border-b-2 border-red-600' : 'hover:text-red-600' }} transition-colors">Contact</a>
    </div>

    <div class="flex items-center gap-4">
        <button class="px-6 py-2 rounded-md bg-red-600 text-white font-stadium text-xl tracking-wider hover:bg-black transition-all active:scale-95">
            JOIN CLUB
        </button>

        <button class="md:hidden text-2xl" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            ☰
        </button>
    </div>
</nav>

<div id="mobile-menu" class="hidden md:hidden bg-white border-b-2 border-red-600 flex-col p-4 gap-4  font-bold uppercase">
    <a href="{{ url('/') }}" class="hover:text-red-600">Home</a>
    <a href="{{ url('/matches') }}" class="hover:text-red-600">Matches</a>
    <a href="{{ url('/contact') }}" class="hover:text-red-600">Contact</a>
</div>
</body>
</html>
