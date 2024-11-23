<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['component_Name' => 'CWTS'],
            ['component_Name' => 'LTS'],
            ['component_Name' => 'ROTC'],
        ];
    foreach ($data as $componentInstance){
        Component::create($componentInstance);
    }
    }
}
