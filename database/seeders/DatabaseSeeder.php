<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'uuid' => Str::orderedUuid(),
            'first_name' => "Admin", // fake()->name()
            'middle_name' => "Admin", // fake()->name()
            'last_name' => "Admin", // fake()->name()
            'email' => "admin@mail.com", // fake()->unique()->safeEmail()
            'role' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => null // Str::random(10),
        ]);
    }
}
