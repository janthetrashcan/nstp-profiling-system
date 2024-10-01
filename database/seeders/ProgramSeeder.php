<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                ['program_Code' => 'BSBME', 'program_Title' => 'Bachelor of Science in Biomedical Engineering'],
                ['program_Code' => 'BSCS', 'program_Title' => 'Bachelor of Science in Computer Science'],
                ['program_Code' => 'BSCE', 'program_Title' => 'Bachelor of Science in Civil Engineering'],
                ['program_Code' => 'BSCpE', 'program_Title' => 'Bachelor of Science in Computer Engineering'],
                ['program_Code' => 'BSIT', 'program_Title' => 'Bachelor of Science in Information Technology'],
                ['program_Code' => 'BS NMCA', 'program_Title' => 'Bachelor of Science in New Media and Computer Animation'],
                ['program_Code' => 'BS Bio', 'program_Title' => 'Bachelor of Science in Biology'],
                ['program_Code' => 'BS Math', 'program_Title' => 'Bachelor of Science in Mathematics'],
                ['program_Code' => 'BSEd', 'program_Title' => 'Bachelor of Secondary Education Major in x-x-x-x'],
                ['program_Code' => 'BEEd', 'program_Title' => 'Bachelor of Elementary Education'],
                ['program_Code' => 'BPEd', 'program_Title' => 'Bachelor of Physical Education'],
                ['program_Code' => 'BECEd', 'program_Title' => 'Bachelor of Early Childhood Education'],
                ['program_Code' => 'BSN', 'program_Title' => 'Bachelor of Science in Nursing'],
                ['program_Code' => 'BA Econ', 'program_Title' => 'Bachelor of Arts in Economics'],
                ['program_Code' => 'BA ELS', 'program_Title' => 'Bachelor of Arts in English Language Studies'],
                ['program_Code' => 'BA InDis', 'program_Title' => 'Bachelor of Arts in Interdisciplinary Studies'],
                ['program_Code' => 'BA Philo', 'program_Title' => 'Bachelor of Arts in Philosophy'],
                ['program_Code' => 'BA Ints', 'program_Title' => 'Bachelor of Arts in International Studies'],
                ['program_Code' => 'BA Comm', 'program_Title' => 'Bachelor of Arts in Communication'],
                ['program_Code' => 'BS Psych', 'program_Title' => 'Bachelor of Science in Psychology'],
                ['program_Code' => 'BSAc', 'program_Title' => 'Bachelor of Science in Accountancy'],
                ['program_Code' => 'BSMA', 'program_Title' => 'Bachelor of Science in Management Accounting'],
                ['program_Code' => 'BSBA', 'program_Title' => 'Bachelor of Science in Business Administration'],
                ['program_Code' => 'BSLM', 'program_Title' => 'Bachelor of Science in Legal Management'],
                ['program_Code' => 'BSOA', 'program_Title' => 'Bachelor of Science in Office Administration'],
                ['program_Code' => 'BSAIS', 'program_Title' => 'Bachelor of Science in Accounting Information System'],
                ['program_Code' => 'BSIA', 'program_Title' => 'Bachelor of Science in Internal Auditing'],
                ['program_Code' => 'AEET', 'program_Title' => 'Associate in Electronics Engineering Technology'],
        ];
        foreach ($data as $programInstance){
            Program::create($programInstance);
        }
    }
}
