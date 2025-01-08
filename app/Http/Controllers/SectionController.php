<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('dashboard.sections.sections', compact('sections'));
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
        try{
            $data = $request->validate([
                'sec_Section' => 'required|string|max:255',
                'sec_Capacity' => 'nullable|integer',
            ]);
        }
        catch(\Exception $e){
            return redirect()->route('sections.index')->with('error', 'ERROR: Could not add section. Please try again.');
        }

        Section::create($data);
        return redirect()->route('sections.index')->with('success', 'Section successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $section = Section::where('sec_id', $request['sec_id'])->first();

        // Validate input
        try{
            $validated = $request->validate([
                'sec_Section' => 'required|string|max:255',
                'sec_Capacity' => 'required|integer',
            ]);
        }
        catch(\Exception $e){
            return redirect()->route('sections.index')->with('error', 'ERROR: Could not update selected section. Please try again.'.'\n'.$e);
        }

        if (!$section) {
            return redirect()->route('sections.index')->with('error', 'ERROR: Section not found');
        }

        $section->sec_Section = $validated['sec_Section'];
        $section->sec_Capacity = $validated['sec_Capacity'];

        try{
            $section->save();
        }
        catch(\Exception $e){
            return redirect()->route('sections.index')->with('error', 'ERROR: Could not update selected section. Please try again.'.'\n'.$e);
        }

        return redirect()->route('sections.index')->with('success', 'Section successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        try{
            $section->delete();
        }
        catch(\Exception $e){
            return redirect()->route('sections.index')->with('error', 'ERROR: Could not remove selected section. Please try again.');
        }
        return redirect()->route('sections.index')->with('success', 'Section successfully removed.');
    }
}
