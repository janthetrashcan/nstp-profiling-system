<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Section;
use App\Models\Program;
use App\Models\Batch;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class RegistrarDataImport implements ToModel, WithHeadingRow
{
    protected $data = [];

    // first, store data in memory
    public function model(array $row)
    {
        $normalizedRow = $this->normalizeHeaders($row);

        try{
            if(isset($normalizedRow['student_id_no']) && $normalizedRow['subject'] === 'NSTP'){
                $section = Section::query()->where('sec_Section', '=', $normalizedRow['section'])->first();
                $program = Program::query()->where('program_Code', '=', $normalizedRow['program'])->first();
                $batch = Batch::query()->where('batch', '=', $normalizedRow['school_year'])->first();

                $this->data[] = [
                    's_StudentNo' => $normalizedRow['student_id_no'],
                    's_Surname' => $normalizedRow['last_name'],
                    's_FirstName' => $normalizedRow['first_name'],
                    's_MiddleName' => $normalizedRow['middle_name'],
                    's_Suffix' => $normalizedRow['suffix'],
                    's_FullName' => $normalizedRow['last_name'].' '.$normalizedRow['first_name'].' '.$normalizedRow['middle_name'],

                    's_c_HouseNo' => $normalizedRow['house_no'],
                    's_c_Street' => $normalizedRow['street'],
                    's_c_Barangay' => $normalizedRow['barangay'],
                    's_c_City' => $normalizedRow['city'],

                    's_Sex' => $normalizedRow['sex'],
                    's_Birthdate' => $normalizedRow['birthdate'],

                    's_ContactNo' => $normalizedRow['contact_no'],
                    's_FinalGrade' => $normalizedRow['final_grade'],

                    'program_id' => $program->program_id,
                    'sec_id' => $section->sec_id,
                    'batch_id' => $batch->id,
                ];
            }
        }

        catch(\Exception $e){
            redirect()->back()->with('error', 'Error in importing registrar file: '.$e);
        }

        return null;
    }

    private function normalizeHeaders(array $row): array
    {
        // Define a mapping of regex patterns to normalized header names
        $headerMapping = [
            '/^ID NO|^ID_NO$/i' => 'student_id_no',
            '/^L_NAME$|^last_name$|^surname$/i' => 'last_name',
            '/^F_NAME$|^first_name$|^given_name$/i' => 'first_name',
            '/^M_NAME$|^middle_name$/i' => 'middle_name',
            '/^SUFFIX$/i' => 'suffix',
            '/^HOUSE NO|^HOUSE_NO$/i' => 'house_no',
            '/^STREET$/i' => 'street',
            '/^BRGY$|^barangay$/i' => 'barangay',
            '/^CITY$/i' => 'city',
            '/^SEX$/i' => 'sex',
            '/^BDAY$|^birthdate$|^birthday$/i' => 'birthdate',
            '/^CONTACT NO$|^contact_no$/i' => 'contact_no',
            '/^FINAL GRADE$|^final_grade$/i' => 'final_grade',
            '/^SECTION$/i' => 'section',
            '/^COURSE$|^program$/i' => 'program',
            '/^SUBJECT$|^subject$/i' => 'subject',
            '/^SY$|^School Year|^school_year$/i' => 'school_year',
        ];

        // Normalize the row keys based on the mapping
        foreach ($headerMapping as $pattern => $newHeader) {
            foreach ($row as $key => $value) {
                if (preg_match($pattern, trim($key))) {
                    unset($row[$key]);
                    $row[$newHeader] = $value;
                }
            }
        }

        return $row;
    }

    public function getData()
    {
        return $this->data;
    }
}
