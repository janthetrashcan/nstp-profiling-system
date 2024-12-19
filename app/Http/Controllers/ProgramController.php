<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('dashboard.programs.programs', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_Code' => 'required',
            'program_Title' => 'required',
        ]);

        Program::create($request->all());
        return redirect()->route('programs.index');
    }

    public function update(Request $request)
    {
        // Find the program by program_Code
        $program = Program::find($request['program_id'])->first();

        // Validate input
        $validated = $request->validate([
            'program_Code' => 'required|string|max:255',
            'program_Title' => 'required|string|max:255',
        ]);

        if (!$program) {
            return response()->json(['message' => 'Program not found'], 404);
        }

        // Update program attributes
        $program->program_Code = $validated['program_Code'];
        $program->program_Title = $validated['program_Title'];

        try{
            $program->save();
        }
        catch(\Exception $e){
            return response()->json(['message' => 'Failed to update program'], 404);
        }

        return response()->json(['message' => 'Program updated successfully'], 200);
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('programs.index');
    }
}
