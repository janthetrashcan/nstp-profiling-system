<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\Component;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ExportData implements WithMultipleSheets
{
    use Exportable;

    protected $filteredStudents;
    protected $filteredFormators;

    public function __construct(Collection $filteredStudents, Collection $filteredFormators){
        $this->filteredStudents = $filteredStudents;
        $this->filteredFormators = $filteredFormators;
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
        // dd($this->filteredStudents);

        // Create a sheet for each component
        foreach ($components as $component) {
            $sheets[] = new StudentSheet($component, $this->filteredStudents);
        }

        $sheets[] = new FormatorSheet($this->filteredFormators);

        return $sheets;
    }
}
