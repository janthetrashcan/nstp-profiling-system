<?php

namespace Database\Seeders;

use App\Models\Formator;
use App\Models\User;
use App\Models\Student;
use App\Models\Section;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        $this->call(ProgramSeeder::class);
        Formator::factory(10)->create();
        $this->call(SectionSeeder::class);
        Student::factory(50)->create();
    }
}
