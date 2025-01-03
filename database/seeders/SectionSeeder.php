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
            ['sec_Section' => 'A', 'component_id' => 1],
            ['sec_Section' => 'B', 'component_id' => 1],
            ['sec_Section' => 'C', 'component_id' => 1],
            ['sec_Section' => 'D', 'component_id' => 1],
            ['sec_Section' => 'E', 'component_id' => 1],
            ['sec_Section' => 'F', 'component_id' => 1],
            ['sec_Section' => 'G', 'component_id' => 1],
            ['sec_Section' => 'H', 'component_id' => 1],
            ['sec_Section' => 'I', 'component_id' => 1],
            ['sec_Section' => 'J', 'component_id' => 1],
            ['sec_Section' => 'K', 'component_id' => 1],
            ['sec_Section' => 'L', 'component_id' => 1],
            ['sec_Section' => 'M', 'component_id' => 1],
            ['sec_Section' => 'N', 'component_id' => 1],
            ['sec_Section' => 'O', 'component_id' => 1],
            ['sec_Section' => 'P', 'component_id' => 1],
            ['sec_Section' => 'Q', 'component_id' => 1],
            ['sec_Section' => 'R', 'component_id' => 1],
            ['sec_Section' => 'S', 'component_id' => 1],
            ['sec_Section' => 'T', 'component_id' => 1],
            ['sec_Section' => 'U', 'component_id' => 1],
            ['sec_Section' => 'V', 'component_id' => 1],
            ['sec_Section' => 'W', 'component_id' => 1],
            ['sec_Section' => 'X', 'component_id' => 1],
            ['sec_Section' => 'Y', 'component_id' => 1],
            ['sec_Section' => 'Z', 'component_id' => 1],
            ['sec_Section' => 'A - ROTC', 'component_id' => 3],
            ['sec_Section' => 'B - ROTC', 'component_id' => 3],
            ['sec_Section' => 'C - ROTC', 'component_id' => 3],
            ['sec_Section' => 'D - ROTC', 'component_id' => 3],
        ];
    foreach ($data as $instance){
        Section::create($instance);
    }
    }
}
