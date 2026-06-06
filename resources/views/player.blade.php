@extends('layouts.public')

@section('title', 'Player Roster | XO United')

@section('content')
@php
    $roleConfig = [
        'GK' => ['title' => 'Goalkeeper', 'label' => 'GOALKEEPER'],
        'DF' => ['title' => 'Defender', 'label' => 'DEFENDER'],
        'MD' => ['title' => 'Midfielder', 'label' => 'MIDFIELDER'],
        'FW' => ['title' => 'Forward', 'label' => 'FORWARD'],
    ];
@endphp

<section class="squad-page">
    <div class="squad-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="squad-hero-grid">
                <div class="squad-hero-copy">
                    <img src="{{ asset('img/XO.png') }}" alt="XO United" class="squad-hero-logo">
                    <p class="xo-eyebrow squad-hero-eyebrow mb-2">First Team Squad</p>
                    <h1 class="font-stadium squad-hero-title">ALL PLAYERS</h1>
                    <p class="squad-hero-desc">Full squad roster organised by position.</p>
                </div>
                <div class="squad-hero-total">
                    <p class="squad-hero-total-number">{{ $players->count() }}</p>
                    <p class="squad-hero-total-sub">Total Players</p>
                </div>
            </div>
        </div>
    </div>

    <nav class="squad-filter" id="squad-filter" aria-label="Filter by position">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="squad-filter-track">
                @foreach($roleConfig as $code => $data)
                    @php $posCount = $players->where('position', $code)->count(); @endphp
                    <a href="#squad-{{ strtolower($code) }}" class="squad-filter-btn" data-squad-section="squad-{{ strtolower($code) }}">
                        <span class="squad-filter-code">{{ $code }}</span>
                        <span class="squad-filter-count">{{ $posCount }} {{ $posCount === 1 ? 'player' : 'players' }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        @foreach($roleConfig as $code => $data)
            @php $count = $players->where('position', $code)->count(); @endphp
            <section id="squad-{{ strtolower($code) }}" class="squad-block">
                <div class="squad-block-header">
                    <h2 class="squad-block-title">{{ $data['label'] }}</h2>
                    <span class="squad-block-count">{{ $count }} {{ $count === 1 ? 'player' : 'players' }}</span>
                </div>

                <div class="squad-grid">
                    @forelse($players->where('position', $code) as $player)
                        <article class="squad-player">
                            @if($player->image)
                                <button
                                    type="button"
                                    class="squad-player-photo"
                                    data-lightbox-src="{{ media_asset($player->image) }}"
                                    data-lightbox-title="{{ $player->name }}"
                                    data-lightbox-subtitle="#{{ $player->number }} · {{ $data['label'] }}"
                                    aria-label="View full photo of {{ $player->name }}"
                                >
                                    <img src="{{ media_asset($player->image) }}" alt="{{ $player->name }}" loading="lazy">
                                </button>
                            @else
                                <div class="squad-player-photo squad-player-photo--empty">
                                    <span class="squad-player-empty-icon">⚽</span>
                                </div>
                            @endif
                            <div class="squad-player-info">
                                <span class="squad-player-num">{{ $player->number }}</span>
                                <div class="squad-player-details">
                                    <h3 class="squad-player-name">{{ $player->name }}</h3>
                                    <span class="squad-player-role">{{ $code }} · {{ $data['title'] }}</span>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="squad-empty">
                            <p>No {{ strtolower($data['title']) }}s in the squad yet.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        @endforeach

        <div class="squad-bottom-cta">
            <h3 class="font-stadium squad-bottom-title">MANAGEMENT TEAM</h3>
            <p class="squad-bottom-text">View coaches and staff behind the squad.</p>
            <a href="{{ route('managers') }}" class="squad-bottom-link">View Management Team</a>
        </div>
    </div>
</section>

@include('components.image-lightbox')

@push('scripts')
    <script src="{{ asset('js/squad-nav.js') }}"></script>
@endpush
@endsection
