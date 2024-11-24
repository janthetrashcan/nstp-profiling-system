<?php

namespace App\Http\Controllers;

use App\Exports\ExportStudents;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Program;
use App\Models\Section;
use App\Models\Component;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Existing code for dropdown options
        $programs = Program::all();
        $components = Section::distinct()->pluck('sec_Component');
        $sections = Section::all();
    
        $query = Student::query();
    
        // Existing filters
        if ($request->filled('program')) {
            $query->where('program_id', $request->input('program'));
        }
    
        if ($request->filled('component')) {
            $query->whereHas('section', function ($q) use ($request) {
                $q->where('sec_Component', $request->input('component'));
            });
        }
    
        if ($request->filled('section')) {
            $query->where('sec_id', $request->input('section'));
        }
    
        // New filters for passed, failed, and grades
        if ($request->filled('status')) {
            if ($request->input('status') === 'passed') {
                $query->whereIn('s_FinalGrade', [1, 1.5, 2, 2.5, 3, 3.5, 4]);
            } elseif ($request->input('status') === 'failed') {
                $query->where('s_FinalGrade', 'F');
            }
        }
    
        if ($request->filled('grade')) {
            $query->where('s_FinalGrade', $request->input('grade'));
        }
    
        $students = $query->paginate(15);
    
        // Prepare grades for dropdown
        $grades = [1, 1.5, 2, 2.5, 3, 3.5, 4];
    
        return view('dashboard.studentlist', compact('students', 'programs', 'components', 'sections', 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addStudent()
    {


          $programs = Program::all();
          $sections = Section::all();
          $components = Component::all();

          return view('dashboard.studentadd', compact('programs', 'sections', 'components'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Log::info('Store method called');

            // Prepare the validation rules
            $rules = [
                's_StudentNo' => 'required|string|size:6',
                's_Surname' => 'required|string|max:255',
                's_FirstName' => 'required|string|max:255',
                's_MiddleName' => 'nullable|string|max:255',
                's_Sex' => 'required|string|in:male,female',
                's_Birthdate' => 'required|date',
                's_ContactNo' => 'required|string|max:15',
                's_EmailAddress' => 'required|email|max:255',
                'program_id' => 'required|exists:programs,program_id',
                'sec_id' => 'required|integer|exists:sections,sec_id',
                'component_id' => 'required|integer|exists:components,component_id',
                's_p_HouseNo' => 'required|string|max:255',
                's_p_Street' => 'required|string|max:255',
                's_p_Barangay' => 'required|string|max:255',
                's_p_City' => 'required|string|max:255',
                's_p_Province' => 'required|string|max:255',

                's_ContactPersonName' => 'required|string|max:255',
                's_ContactPersonNo' => 'required|string|max:15',
            ];

            // If 'sameAsProvincial' is not checked, add city address validation rules
            if (!$request->has('sameAsProvincial')) {
                $rules = array_merge($rules, [
                    's_c_HouseNo' => 'required|string|max:255',
                    's_c_Street' => 'required|string|max:255',
                    's_c_Barangay' => 'required|string|max:255',
                    's_c_City' => 'required|string|max:255',
                    's_c_Province' => 'required|string|max:255'
                ]);
            }

            $data = $request->validate($rules);

            if($request->has('sameAsProvincial')){
                $data = array_merge($data, [
                    's_c_HouseNo' => $data['s_p_HouseNo'],
                    's_c_Street' => $data['s_p_Street'],
                    's_c_Barangay' => $data['s_p_Barangay'],
                    's_c_City' => $data['s_p_City'],
                    's_c_Province' => $data['s_p_Province']
                ]);
            }

            $data['s_c_CompleteAddress'] = $data['s_c_HouseNo'].', '.$data['s_c_Street'].', '.$data['s_c_Barangay'].', '.$data['s_c_City'].', '.$data['s_c_Province'];
            $data['s_p_CompleteAddress'] = $data['s_p_HouseNo'].', '.$data['s_p_Street'].', '.$data['s_p_Barangay'].', '.$data['s_p_City'].', '.$data['s_p_Province'];

            Log::info('Validation passed');
            $student = Student::create($data);
            Log::info('Student created with ID: ' . $student->s_id);

            return redirect()->route('dashboard.studentlist')->with('success', 'Student added successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in StudentController@store: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the student. Please try again.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return 'show';
    }

    public function editStudent(string $s_id)
    {
        $programs = Program::all();
        $sections = Section::all();
        $components = Component::all();

        $student = Student::where('s_id', $s_id)->first();
        if($student === null){
            abort(404);
        }
        return view('dashboard.studentedit', compact('student','programs', 'sections', 'components'));
    }

    public function updateStudent(Request $request, string $s_id)
    {

    $student = Student::where('s_id', $s_id)->first();
    if ($student === null) {
        abort(404);
    }

    try {
        $data = $request->validate([
            's_StudentNo' => 'required|string|size:6',
            's_Surname' => 'required|string|max:255',
            's_FirstName' => 'required|string|max:255',
            's_MiddleName' => 'nullable|string|max:255',
            's_Suffix' => 'nullable|string|max:255|/^(I{1,3}|II{1,3}|III{1,3}|IV|V?I{0,3}|VI{0,3}|VII{0,3}|VIII|IX|X)$|Jr\.$/',
            's_Sex' => 'required|string|in:male,female',
            's_Birthdate' => 'required|date',
            's_ContactNo' => 'required|string|max:15',
            's_EmailAddress' => 'required|email|max:255',
            'program_id' => 'required|exists:programs,program_id',
            'sec_id' => 'required|integer|exists:sections,sec_id',
            'component_id' => 'required|integer|exists:component,component_id',
            's_c_HouseNo' => 'required|string|max:255',
            's_c_Street' => 'required|string|max:255',
            's_c_Barangay' => 'required|string|max:255',
            's_c_City' => 'required|string|max:255',
            's_c_Province' => 'required|string|max:255',
            's_p_HouseNo' => 'required|string|max:255',
            's_p_Street' => 'required|string|max:255',
            's_p_Barangay' => 'required|string|max:255',
            's_p_City' => 'required|string|max:255',
            's_p_Province' => 'required|string|max:255',
            's_ContactPersonName' => 'required|string|max:255',
            's_ContactPersonNo' => 'required|string|max:15',
        ]);
        $student->update($data);

        return redirect()->route('dashboard.studentlist')->with('success', 'Student updated successfully.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->route('dashboard.studentlist')->with('error', 'Error in updating student');
    }
}

public function destroy(Request $request, $s_id = null)
{
    if ($request->input('student_ids') && !$request->input('confirmed')) {
        $studentIds = $request->input('student_ids');
        $students = Student::whereIn('s_id', $studentIds)->get();
        return view('dashboard.studentdelete', compact('students', 'studentIds'));
    }

    //for multiple students
    if ($request->input('student_ids') && $request->input('confirmed')) {
        $studentIds = $request->input('student_ids');
        Student::whereIn('s_id', $studentIds)->delete();
        return redirect()->route('dashboard.studentlist')->with('success', 'Selected students deleted successfully.');
    }

    //for student profile
    if ($s_id) {
        $student = Student::find($s_id);
        if ($student) {
            $student->delete();
            return redirect()->route('dashboard.studentlist')->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->route('dashboard.studentlist')->with('error', 'Student not found.');
        }
    }

    return redirect()->route('dashboard.studentlist')->with('error', 'No students selected for deletion.');
}

public function searchStudent(Request $request){
    $search = $request->input('search');

    if(is_numeric($search)){
        $results = Student::where('s_StudentNo', 'like', "%$search%")->get();
    }
    else{
        $results = Student::where('s_Surname', 'like', "%$search%")->orWhere('s_FirstName', 'like', "%$search%")->orWhere('s_MiddleName', 'like', "%$search%")->get();
    }

    return view('dashboard.studentsearch', ['results' => $results, 'search' => $search]);
}

public function importStudentsPage(Request $request){
    return view('dashboard.studentimport');
}

public function exportStudentsPage(Request $request){
    $sections = Section::all();
    $programs = Program::all();
    $components = Component::all();

    return view('dashboard.studentexport', compact('sections','programs', 'components'));
}

public function exportStudents(Request $request){
    $secID = $request->input('section-filter') ?? 'all';
    $componentID = $request->input('component-filter') ?? 'all';
    $programID = $request->input('program-filter') ?? 'all';


    // fetch students
    $query = Student::select('s_StudentNo','s_Surname','s_FirstName','s_MiddleName','program_id','s_Sex','s_Birthdate','s_c_CompleteAddress','s_p_CompleteAddress','s_ContactNo','s_EmailAddress','sec_id','s_ContactPersonName', 's_ContactPersonNo')
    ->orderBy('s_Surname', 'asc')->orderBy('program_id', 'asc')->orderBy('sec_id', 'asc');

    // filter students based on selected fields
    if($secID !== 'all'){
        $query->where('sec_id', $secID);
    }
    if($componentID !== 'all'){
        $query->whereHas('section', function($q) use ($componentID){
            $q->where('component_id', $componentID);
        });
    }
    if($programID !== 'all'){
        $query->where('program_id', $programID);
    }

    $filteredStudents = $query->with('program','section')->get()->map(function ($student){
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
            'component' => $student->section->sec_Component,
            's_ContactPersonName' => $student->s_ContactPersonName,
            's_ContactPersonNo' => $student->s_ContactPersonNo,
        ];
    });

    dd($filteredStudents);

    return Excel::download(new ExportStudents($filteredStudents), 'students.xlsx');
}
}

