<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('league_standings', function (Blueprint $table) {
            $table->dropColumn(['form', 'next_match']);
        });
    }

    public function down(): void
    {
        Schema::table('league_standings', function (Blueprint $table) {
            $table->string('form', 10)->nullable();
            $table->string('next_match')->nullable();
        });
    }
};
