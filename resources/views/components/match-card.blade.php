@php
    $homeLogo = match_team_logo($match, 'home');
    $awayLogo = match_team_logo($match, 'away');
    $finishTime = match_finish_time($match);
@endphp

<article class="match-card">
    <div class="match-card-logos">
        <div class="match-card-side">
            @if($homeLogo)
                <img src="{{ $homeLogo }}" alt="{{ $match->home_team }}" class="match-card-logo">
            @else
                <div class="match-card-logo-fallback">{{ strtoupper(substr($match->home_team, 0, 1)) }}</div>
            @endif
            <span class="match-card-side-name">{{ $match->home_team }}</span>
        </div>

        <span class="match-card-vs">VS</span>

        <div class="match-card-side">
            @if($awayLogo)
                <img src="{{ $awayLogo }}" alt="{{ $match->away_team }}" class="match-card-logo">
            @else
                <div class="match-card-logo-fallback">{{ strtoupper(substr($match->away_team, 0, 1)) }}</div>
            @endif
            <span class="match-card-side-name">{{ $match->away_team }}</span>
        </div>
    </div>

    <div class="match-card-body">
        <h3 class="font-stadium match-card-title">
            {{ $match->home_team }} <span class="text-red-600">VS</span> {{ $match->away_team }}
        </h3>
        <p class="match-card-detail">
            <span class="match-card-pin" aria-hidden="true">📍</span>
            {{ $match->stadium }}
            <span class="match-card-location">({{ $match->location_type }})</span>
        </p>
        <p class="match-card-detail">
            <span class="match-card-label">Date:</span>
            {{ \Carbon\Carbon::parse($match->match_date)->format('d M Y') }}
        </p>
        <p class="match-card-detail">
            <span class="match-card-label">Kick off:</span> {{ format_match_time($match->match_time) }}
            @if($finishTime)
                · <span class="match-card-label">Finish:</span> {{ format_match_time($finishTime) }}
            @endif
        </p>
    </div>
</article>
