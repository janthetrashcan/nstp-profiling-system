<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/dashboard/students')->name('dashboard');

// place dashboard routes here
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard/students', [DashboardController::class, 'showStudentList'])->name('dashboard.studentlist');
    Route::get('/dashboard/students/add', [StudentController::class, 'addStudent'])->name('dashboard.addstudent');
    Route::post('/dashboard/students', [StudentController::class, 'store'])->name('student.store' );
    Route::get('/dashboard/students/view/{s_id}', [DashboardController::class, 'showStudentProfile'])->name('dashboard.showstudent');
    Route::get('/dashboard/formators', [DashboardController::class, 'showFormatorList'])->name('dashboard.formatorlist');
    Route::get('/dashboard/sections', [DashboardController::class, 'showSectionList'])->name('dashboard.sectionlist');
    Route::get('/dashboard/programs', [DashboardController::class, 'showProgramList'])->name('dashboard.programlist');
    Route::get('/dashboard/students/edit/{s_id}', [StudentController::class, 'editStudent'])->name('dashboard.studentedit');
    Route::put('/dashboard/students/update/{s_id}', [StudentController::class, 'updateStudent'])->name('student.update');
    Route::delete('/dashboard/students/delete', [StudentController::class, 'destroy'])->name('student.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
