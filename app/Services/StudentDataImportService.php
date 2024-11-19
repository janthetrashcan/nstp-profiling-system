<?php

namespace App\Services;

use App\Imports\RegistrarDataImport;
use App\Imports\GoogleFormsImport;
use App\Models\Student;
use Exception;
use Maatwebsite\Excel\Facades\Excel;


class StudentDataImportService
{
    public function importData($registrarFile, $googleFormsFile)
    {
        // import files thru Excel::import
        $registrarImport = new RegistrarDataImport();
        $googleFormsImport = new GoogleFormsImport();

        try{
            Excel::import($registrarImport, $registrarFile);
            Excel::import($googleFormsImport, $googleFormsFile);
        }
        catch(Exception $e){
            dd($e);
        }


        // convert imports to collections
        $registrarData = collect($registrarImport->getData());
        $googleFormsData = collect($googleFormsImport->getData());

        // dd($registrarData, $googleFormsData);

        // process each record from registrar data
        try{
        $registrarData->each(function ($registrarRecord) use ($googleFormsData){
            // match s_StudentNo of registrardata with googleformsdata
            $googleFormsRecord = $googleFormsData->firstWhere('s_StudentNo', $registrarRecord['s_StudentNo']);

            // merge registrardata and googleformsdata
            if($googleFormsRecord){
                Student::updateOrCreate(
                    ['s_StudentNo' => $registrarRecord['s_StudentNo']],
                    array_merge($registrarRecord, $googleFormsRecord)
                );
            }
        });
        }
        catch(Exception $e){
            dd($e);
        }

    }
}
