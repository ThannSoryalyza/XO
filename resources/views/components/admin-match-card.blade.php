@php
    $homeLogo = match_team_logo($match, 'home');
    $awayLogo = match_team_logo($match, 'away');
    $finishTime = match_finish_time($match);
@endphp

<article class="match-card admin-match-card">
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
        <h3 class="match-card-title admin-match-title">
            {{ $match->home_team }} <span class="admin-match-vs">VS</span> {{ $match->away_team }}
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

    <div class="admin-match-actions">
        <button type="button" class="btn btn-sm btn-outline-primary edit-match-btn"
                data-id="{{ $match->id }}"
                data-home="{{ $match->home_team }}"
                data-away="{{ $match->away_team }}"
                data-date="{{ $match->match_date }}"
                data-time="{{ $match->match_time }}"
                data-finish="{{ $finishTime }}"
                data-stadium="{{ $match->stadium }}"
                data-location="{{ $match->location_type }}"
                data-home-logo="{{ match_team_logo($match, 'home') }}"
                data-away-logo="{{ match_team_logo($match, 'away') }}">
            <i class="bi bi-pencil-square"></i> Edit
        </button>
        <form action="{{ route('admin.matches.destroy', $match->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this match fixture?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</article>
