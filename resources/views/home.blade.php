@extends('layouts.public')

@section('title', 'XO United | Home')

@section('content')
    <section class="home-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-hero-grid">
                <div class="home-hero-copy">
                    <p class="xo-eyebrow mb-2">Season 2025/26</p>
                    <h1 class="font-stadium home-hero-title">PLAY FOR <span class="text-red-600">THE BADGE.</span></h1>
                    <p class="home-hero-desc">Professional player management and scouting for the next generation of football stars.</p>
                    <div class="home-hero-actions">
                        <a href="{{ route('matches') }}" class="home-btn home-btn--primary">View Matches</a>
                        <a href="{{ route('standings') }}" class="home-btn home-btn--outline">Standings</a>
                    </div>
                    <div class="home-hero-stats">
                        <div class="home-hero-stat">
                            <span class="home-hero-stat-num">{{ $upcomingMatches->count() }}</span>
                            <span class="home-hero-stat-label">Upcoming</span>
                        </div>
                        <div class="home-hero-stat">
                            <span class="home-hero-stat-num">{{ $playersCount }}</span>
                            <span class="home-hero-stat-label">Players</span>
                        </div>
                        <div class="home-hero-stat">
                            <span class="home-hero-stat-num">{{ $standings->count() }}</span>
                            <span class="home-hero-stat-label">Clubs</span>
                        </div>
                    </div>
                </div>
                <div class="home-hero-media">
                    <div class="home-hero-photo">
                        <img src="{{ asset('img/capitan.jpg') }}" alt="XO United Captain" class="home-hero-photo-img">
                        <div class="home-hero-photo-overlay"></div>
                        <div class="home-hero-photo-caption">
                            <p class="font-stadium home-hero-photo-title">XO UNITED FC</p>
                            <p class="home-hero-photo-sub">Pride · Passion · Performance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section home-section--muted">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-section-head">
                <div>
                    <p class="xo-eyebrow mb-1">Fixtures</p>
                    <h2 class="font-stadium home-section-title">UPCOMING MATCHES</h2>
                </div>
                <a href="{{ route('matches') }}" class="home-section-link">View All →</a>
            </div>

            <div class="match-card-grid">
                @forelse($upcomingMatches->take(3) as $match)
                    <x-match-card :match="$match" />
                @empty
                    <div class="home-empty">No upcoming matches scheduled yet.</div>
                @endforelse
            </div>
        </div>
    </section>

    @if($standings->isNotEmpty())
    <section class="home-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-section-head">
                <div>
                    <p class="xo-eyebrow mb-1">League Table</p>
                    <h2 class="font-stadium home-section-title">TOP STANDINGS</h2>
                </div>
                <a href="{{ route('standings') }}" class="home-section-link">Full Table →</a>
            </div>

            <div class="home-standings-card">
                <table class="home-standings-table">
                    <thead>
                        <tr>
                            <th>Pos</th>
                            <th>Club</th>
                            <th class="home-standings-hide-sm">P</th>
                            <th class="home-standings-hide-sm">W</th>
                            <th class="home-standings-hide-sm">D</th>
                            <th class="home-standings-hide-sm">L</th>
                            <th>GD</th>
                            <th>Pts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($standings->take(5) as $team)
                            <tr>
                                <td class="home-standings-pos">{{ $team->position }}</td>
                                <td>
                                    <div class="home-standings-club">
                                        @if($team->logo)
                                            <img src="{{ media_asset($team->logo) }}" alt="" class="home-standings-logo">
                                        @else
                                            <span class="home-standings-logo-fallback">{{ strtoupper(substr($team->club_name, 0, 1)) }}</span>
                                        @endif
                                        <span>{{ $team->club_name }}</span>
                                    </div>
                                </td>
                                <td class="home-standings-hide-sm">{{ $team->played }}</td>
                                <td class="home-standings-hide-sm">{{ $team->won }}</td>
                                <td class="home-standings-hide-sm">{{ $team->drawn }}</td>
                                <td class="home-standings-hide-sm">{{ $team->lost }}</td>
                                <td class="{{ $team->goal_difference >= 0 ? 'text-emerald-600' : 'text-red-600' }}">{{ $team->goal_difference >= 0 ? '+' : '' }}{{ $team->goal_difference }}</td>
                                <td class="home-standings-pts">{{ $team->points }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endif

    <section id="services" class="home-section home-section--red">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-section-head home-section-head--light">
                <div class="home-section-head-center">
                    <p class="home-eyebrow-light mb-1">XO United Football Club</p>
                    <h2 class="font-stadium home-section-title home-section-title--light">CLUB SERVICES</h2>
                    <p class="home-services-desc">Built for players, coaches, and supporters.</p>
                </div>
            </div>

            <div class="home-services-grid">
                @forelse($services as $service)
                    <article class="home-service-card">
                        <div class="home-service-icon">{{ $service->icon }}</div>
                        <h3 class="font-stadium home-service-title">{{ $service->title }}</h3>
                        <p class="home-service-text">{{ $service->description }}</p>
                    </article>
                @empty
                    <div class="home-empty home-empty--light">Club services coming soon.</div>
                @endforelse
            </div>

            @if($services->isNotEmpty())
                <div class="home-services-cta">
                    <a href="mailto:xounited@gmail.com" class="home-btn home-btn--white">Get Started →</a>
                </div>
            @endif
        </div>
    </section>

    <section class="home-section home-section--muted">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-team-grid">
                <button
                    type="button"
                    class="home-team-photo"
                    data-lightbox-src="{{ asset('img/team.jpg') }}"
                    data-lightbox-title="Our Team"
                    data-lightbox-subtitle="United under one badge."
                    aria-label="View full team photo"
                >
                    <img src="{{ asset('img/team.jpg') }}" alt="Our Team" loading="lazy">
                    <div class="home-team-photo-overlay"></div>
                    <div class="home-team-photo-caption">
                        <h2 class="font-stadium">OUR TEAM</h2>
                        <p>United under one badge.</p>
                    </div>
                </button>
                <div class="home-team-copy">
                    <p class="xo-eyebrow mb-1">Squad & Staff</p>
                    <h3 class="font-stadium home-section-title">MEET THE SQUAD</h3>
                    <p class="home-team-desc">Explore our full roster and management team.</p>
                    <div class="home-team-actions">
                        <a href="{{ route('player') }}" class="home-btn home-btn--primary">All Players</a>
                        <a href="{{ route('managers') }}" class="home-btn home-btn--outline">Manager Team</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section home-join">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-join-card">
                <div class="home-join-copy">
                    <p class="xo-eyebrow mb-1">Get Involved</p>
                    <h2 class="font-stadium home-join-title">INTERESTED IN JOINING?</h2>
                    <p class="home-join-text">Contact us to learn about trials, training sessions, and becoming part of XO United.</p>
                </div>
                <a href="mailto:xounited@gmail.com" class="home-btn home-btn--primary home-join-btn">Email Us</a>
            </div>
        </div>
    </section>

    @include('components.image-lightbox')
@endsection
