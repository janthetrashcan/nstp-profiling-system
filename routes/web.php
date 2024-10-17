<?php

use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/dashboard/students')->name('dashboard');

// place dashboard routes here
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard/students', [DashboardController::class, 'showStudentList'])->name('dashboard.studentlist');
    Route::get('/dashboard/students/{s_id}', [DashboardController::class, 'showStudentProfile'])->name('dashboard.showstudent');
    Route::get('/dashboard/formators', [DashboardController::class, 'showFormatorList'])->name('dashboard.formatorlist');
    Route::get('/dashboard/students/add', [StudentController::class, 'addStudent'])->name('dashboard.addStudent');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
