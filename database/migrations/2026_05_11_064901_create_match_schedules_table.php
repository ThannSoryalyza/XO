<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('match_schedules', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable(); // Optional image for the match
        $table->string('home_team');
        $table->string('away_team');
        $table->date('match_date');
        $table->time('match_time');
        $table->time('Finish_time');
        $table->string('stadium');
        $table->string('location_type'); // e.g., "Home", "Away", "Neutral"
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_schedules');
    }
};
