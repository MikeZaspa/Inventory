<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's default admin user.
     */
    public function run(): void
    {
        $password = (string) env('ADMIN_PASSWORD', 'combat123@');

        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'michellenepangue55@gmail.com')],
            [
                'name' => env('ADMIN_NAME', 'Admin'),
                'password' => Hash::isHashed($password) ? $password : Hash::make($password),
            ]
        );
    }
}
