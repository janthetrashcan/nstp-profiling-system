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
            `user_id` => 1,
            'u_Email' => 'test@example.com',
            'u_Surname' => 'test',
            'u_FirstName' => 'test',
            'u_MiddleName' => 'test',
            'u_Password' => bcrypt('password123!')
        ]);
    }
}
