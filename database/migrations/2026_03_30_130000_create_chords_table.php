<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chords', function (Blueprint $table) {
            $table->id();
            $table->string('size', 120);
            $table->string('chord', 120);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chords');
    }
};
