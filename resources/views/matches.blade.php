<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matches</title>
     <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/views/components/header.blade.php">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-stadium { font-family: 'Bebas Neue', cursive; }
    </style>
</head>
<body>
    <x-header />
    <section class="max-w-7xl mx-auto px-6 py-2">
    <h1 class="inline-block px-4 py-1 mb-6 border-l-4 border-red-600 bg-red-50 text-red-600 font-bold text-sm uppercase tracking-widest ml-10 mt-8">Upcoming Matches</h1>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto px-6">
    @forelse($matches as $match)
    <div class="p-4 bg-gray-100 rounded-lg shadow flex gap-6 items-center justify-center">
        <div>
            <h2 class="text-xl font-semibold">{{ $match->home_team }} vs {{ $match->away_team }}</h2>
            <p class="text-gray-600"><span class="font-bold text-red-500">Date:</span> {{ $match->match_date }}</p>
            <div class="flex items-center gap-4 grid-cols-1 md:grid-cols-2 justify-between">
                <p class="text-gray-600"><span class="font-bold text-red-500">Time:</span> {{ $match->match_time }}</p>
                <p class="text-gray-600"><span class="font-bold text-red-500">Finish:</span> {{ $match->Finish_time }}</p>
            </div>

            <p class="text-gray-600"><span class="font-bold text-red-500">Location:</span> {{ $match->stadium }}</p>
            <p class="text-red-600 text-lg font-bold lg:right-7"><span class="font-bold text-red-500">📍</span> {{ $match->location_type }}</p>
        </div>
    </div>
@empty
    <p>No matches yet.</p>
@endforelse </div>
</section>

</body>
</html>
