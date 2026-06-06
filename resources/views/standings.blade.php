@extends('layouts.public')

@section('title', 'League Standings | XO United')

@section('content')
<section class="py-12 sm:py-16 lg:py-20 xo-section-white min-h-[70vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-10">
            <img src="{{ asset('img/XO.png') }}" alt="XO United" class="w-11 h-11 rounded-full ring-1 ring-zinc-200 bg-white p-0.5">
            <div>
                <p class="xo-eyebrow mb-1">League Table</p>
                <h1 class="xo-title text-4xl sm:text-5xl md:text-6xl">STANDINGS 2025/26</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:hidden gap-4 mb-6">
            @forelse($standings as $team)
                <div class="xo-card flex items-center gap-4 p-4">
                    <span class="font-stadium text-3xl text-red-600 w-7">{{ $team->position }}</span>
                    @if($team->logo)
                        <img src="{{ media_asset($team->logo) }}" alt="{{ $team->club_name }}" class="w-9 h-9 rounded-full object-cover ring-1 ring-zinc-200">
                    @else
                        <div class="w-9 h-9 rounded-full bg-red-50 text-red-600 flex items-center justify-center font-bold text-xs">{{ strtoupper(substr($team->club_name, 0, 1)) }}</div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold truncate text-zinc-900">{{ $team->club_name }}</p>
                        <p class="text-xs text-zinc-400">P {{ $team->played }} · GD {{ $team->goal_difference >= 0 ? '+' : '' }}{{ $team->goal_difference }}</p>
                    </div>
                    <span class="font-stadium text-2xl text-zinc-900">{{ $team->points }}</span>
                </div>
            @empty
                <p class="col-span-full text-center py-12 text-zinc-400">No standings data available yet.</p>
            @endforelse
        </div>

        <div class="hidden lg:block xo-card overflow-hidden p-0">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px] text-sm">
                    <thead>
                        <tr class="bg-red-600 text-white text-xs uppercase tracking-wider">
                            <th class="px-6 py-3.5 text-left">Pos</th>
                            <th class="px-6 py-3.5 text-left">Club</th>
                            <th class="px-3 py-3.5 text-center">P</th>
                            <th class="px-3 py-3.5 text-center">W</th>
                            <th class="px-3 py-3.5 text-center">D</th>
                            <th class="px-3 py-3.5 text-center">L</th>
                            <th class="px-3 py-3.5 text-center">GF</th>
                            <th class="px-3 py-3.5 text-center">GA</th>
                            <th class="px-3 py-3.5 text-center">GD</th>
                            <th class="px-6 py-3.5 text-center">Pts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($standings as $index => $team)
                            <tr class="{{ $index % 2 === 0 ? 'bg-zinc-50/80' : 'bg-white' }} border-t border-zinc-100 hover:bg-red-50/40 transition-colors">
                                <td class="px-6 py-3.5 font-stadium text-lg text-red-600">{{ $team->position }}</td>
                                <td class="px-6 py-3.5">
                                    <div class="flex items-center gap-2.5">
                                        @if($team->logo)<img src="{{ media_asset($team->logo) }}" alt="" class="w-7 h-7 rounded-full object-cover">@endif
                                        <span class="font-medium text-zinc-900">{{ $team->club_name }}</span>
                                    </div>
                                </td>
                                <td class="px-3 py-3.5 text-center text-zinc-500">{{ $team->played }}</td>
                                <td class="px-3 py-3.5 text-center text-zinc-500">{{ $team->won }}</td>
                                <td class="px-3 py-3.5 text-center text-zinc-500">{{ $team->drawn }}</td>
                                <td class="px-3 py-3.5 text-center text-zinc-500">{{ $team->lost }}</td>
                                <td class="px-3 py-3.5 text-center text-zinc-500">{{ $team->goals_for }}</td>
                                <td class="px-3 py-3.5 text-center font-medium text-ga-negative">-{{ $team->goals_against }}</td>
                                <td class="px-3 py-3.5 text-center font-medium {{ $team->goal_difference >= 0 ? 'text-emerald-600' : 'text-red-600' }}">{{ $team->goal_difference >= 0 ? '+' : '' }}{{ $team->goal_difference }}</td>
                                <td class="px-6 py-3.5 text-center font-stadium text-lg text-zinc-900">{{ $team->points }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="10" class="px-6 py-16 text-center text-zinc-400">No standings data available yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
