<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['batch' => '2024-2025'],
            ['batch' => '2025-2026'],
            ['batch' => '2026-2027'],
            ['batch' => '2027-2028'],
            ['batch' => '2028-2029'],
            ['batch' => '2029-2030'],
        ];
        foreach ($data as $batchInstance){
            Batch::create($batchInstance);
        }
    }
}
