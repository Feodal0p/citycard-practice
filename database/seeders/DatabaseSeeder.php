<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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

        DB::table('cards')->insert([
            'number' => '12345-12345-0',
            'type' => 'Звичайний',
            'balance' => 238,
            'user_id' => 2,
        ]);
        
        DB::table('cities')->insert([
            'name' => 'Луцьк',
            'region' => 'Волинська',
        ]);

        DB::table('tickets')->insert([
            'type' => 'Звичайний',
            'transport_type' => 'Автобус',
            'price' => 14,
            'city_id' => 1,
        ]);

        DB::table('tickets')->insert([
            'type' => 'Звичайний',
            'transport_type' => 'Тролейбус',
            'price' => 8,
            'city_id' => 1,
        ]);

        DB::table('transports')->insert([
            'transport_type' => 'Автобус',
            'route_number' => '28',
            'route_description' => 'вул. Дружби Народів - вул. Карбишева',
            'city_id' => 1,
        ]);

        DB::table('transports')->insert([
            'transport_type' => 'Тролейбус',
            'route_number' => '4a',
            'route_description' => 'селище Вересневе - Залізничний вокзал',
            'city_id' => 1,
        ]);

        DB::table('transaction_histories')->insert([
            'type' => 0,
            'amount' => 250,
            'created_at' => date("Y-m-d H:i:s"),
            'card_id' => 1,
        ]);

        DB::table('transaction_histories')->insert([
            'type' => 1,
            'amount' => 8,
            'created_at' => date("Y-m-d H:i:s"),
            'card_id' => 1,
            'ticket_id' => 2,
        ]);

        DB::table('transaction_histories')->insert([
            'type' => 1,
            'amount' => 14,
            'created_at' => date("Y-m-d H:i:s"),
            'card_id' => 1,
            'ticket_id' => 1,
        ]);
    }
}
