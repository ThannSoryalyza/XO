<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('match_schedules', function (Blueprint $table) {
            $table->string('home_logo')->nullable()->after('away_team');
            $table->string('away_logo')->nullable()->after('home_logo');
        });
    }

    public function down(): void
    {
        Schema::table('match_schedules', function (Blueprint $table) {
            $table->dropColumn(['home_logo', 'away_logo']);
        });
    }
};
