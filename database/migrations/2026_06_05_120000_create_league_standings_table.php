<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('league_standings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('position');
            $table->string('club_name');
            $table->string('logo')->nullable();
            $table->unsignedInteger('played')->default(0);
            $table->unsignedInteger('won')->default(0);
            $table->unsignedInteger('drawn')->default(0);
            $table->unsignedInteger('lost')->default(0);
            $table->unsignedInteger('goals_for')->default(0);
            $table->unsignedInteger('goals_against')->default(0);
            $table->integer('goal_difference')->default(0);
            $table->unsignedInteger('points')->default(0);
            $table->string('form', 10)->nullable();
            $table->string('next_match')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('league_standings');
    }
};
