<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Program; 
use App\Models\Section; 

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
    $validatedData = $request->validate([
        's_StudentNo' => 'required|string|max:255',
        's_Surname' => 'required|string|max:255',
        's_FirstName' => 'required|string|max:255',
        's_MiddleName' => 'nullable|string|max:255',
        's_Sex' => 'required|string|in:male,female',
        's_Birthdate' => 'required|date',
        's_ContactNo' => 'required|string|max:15', 
        's_EmailAddress' => 'required|email|max:255',
        'program_id' => 'required|exists:programs,program_id',
        'sec_id' => 'required|exists:sections,sec_id',
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

    Student::create($validatedData);
    return redirect()->route('dashboard.studentlist')->with('success', 'Student added successfully.');
}



    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('dashboard.studentedit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            's_StudentNo' => 'required|string|max:255',
            's_Surname' => 'required|string|max:255',
            's_FirstName' => 'required|string|max:255',
            's_MiddleName' => 'nullable|string|max:255',
            'program_id' => 'required|exists:programs,id',
            'sec_id' => 'required|exists:sections,id',
        ]);

        $student->update($request->all());
        return redirect()->route('dashboard.studentlist')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('dashboard.studentlist')->with('success', 'Student deleted successfully.');
    }
}
