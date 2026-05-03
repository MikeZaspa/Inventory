<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('chords')) {
            Schema::create('chords', function (Blueprint $table) {
                $table->id();
                $table->string('size', 120);
                $table->string('chord', 120);
                $table->unsignedInteger('quantity')->default(1);
                $table->timestamps();
            });
        } elseif (! Schema::hasColumn('chords', 'quantity')) {
            Schema::table('chords', function (Blueprint $table) {
                $table->unsignedInteger('quantity')->default(1)->after('chord');
            });
        }

        if (! Schema::hasTable('garters')) {
            Schema::create('garters', function (Blueprint $table) {
                $table->id();
                $table->string('garter', 120);
                $table->string('black_edge', 120);
                $table->unsignedInteger('quantity')->default(1);
                $table->timestamps();
            });
        } elseif (! Schema::hasColumn('garters', 'quantity')) {
            Schema::table('garters', function (Blueprint $table) {
                $table->unsignedInteger('quantity')->default(1)->after('black_edge');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('chords') && Schema::hasColumn('chords', 'quantity')) {
            Schema::table('chords', function (Blueprint $table) {
                $table->dropColumn('quantity');
            });
        }

        if (Schema::hasTable('garters') && Schema::hasColumn('garters', 'quantity')) {
            Schema::table('garters', function (Blueprint $table) {
                $table->dropColumn('quantity');
            });
        }
    }
};
