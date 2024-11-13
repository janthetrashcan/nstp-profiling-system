<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Section;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportStudent;
use App\Exports\ExportStudent;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addStudent()
    {


          $programs = Program::all();
          $sections = Section::all();

          return view('dashboard.studentadd', compact('programs', 'sections'));
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
                's_p_HouseNo' => 'required|string|max:255',
                's_p_Street' => 'required|string|max:255',
                's_p_Barangay' => 'required|string|max:255',
                's_p_City' => 'required|string|max:255',
                's_p_Province' => 'required|string|max:255',

                // 's_c_HouseNo' => 'required|string|max:255',
                // 's_c_Street' => 'required|string|max:255',
                // 's_c_Barangay' => 'required|string|max:255',
                // 's_c_City' => 'required|string|max:255',
                // 's_c_Province' => 'required|string|max:255',

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

            // dd($data);
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

        $student = Student::where('s_id', $s_id)->first();
        if($student === null){
            abort(404);
        }
        return view('dashboard.studentedit', compact('student','programs','sections'));
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
            's_Sex' => 'required|string|in:male,female',
            's_Birthdate' => 'required|date',
            's_ContactNo' => 'required|string|max:15',
            's_EmailAddress' => 'required|email|max:255',
            'program_id' => 'required|exists:programs,program_id',
            'sec_id' => 'required|integer|exists:sections,sec_id',
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
        dd($e->errors());
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

public function importView(Request $request){
    return view('dashboard.studentimport');
}

public function importStudents(Request $request){



    //Excel::import(new ImportStudent, $request->file('file')->store('files'));
    //return redirect()->back();
}

}

