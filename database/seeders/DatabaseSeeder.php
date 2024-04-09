<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'phone' => 'admin',
            'role' => '1',
            'password' => 'admin',
        ]);

        User::factory()->create([
            'phone' => 'test',
            'role' => '0',
            'password' => 'test',
        ]);
    }
}
