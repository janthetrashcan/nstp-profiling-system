<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Student;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('dashboard.programs.programs', compact('programs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'program_Code' => 'required',
            'program_Title' => 'required',
        ]);

        Program::create($data);
        return redirect()->route('programs.index')->with('success', 'Program successfully added.');
    }

    public function update(Request $request)
    {
        $program = Program::find($request['program_id'])->first();

        // Validate input
        $validated = $request->validate([
            'program_Code' => 'required|string|max:255',
            'program_Title' => 'required|string|max:255',
        ]);

        if (!$program) {
            return redirect()->route('programs.index')->with('error', 'ERROR: Program not found');
        }

        $program->program_Code = $validated['program_Code'];
        $program->program_Title = $validated['program_Title'];

        try{
            $program->save();
        }
        catch(\Exception $e){
            return redirect()->route('programs.index')->with('error', 'ERROR: Could not update selected program. Please try again.');
        }

        return redirect()->route('programs.index')->with('success', 'Program successfully updated.');
    }

    public function destroy(Program $program)
    {
        try{
            $program->delete();
        }
        catch(\Exception $e){
            return redirect()->route('programs.index')->with('error', 'ERROR: Could not remove selected program. Please try again.');
        }
        return redirect()->route('programs.index')->with('success', 'Program successfully removed.');
    }

    public function show(Program $program)
    {
        $students = Student::where('program_id', $program->id)->get();
        $studentCount = $students->count();

        return view('dashboard.programs.show', compact('program', 'studentCount'));
    }

    public function edit(Program $program)
    {

    }
}
