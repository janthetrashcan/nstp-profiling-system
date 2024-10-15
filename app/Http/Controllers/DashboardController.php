<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Formator;
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

    public function showStudentProfile(string $s_id){
        // dd($student);
        $student = Student::where('s_id', $s_id)->first();
        if($student === null){
            abort(404);
        }

        return view('dashboard.studentprofile', ['student' => $student]);
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
