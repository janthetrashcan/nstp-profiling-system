<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportStudents;
use App\Exports\ExportData;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use App\Models\Program;
use App\Models\Section;
use App\Models\Component;
use App\Models\Batch;
use App\Models\Formator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportDataPage(Request $request){
        $sections = Section::all();
        $programs = Program::all();
        $components = Component::all();
        $batches = Batch::all();

        return view('dashboard.dataexport', compact('sections','programs', 'components', 'batches'));
    }

    public function exportData(Request $request){
        $secID = $request->input('section-filter') ?? 'all';
        $componentID = $request->input('component-filter') ?? 'all';
        $programID = $request->input('program-filter') ?? 'all';
        $batchID = $request->input('batch-filter') ?? 'all';

        // fetch students
        $studentQuery = Student::select('s_StudentNo','s_Surname','s_FirstName','s_MiddleName','program_id','s_Sex','s_Birthdate','s_c_CompleteAddress','s_p_CompleteAddress','s_ContactNo','s_EmailAddress','sec_id','component_id','s_FinalGrade','s_ContactPersonName', 's_ContactPersonNo', 'batch_id')
        ->orderBy('s_Surname', 'asc')
        ->orderBy('component_id', 'asc')
        ->orderBy('sec_id', 'asc')
        ->orderBy('program_id', 'asc');

        // filter students based on selected fields
        if($batchID !== 'all'){
            $studentQuery->where('batch_id', $batchID);
        }
        if($secID !== 'all'){
            $studentQuery->where('sec_id', $secID);
        }
        if($componentID !== 'all'){
            $studentQuery->where('component_id', $componentID);
        }
        if($programID !== 'all'){
            $studentQuery->where('program_id', $programID);
        }
        if(!$request->input('include-failed')){
            $studentQuery->where('s_FinalGrade','<>','F');
        }

        // set values
        $filteredStudents = $studentQuery->with('program','section','component','batch')->get()->map(function ($student){
            return[
                's_StudentNo' => $student->s_StudentNo,
                's_Surname' => $student->s_Surname,
                's_FirstName' => $student->s_FirstName,
                's_MiddleName' => $student->s_MiddleName,
                'program_id' => $student->program->program_Code,
                's_Sex' => $student->s_Sex,
                's_Birthdate' => $student->s_Birthdate,
                's_c_CompleteAddress' => $student->s_c_CompleteAddress,
                's_p_CompleteAddress' => $student->s_p_CompleteAddress,
                's_ContactNo' => $student->s_ContactNo,
                's_EmailAddress' => $student->s_EmailAddress,
                'sec_id' => $student->section->sec_Section,
                'component_id' => $student->component->component_Name,
                's_FinalGrade' => $student->s_FinalGrade,
                's_ContactPersonName' => $student->s_ContactPersonName,
                's_ContactPersonNo' => $student->s_ContactPersonNo,
                'batch_id' => $student->batch->batch,
            ];
        });

        // if(empty($filteredStudents->toArray())){
        //     return redirect()->back()->with('warning', 'No students found.');
        // }

        $formatorQuery = Formator::
            select(
                'f_id',
                'f_FullName',
                'f_Birthdate',
                'f_TeachingYearStart',
                'f_NSTPTeachingYearStart',
                'f_TeachingUnitCount',
                'component_id',
                'f_Trainings',
                'f_EmploymentStatus',
                'f_ContactNo',
                'f_EmailAddress'
            );

        if(isset($request['active-formators'])){
            $formatorQuery->where('f_ActiveTeaching', 'active');
        }

        $filteredFormators = $formatorQuery->with('component')->get()->map(function ($formator){
            return[
                'f_id' => $formator->f_id,
                'f_FullName' => $formator->f_FullName,
                'f_Age' => $formator->age('f_Birthdate'),
                'f_TeachingYears' => $formator->calculateYears('f_TeachingYearStart'),
                'f_NSTPTeachingYears' => $formator->calculateYears('f_NSTPTeachingYearStart'),
                'f_TeachingUnitCount' => $formator->f_TeachingUnitCount,
                'f_Component' => $formator->component->component_Name,
                'f_Trainings' => $formator->f_Trainings,
                'f_EmploymentStatus' => $formator->f_EmploymentStatus,
                'f_Contact' => $formator->f_ContactNumber.' '.$formator->f_EmailAddress,
            ];
        });


        if(!$request->has('multisheet-export')){
            return Excel::download(new ExportStudents($filteredStudents), 'students.xlsx');
        }
        else if ($request->has('multisheet-export')){
            return Excel::download(new ExportData($filteredStudents, $filteredFormators), 'data.xlsx');
        }
    }
}
