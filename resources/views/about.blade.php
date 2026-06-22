@extends('layouts.public')

@section('title', 'About Us | XO United')

@section('content')
<section class="about-page">
    <div class="about-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('img/XO.png') }}" alt="XO United" class="about-hero-logo">
            <p class="xo-eyebrow about-hero-eyebrow mb-2">Our Story</p>
            <h1 class="font-stadium about-hero-title">ABOUT XO UNITED</h1>
            <p class="about-hero-subtitle">A football club built on unity, discipline, and pride — founded in Phnom Penh, 2021.</p>
            <div class="about-hero-badge">Est. 2021</div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="about-intro-grid">
            <div class="about-intro-copy">
                <p class="xo-eyebrow mb-2">Who We Are</p>
                <h2 class="font-stadium about-section-title">PLAY FOR THE BADGE</h2>
                <p class="about-text">XO United Football Club is a community-driven team based in Phnom Penh, Cambodia. We were founded in <strong>2021</strong> with one clear goal: to bring together players who share a love for the game and a commitment to growing football at the grassroots level.</p>
                <p class="about-text">From training sessions at Phum Trapang Thloeng I to competitive league fixtures, XO United represents more than results on the pitch. We stand for teamwork, respect, and the belief that every player deserves a chance to develop their talent.</p>
            </div>
            <div class="about-intro-photo">
                <img src="{{ asset('img/team.jpg') }}" alt="XO United squad" loading="lazy">
                <div class="about-intro-photo-caption">
                    <span class="font-stadium">UNITED UNDER ONE BADGE</span>
                </div>
            </div>
        </div>

        <div class="about-why">
            <p class="xo-eyebrow mb-2 text-center">Our Purpose</p>
            <h2 class="font-stadium about-section-title about-section-title--center">WHY WE CREATED XO UNITED</h2>
            <p class="about-why-lead">XO United was born from a simple idea: football should bring people together.</p>

            <div class="about-why-grid">
                <article class="about-card">
                    <span class="about-card-icon">⚽</span>
                    <h3 class="font-stadium about-card-title">PASSION FOR THE GAME</h3>
                    <p class="about-card-text">We started XO United because we wanted a place where players could train seriously, compete proudly, and enjoy football the way it was meant to be played — with heart and effort every match.</p>
                </article>
                <article class="about-card">
                    <span class="about-card-icon">🤝</span>
                    <h3 class="font-stadium about-card-title">UNITY & COMMUNITY</h3>
                    <p class="about-card-text">Football is strongest when people stand together. XO United was created to build a brotherhood on and off the pitch — supporting each other through wins, losses, and every training session in between.</p>
                </article>
                <article class="about-card">
                    <span class="about-card-icon">📈</span>
                    <h3 class="font-stadium about-card-title">PLAYER DEVELOPMENT</h3>
                    <p class="about-card-text">We believe in giving players a platform to grow — technically, physically, and mentally. XO United exists to help local talent improve, gain match experience, and represent the club with pride.</p>
                </article>
                <article class="about-card">
                    <span class="about-card-icon">🏆</span>
                    <h3 class="font-stadium about-card-title">COMPETITIVE SPIRIT</h3>
                    <p class="about-card-text">Since 2021, we have pushed ourselves to compete at a higher level, face strong opponents, and keep raising the standard of our squad, coaching, and club culture season after season.</p>
                </article>
            </div>
        </div>

        <div class="about-values">
            <div class="about-values-head">
                <p class="xo-eyebrow mb-1">What We Stand For</p>
                <h2 class="font-stadium about-section-title">CLUB VALUES</h2>
            </div>
            <ul class="about-values-list">
                <li><strong>Pride</strong> — Wear the badge with honour, on and off the pitch.</li>
                <li><strong>Passion</strong> — Give full effort in every training session and match.</li>
                <li><strong>Performance</strong> — Improve individually and win together as a team.</li>
                <li><strong>Respect</strong> — For teammates, coaches, opponents, and supporters.</li>
            </ul>
        </div>

        <div class="about-stats">
            <div class="about-stat">
                <span class="about-stat-num">2021</span>
                <span class="about-stat-label">Year Founded</span>
            </div>
            <div class="about-stat">
                <span class="about-stat-num">PP</span>
                <span class="about-stat-label">Phnom Penh, Cambodia</span>
            </div>
            <div class="about-stat">
                <span class="about-stat-num">XO</span>
                <span class="about-stat-label">United Football Club</span>
            </div>
        </div>

        <div class="about-cta">
            <h3 class="font-stadium about-cta-title">BE PART OF THE JOURNEY</h3>
            <p class="about-cta-text">Follow our matches, meet the squad, and see what XO United is building for the future.</p>
            <div class="about-cta-actions">
                <a href="{{ route('player') }}" class="home-btn home-btn--primary">View Players</a>
                <a href="{{ route('matches') }}" class="home-btn home-btn--outline">Upcoming Matches</a>
            </div>
        </div>
    </div>
</section>
@endsection
