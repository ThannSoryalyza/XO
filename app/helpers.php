<?php

if (! function_exists('resolve_public_image_path')) {
    function resolve_public_image_path(string $path): string
    {
        if (str_contains($path, '/')) {
            if (is_file(public_path($path))) {
                return $path;
            }

            $directory = public_path(dirname($path));
            $filename = basename($path);

            if (is_dir($directory)) {
                foreach (scandir($directory) as $file) {
                    if (strcasecmp($file, $filename) === 0) {
                        return dirname($path) . '/' . $file;
                    }
                }
            }

            return $path;
        }

        $imgPath = 'img/' . $path;

        if (is_file(public_path($imgPath))) {
            return $imgPath;
        }

        $imgDirectory = public_path('img');
        if (is_dir($imgDirectory)) {
            foreach (scandir($imgDirectory) as $file) {
                if (strcasecmp($file, $path) === 0) {
                    return 'img/' . $file;
                }
            }
        }

        return $imgPath;
    }
}

if (! function_exists('media_asset')) {
    function media_asset(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }

        if (is_file(storage_path('app/public/' . $path))) {
            return asset('storage/' . $path);
        }

        return asset(resolve_public_image_path($path));
    }
}

if (! function_exists('club_logo')) {
    function club_logo(?string $teamName): ?string
    {
        if (empty($teamName)) {
            return null;
        }

        $normalized = strtoupper(preg_replace('/[^A-Z0-9\s]/', '', $teamName));
        $normalized = preg_replace('/\s+/', ' ', trim($normalized));

        $map = [
            'XO UNITED' => 'img/XO.png',
            'XOUNITED' => 'img/XO.png',
            'VISAKHA' => 'img/VSK.png',
            'PHNOM PENH CROWN' => 'img/PPC.png',
            'PKRSVR' => 'img/PKR.png',
            'BOEUNG KET' => 'img/BK.png',
            'NAGAWORLD' => 'img/NAGA.png',
            'KOMPONG CHHNANG' => 'img/kpc.jpg',
            'SEIM REAP' => 'img/SR.png',
            'SIEM REAP' => 'img/SR.png',
        ];

        $keys = array_keys($map);
        usort($keys, fn ($a, $b) => strlen($b) <=> strlen($a));

        foreach ($keys as $key) {
            if (str_contains($normalized, $key)) {
                return media_asset($map[$key]);
            }
        }

        return null;
    }
}

if (! function_exists('format_match_time')) {
    function format_match_time(?string $time): ?string
    {
        if (empty($time)) {
            return null;
        }

        try {
            return \Carbon\Carbon::parse($time)->format('H:i');
        } catch (\Exception) {
            return $time;
        }
    }
}

if (! function_exists('match_finish_time')) {
    function match_finish_time(object $match): ?string
    {
        return $match->Finish_time ?? $match->finish_time ?? null;
    }
}

if (! function_exists('match_team_logo')) {
    function match_team_logo(object $match, string $side): ?string
    {
        $uploaded = $side === 'home'
            ? ($match->home_logo ?? null)
            : ($match->away_logo ?? null);

        if (! empty($uploaded)) {
            return media_asset($uploaded);
        }

        $teamName = $side === 'home'
            ? ($match->home_team ?? null)
            : ($match->away_team ?? null);

        return club_logo($teamName);
    }
}
