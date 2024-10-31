<?php 

namespace App\Http\Controllers;

use App\Models\Formator;
use App\Models\Program;    
use App\Models\Section;
use Illuminate\Http\Request;

class FormatorController extends Controller {
    
    
    public function addformator() {
        $sections = Section::all();
        return view('dashboard.addformator', ['sections' => $sections]);
    }

    
    public function showFormatorProfile($id) {
        $formator = Formator::findOrFail($id); 
        return view('dashboard.showformator', compact('formator'));
    }

    
    public function editformator(string $f_id) {
        $programs = Program::all();    
        $sections = Section::all();

        $formator = Formator::where('f_id', $f_id)->first();
        if ($formator === null) {
            abort(404);
        }
        return view('dashboard.formatoredit', compact('formator', 'programs', 'sections'));
    }
    
    public function store(Request $request) {
        try {
            $data = $request->validate([
                'employee_id' => 'required|string',
                'f_Surname' => 'required|string|max:255',
                'f_FirstName' => 'required|string|max:255',
                'f_MiddleName' => 'required|string|max:255',
                'f_Sex' => 'required|string|in:male,female',
                'f_Birthdate' => 'required|date',
                'f_ContactNo' => 'required|string|max:15',
                'f_EmailAddress' => 'required|email|max:255',
                'f_TeachingYearStart' => 'required|string|max:5',
                'f_NSTPTeachingYearStart' => 'required|string|max:5',
                'f_TeachingUnitCount' => 'required|string|max:10',
                'f_Component' => 'required|string|in:cwts,rotc,lts',
                'f_EmploymentStatus' => 'required|string|in:hired,not hired',
                'f_ActiveTeaching' => 'required|string|in:active,inactive',
            ]);

            
            $formator = Formator::create($data);
            
            
            return redirect()->route('dashboard.showformator', ['id' => $formator->id]);
        
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            return redirect()->back()
                ->withErrors($e->validator)   
                ->withInput();                 
        } catch (\Exception $e) {
            
            return redirect()->back()
                ->with('error', 'An unexpected error occurred. Please try again.')
                ->withInput();
        }
    }

    public function updateFormator(Request $request, string $f_id) {

        $formator = Formator::where('f_id', $f_id)->first();
        if ($formator === null) {
            abort(404);
            }
            try {
                $data = $request->validate([
                    'employee_id' => 'required|string',
                    'f_Surname' => 'required|string|max:255',
                    'f_FirstName' => 'required|string|max:255',
                    'f_MiddleName' => 'required|string|max:255',
                    'f_Sex' => 'required|string|in:male,female',
                    'f_Birthdate' => 'required|date',
                    'f_ContactNo' => 'required|string|max:15',
                    'f_EmailAddress' => 'required|email|max:255',
                    'f_TeachingYearStart' => 'required|string|max:5',
                    'f_NSTPTeachingYearStart' => 'required|string|max:5',
                    'f_TeachingUnitCount' => 'required|string|max:10',
                    'f_Component' => 'required|string|in:cwts,rotc,lts',
                    'f_EmploymentStatus' => 'required|string|in:hired,not hired',
                    'f_ActiveTeaching' => 'required|string|in:active,inactive',
                ]);
                $formator->update($data);

                return redirect()->route('dashboard.formatorlist')->with('success', 'Formator updated successfully.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors());
    }
}

public function destroy(Request $request, $f_id = null)
{
    if ($request->input('formator_ids')) {
        // Multiple delete
        $formatorIds = $request->input('formator_ids');
        Formator::whereIn('f_id', $formatorIds)->delete();
        return redirect()->route('dashboard.formatorlist')->with('success', 'Selected Formators deleted successfully.');
    }
    

        if ($f_id) {
            // Single delete
            $formator = Formator::find($f_id);
            if ($formator) {
                $formator->delete();
                return redirect()->route('dashboard.formatorlist')->with('success', 'Formator deleted successfully.');
            } else {
                return redirect()->route('dashboard.formatorlist')->with('error', 'Formator not found.');
            }
        }
    
        return redirect()->route('dashboard.formatorlist')->with('error', 'No Formator selected for deletion.');
    }


}
    
