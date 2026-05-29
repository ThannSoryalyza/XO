<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Only create 'players' if it doesn't exist from older migrations
        if (!Schema::hasTable('players')) {
            Schema::create('players', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('number');
                $table->string('position');
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }

        // Only create 'managers' if it doesn't exist
        if (!Schema::hasTable('managers')) {
            Schema::create('managers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('role');
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }

        // Only create 'matches' if it doesn't exist
        if (!Schema::hasTable('matches')) {
            Schema::create('matches', function (Blueprint $table) {
                $table->id();
                $table->string('home_team');
                $table->string('away_team');
                $table->date('match_date');
                $table->time('match_time');
                $table->time('finish_time');
                $table->string('stadium');
                $table->enum('location_type', ['Home', 'Away']);
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }

        // Only create 'messages' if it doesn't exist
        if (!Schema::hasTable('messages')) {
            Schema::create('messages', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('subject')->nullable();
                $table->text('message');
                $table->boolean('is_read')->default(false);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('matches');
        Schema::dropIfExists('managers');
        Schema::dropIfExists('players');
    }
};
