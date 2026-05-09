<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        Service::create([
            'icon' => '⚽',
            'title' => 'Football Training Academy',
            'description'=> 'Comprehensive technical and physical development programs for youth players seeking professional pathways.',
        ]);
        Service::create([
            'icon' => '🧤',
            'title' => 'Pro Goalkeeper School',
            'description'=> 'Specialized modern training focused on shot-stopping, high-cross dominance, and ball distribution.',
        ]);
        Service::create([
            'icon' => '👤',
            'title' => '1-on-1 Private Coaching',
            'description'=> 'Personalized intensive sessions designed to fix specific technical weaknesses and accelerate player growth.',
        ]);
    }
}
