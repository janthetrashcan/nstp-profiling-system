<?php

namespace Database\Seeders;

use App\Models\Formator;
use App\Models\User;
use App\Models\Student;
use App\Models\Section;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        error_log('Fetching users...');
        $users = DB::table('users')->get();
        error_log('Users fetched');

        if($users->isEmpty()){
            error_log('Condition reached');
            User::factory(1)->create();
            error_log('User created');
        }
        else{
            error_log('1 found');
        }

        $this->call(ComponentSeeder::class);
        error_log('Components seeded');

        $this->call(ProgramSeeder::class);
        error_log('Programs seeded');

        Formator::factory(2)->create();
        error_log('Formators added');

        $this->call(SectionSeeder::class);
        Student::factory(50)->create();
    }
}
