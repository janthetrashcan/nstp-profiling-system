<?php

namespace App\Http\Controllers;

use App\Services\StudentDataImportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentImportController extends Controller
{
    protected $importService;

    public function __construct(StudentDataImportService $importService){
        $this->importService = $importService;
    }

    public function import(Request $request){
        try{$request->validate([
            'registrar_file' => 'required|mimes:xlsx,xls',
            'google_forms_file' => 'required|mimes:xlsx,xls'
        ]);
        }

        catch(\Exception $e){
            return redirect()->back()->with('error','Error importing student data: '.$e->getMessage());
        }


        try{
            DB::beginTransaction();

            $this->importService->importData(
                $request->file('registrar_file'),
                $request->file('google_forms_file')
            );
            DB::commit();

            return redirect()->back()->with('success','Student data imported successfully');

        } catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','Error importing student data: '.$e->getMessage());
        }
    }
}
