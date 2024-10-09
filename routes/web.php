<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'showIndex'])->name('dashboard.index');
Route::get('/dashboard/students', [DashboardController::class, 'showStudentList'])->name('dashboard.studentlist');
Route::get('/dashboard/students/{s_id}', [DashboardController::class, 'showStudentProfile'])->name('dashboard.showstudent');


// Route::resource('student', DashboardController::class);
