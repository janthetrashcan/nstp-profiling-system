<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Formator;
use App\Models\Program;
use App\Models\Section;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showIndex()
    {
        return view('dashboard.index');
    }

    public function showStudentList(Request $request){
        $students = Student::query()->orderBy('s_StudentNo', 'asc')->paginate(10);
        // dd($students);
        return view('dashboard.studentlist', ['students' => $students]);
    }

    public function showFormatorList(Request $request){
        $formators = Formator::query()->orderBy('f_id', 'asc')->paginate(15);
        // dd($students);
        return view('dashboard.formatorlist', ['formators' => $formators, 'search' => ""]);
    }

    public function showStudentProfile(string $s_id){
        // dd($student);
        $student = Student::where('s_id', $s_id)->first();
        if($student === null){
            abort(404);
        }

        return view('dashboard.studentprofile', ['student' => $student]);
    }

    public function showSectionList(Request $request){
        // dd($student);
        $sections = Section::query()->orderBy('sec_id', 'asc')->paginate(10);
        return view('dashboard.sectionlist', ['sections' => $sections]);
}
    public function showProgramList(Request $request){
    // dd($student);
    $programs = Program::query()->orderBy('prog_id', 'asc')->paginate(10);
    return view('dashboard.programlist', ['programs' => $programs]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
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
    public function showProfile($modelType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'edit';
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
}
