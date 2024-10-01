<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['sec_Section' => 'A', 'sec_Component' => 'cwts', 'f_id' => 1],
            ['sec_Section' => 'B', 'sec_Component' => 'cwts', 'f_id' => 1],
            ['sec_Section' => 'C', 'sec_Component' => 'cwts', 'f_id' => 1],
            ['sec_Section' => 'D', 'sec_Component' => 'cwts', 'f_id' => 1],
            ['sec_Section' => 'E', 'sec_Component' => 'cwts', 'f_id' => 1],
            ['sec_Section' => 'F', 'sec_Component' => 'lts', 'f_id' => 1],
            ['sec_Section' => 'G', 'sec_Component' => 'lts', 'f_id' => 1],
            ['sec_Section' => 'H', 'sec_Component' => 'lts', 'f_id' => 1],
            ['sec_Section' => 'I', 'sec_Component' => 'rotc', 'f_id' => 1],
            ['sec_Section' => 'J', 'sec_Component' => 'rotc', 'f_id' => 1],
        ];
    foreach ($data as $instance){
        Section::create($instance);
    }
    }
}
