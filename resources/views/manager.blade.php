@extends('layouts.public')

@section('title', 'Management Team | XO United')

@section('content')
<section class="roster-page">
    <div class="roster-hero">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('img/XO.png') }}" alt="XO United" class="roster-hero-logo">
            <p class="xo-eyebrow roster-hero-eyebrow mb-2">Staff</p>
            <h1 class="font-stadium roster-hero-title">MANAGEMENT TEAM</h1>
            <p class="roster-hero-subtitle">The strategic brains behind our operations and team growth.</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="staff-grid">
            @forelse($managers as $manager)
                <article class="staff-card">
                    @if($manager->image)
                        <button
                            type="button"
                            class="staff-card-media"
                            data-lightbox-src="{{ media_asset($manager->image) }}"
                            data-lightbox-title="{{ $manager->name }}"
                            data-lightbox-subtitle="{{ $manager->role }}"
                            aria-label="View full photo of {{ $manager->name }}"
                        >
                            <img src="{{ media_asset($manager->image) }}" alt="{{ $manager->name }}" loading="lazy">
                            <span class="staff-card-zoom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/><path d="M11 8v6M8 11h6"/></svg>
                                View photo
                            </span>
                        </button>
                    @else
                        <div class="staff-card-media staff-card-media--placeholder">
                            <span class="staff-card-placeholder">XO</span>
                        </div>
                    @endif
                    <div class="staff-card-body">
                        <h3 class="staff-card-name">{{ $manager->name }}</h3>
                        <span class="staff-card-role">{{ $manager->role }}</span>
                    </div>
                </article>
            @empty
                <div class="roster-empty roster-empty--wide">
                    <span class="roster-empty-icon">📋</span>
                    <h3 class="font-stadium text-2xl text-zinc-400 uppercase">Roster Empty</h3>
                    <p class="text-zinc-400 text-sm mt-1">Management staff will appear here once added.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('components.image-lightbox')
@endsection
