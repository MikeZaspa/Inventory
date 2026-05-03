<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('garters')) {
            Schema::create('garters', function (Blueprint $table) {
                $table->id();
                $table->string('garter', 120);
                $table->string('black_edge', 120);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('garters') && ! Schema::hasColumn('garters', 'black_edge')) {
            Schema::table('garters', function (Blueprint $table) {
                $table->string('black_edge', 120)->after('garter');
            });
        }
    }
};
