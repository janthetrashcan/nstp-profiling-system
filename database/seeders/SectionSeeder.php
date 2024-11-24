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
            ['sec_Section' => 'A', 'f_id' => 1, 'component_id' => 1],
            ['sec_Section' => 'B', 'f_id' => 1, 'component_id' => 1],
            ['sec_Section' => 'C', 'f_id' => 1, 'component_id' => 1],
            ['sec_Section' => 'D', 'f_id' => 1, 'component_id' => 1],
            ['sec_Section' => 'E', 'f_id' => 1, 'component_id' => 1],
            ['sec_Section' => 'F', 'f_id' => 1, 'component_id' => 1],
            ['sec_Section' => 'G', 'f_id' => 1, 'component_id' => 2],
            ['sec_Section' => 'H', 'f_id' => 1, 'component_id' => 2],
            ['sec_Section' => 'I', 'f_id' => 1, 'component_id' => 2],
            ['sec_Section' => 'J', 'f_id' => 1, 'component_id' => 2],
            ['sec_Section' => 'A', 'f_id' => 1, 'component_id' => 3],
        ];
    foreach ($data as $instance){
        Section::create($instance);
    }
    }
}
