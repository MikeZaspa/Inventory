<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('garters', function (Blueprint $table) {
            $table->id();
            $table->string('garter', 120);
            $table->string('black_edge', 120);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('garters');
    }
};
