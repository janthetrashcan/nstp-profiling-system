<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Collection;

class FormatorSheet implements FromCollection, WithTitle, WithHeadings
{
    protected $query;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(Collection $query)
    {
        $this->query = $query;
    }
    public function collection()
    {
        return $this->query;
    }
    /**
     * Return the sheet title (component name)
     *
     * @return string
     */
    public function title(): string
    {
        return "FORMATORS";
    }

    public function headings(): array
    {
        return [
            'Formator ID',
            'Full Name',
            'Age',
            'No. of Years in Teaching/Academe',
            'No. of Years in Teaching NSTP',
            'Total No. of Teaching Units/Load',
            'Component Taught',
            'Trainings/Seminars',
            'Employment Status',
            'Contact Number and Email Address',
        ];
    }

}
