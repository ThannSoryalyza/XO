@extends('layouts.public')

@section('title', 'Match Schedule | XO United')

@section('content')
<section class="matches-page">
    <div class="matches-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('img/XO.png') }}" alt="XO United" class="matches-hero-logo">
            <p class="xo-eyebrow matches-hero-eyebrow mb-2">Fixtures</p>
            <h1 class="font-stadium matches-hero-title">UPCOMING MATCHES</h1>
            <p class="matches-hero-subtitle">All scheduled fixtures for XO United this season.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="match-card-grid">
            @forelse($matches as $match)
                <x-match-card :match="$match" />
            @empty
                <div class="match-card-empty">
                    <span class="match-card-empty-icon">📅</span>
                    <p class="match-card-empty-title">No upcoming matches scheduled at the moment.</p>
                    <p class="match-card-empty-text">When a new fixture is added, it will appear here.</p>
                    @auth
                        <a href="{{ route('admin.dashboard') }}#matches-sec" class="match-card-empty-btn">Add New Match</a>
                    @else
                        <a href="{{ route('login') }}" class="match-card-empty-btn">Add New Match</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
