<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.users');
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
        if(!Hash::check($request['confirmPassword'], Auth::user()->password)){
            return redirect()->route('users.index')->with('error', 'Password does not match');
        }

        try {
            $validated = $request->validate([
                'is_admin' => 'nullable|boolean',
                'surname' => 'required|string|max:255',
                'firstName' => 'required|string|max:255',
                'middleName' => 'nullable|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:8',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('users.index')->with('error', 'Validation error');
        }

        $user = User::create($validated);

        return redirect()->route('users.index')->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if(!Hash::check($request['confirmPassword'], $user->password)){
            return redirect()->route('users.index')->with('error', 'Password does not match');
        }

        $hasAdmin = User::where('is_admin, true')->exists();
        if(!isset($request['is_admin']) && !$hasAdmin){
            return redirect()->route('users.index')->with('error', 'At least one admin user must exist');
        }

        // Validate input
        try {
            $validated = $request->validate([
                'is_admin' => 'nullable|boolean',
                'surname' => 'required|string|max:255',
                'firstName' => 'required|string|max:255',
                'middleName' => 'nullable|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'nullable|string|min:8',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($request->all(), $e);
            return redirect()->route('users.index')->with('error', 'Validation error');
        }

        $user = User::where('id', $request['id'])->first();

        // Iterate over each field and update if filled
        foreach ($validated as $key => $value) {
            if (!empty($value)) {
                if ($key === 'password') {
                    $user->$key = bcrypt($value); // Hash the password
                } else {
                    $user->$key = $value;
                }
            }
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $adminCount = User::where('is_admin, true')->count();
        if($user->is_admin && $adminCount <= 1){
            return redirect()->route('users.index')->with('error', 'At least one admin user must exist');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User removed successfully');
    }
}
