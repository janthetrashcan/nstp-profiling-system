<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\Component;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ExportStudentsByComponent implements WithMultipleSheets
{
    use Exportable;

    protected $query;

    public function __construct(Collection $query){
        $this->query = $query;
    }

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
        // dd($this->query);

        // Create a sheet for each component
        foreach ($components as $component) {
            $sheets[] = new StudentSheet($component, $this->query);
        }

        return $sheets;
    }
}
