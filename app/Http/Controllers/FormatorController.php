<?php

namespace App\Http\Controllers;

use App\Models\Formator;
use App\Models\Program;
use App\Models\Section;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormatorController extends Controller
{
    public function index(Request $request)
    {
        $query = Formator::query();
        $search = $request->input('formator_search') ?? "";

        // Apply filters
        if ($request->filled('component')) {
            $query->where('component_id', $request->component_id);
        }
        if ($request->filled('active_teaching')) {
            $query->where('f_ActiveTeaching', $request->active_teaching);
        }
        if ($request->filled('employment_status')) {
            $query->where('f_EmploymentStatus', $request->employment_status);
        }
        if ($request->filled('teaching_year_start')) {
            $query->where('f_TeachingYearStart', $request->teaching_year_start);
        }
        if ($request->filled('nstp_teaching_year')) {
            $query->where('f_NSTPTeachingYearStart', $request->nstp_teaching_year);
        }

        if ($request->filled('formator_search')) {
            $query->where('f_Surname', 'like', "%$search")
            ->orWhere('f_FirstName', 'like', "%$search%")
            ->orWhere('f_MiddleName', 'like', "%$search%");
        }
        else{
            return view('dashboard.formatorlist', ['formators' => $query->paginate(15), 'search' => ""]);
        }

        $formators = $query->paginate(15);  // Adjust the number as needed

        return view('dashboard.formatorlist', compact('formators', 'search'));
    }

    public function addformator()
    {
        $sections = Section::all();
        $components = Component::all();
        return view('dashboard.addformator', compact('sections', 'components'));
    }

    public function showFormatorProfile($id)
    {
        $formator = Formator::findOrFail($id);
        return view('dashboard.showformator', compact('formator'));
    }

    public function editformator(string $f_id)
    {
        $programs = Program::all();
        $sections = Section::all();
        $components = Component::all();

        $formator = Formator::where('f_id', $f_id)->first();
        if ($formator === null) {
            abort(404);
        }
        return view('dashboard.formatoredit', compact('formator', 'programs', 'sections', 'components'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'employee_id' => 'required|string|size:6|regex:/^\d{6}$/',
                'f_Surname' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                'f_FirstName' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                'f_MiddleName' => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
                'f_Sex' => 'required|string|in:male,female',
                'f_Birthdate' => 'required|date|after:1900-01-01|before:2025-01-01',
                'f_ContactNo' => ['required', 'string', 'max:15', 'regex:/^(\+639\d{9}|09\d{9})$/'],
                'f_EmailAddress' => 'required|email|max:255',
                'f_TeachingYearStart' => 'required|string|size:4|regex:/^\d{4}$/',
                'f_NSTPTeachingYearStart' => 'required|string|size:4|regex:/^\d{4}$/',
                'f_TeachingUnitCount' => 'required|string|max:10|regex:/^\d+$/',
                'component_id' => 'required|integer|exists:components,component_id',
                'f_EmploymentStatus' => 'required|string|in:part-time,full-time',
                'f_ActiveTeaching' => 'required|string|in:active,inactive',
            ]);

            $formator = Formator::create($data);
            return redirect()->route('dashboard.showformator', ['f_id' => $formator->f_id])->with('success', 'Formator added successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in FormatorController@store: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
        }
    }

    public function updateFormator(Request $request, string $f_id)
    {
        $formator = Formator::where('f_id', $f_id)->first();
        if ($formator === null) {
            abort(404);
        }

        try {
            $data = $request->validate([
                'employee_id' => 'required|string|size:8|regex:/^\d{8}$/',
                'f_Surname' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                'f_FirstName' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
                'f_MiddleName' => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
                'f_Sex' => 'required|string|in:male,female',
                'f_Birthdate' => 'required|date|after:1900-01-01|before:2025-01-01',
                'f_ContactNo' => ['required', 'string', 'max:15', 'regex:/^(\+639\d{9}|09\d{9})$/'],
                'f_EmailAddress' => 'required|email|max:255',
                'f_TeachingYearStart' => 'required|string|size:4|regex:/^\d{4}$/',
                'f_NSTPTeachingYearStart' => 'required|string|size:4|regex:/^\d{4}$/',
                'f_TeachingUnitCount' => 'required|string|max:10|regex:/^\d+$/',
                'component_id' => 'required|integer|exists:components,component_id',
                'f_EmploymentStatus' => 'required|string|in:part-time,full-time',
                'f_ActiveTeaching' => 'required|string|in:active,inactive',
            ]);

            $formator->update($data);
            return redirect()->route('dashboard.formatorlist')->with('success', 'Formator updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in FormatorController@updateFormator: ' . $e->getMessage());
            return redirect()->route('dashboard.formatorlist')->with('error', 'Error in updating formator. Please try again.');
        }
    }

    public function destroy(Request $request, $f_id = null)
    {
        if ($request->input('formator_ids') && !$request->input('confirmed')) {
            $formatorIds = $request->input('formator_ids');
            $formators = Formator::whereIn('f_id', $formatorIds)->get();
            return view('dashboard.formatordelete', compact('formators', 'formatorIds'));
        }

        if ($request->input('formator_ids')) {
            // Multiple delete
            $formatorIds = $request->input('formator_ids');
            $deletedCount = Formator::whereIn('f_id', $formatorIds)->delete();
            return redirect()->route('dashboard.formatorlist')->with('success', "$deletedCount Formators deleted successfully.");
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

