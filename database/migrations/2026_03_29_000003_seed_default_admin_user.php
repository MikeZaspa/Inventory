<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $email = (string) env('ADMIN_EMAIL', 'michellenepangue55@gmail.com');
        $password = (string) env('ADMIN_PASSWORD', 'combat123@');
        $attributes = [
            'name' => env('ADMIN_NAME', 'Admin'),
            'password' => Hash::isHashed($password) ? $password : Hash::make($password),
            'email_verified_at' => now(),
            'updated_at' => now(),
        ];

        if (DB::table('users')->where('email', $email)->exists()) {
            DB::table('users')->where('email', $email)->update($attributes);

            return;
        }

        DB::table('users')->insert([
            ...$attributes,
            'email' => $email,
            'created_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')
            ->where('email', (string) env('ADMIN_EMAIL', 'michellenepangue55@gmail.com'))
            ->delete();
    }
};
