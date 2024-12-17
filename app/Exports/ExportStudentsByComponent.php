<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\Component;
use App\Models\Student;

class ExportStudentsByComponent implements WithMultipleSheets
{
    use Exportable;

    /**
     * Return an array of sheets
     *
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        // Get all components
        $components = Component::all();

        // Create a sheet for each component
        foreach ($components as $component) {
            $sheets[] = new StudentSheet($component);
        }

        return $sheets;
    }
}
