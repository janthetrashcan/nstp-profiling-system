<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Formator;
use App\Models\Section;

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
        $students = Student::query()->orderBy('s_id', 'desc')->paginate(15);
        // dd($students);

        return view('dashboard.studentlist', ['students' => $students]);
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
