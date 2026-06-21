<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'demo@favoritos.com'],
            [
                'name'     => 'Usuario Demo',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]
        );
    }
}
