<?php

namespace App\Http\Controllers;

use App\Models\Formator;
use Illuminate\Http\Request;

class FormatorController extends Controller
{
    public function addFormator(){
    }

    public function showFormatorProfile(string $f_id){
        $formator = Formator::where('f_id', $f_id)->first();
        if($formator === null){
            abort(404);
        }
        // dd($formator);

        return view('dashboard.formatorprofile', ['formator' => $formator]);
    }

    public function store(Request $request){
        try{
            $data = $request->validate([
                'employee_id'=>'required|string',
                'f_Surname'=>'required|string|max:255',
                'f_FirstName'=>'required|string|max:255',
                'f_MiddleName'=>'required|string|max:255',
                'f_Sex',
                'f_Birthdate',
                'f_ContactNo',
                'f_EmailAddress',
                'f_TeachingYearStart',
                'f_NSTPTeachingYearStart',
                'f_TeachingUnitCount',
                'f_Component',
                'f_EmploymentStatus',
                'f_ActiveTeaching'
            ]);
        }
    }
}
