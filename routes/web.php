<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormatorController;
use App\Http\Controllers\StudentImportController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/dashboard/students')->name('dashboard');

// Student group
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard/students', [DashboardController::class, 'showStudentList'])->name('dashboard.studentlist');
    Route::get('/dashboard/students/add', [StudentController::class, 'addStudent'])->name('dashboard.addstudent');
    Route::post('/dashboard/students', [StudentController::class, 'store'])->name('student.store' );
    Route::get('/dashboard/students/view/{s_id}', [DashboardController::class, 'showStudentProfile'])->name('dashboard.showstudent');
    Route::get('/dashboard/students/search', [StudentController::class, 'searchStudent'])->name('dashboard.searchstudent');
    Route::get('/dashboard/sections', [DashboardController::class, 'showSectionList'])->name('dashboard.sectionlist');
    Route::get('/dashboard/programs', [DashboardController::class, 'showProgramList'])->name('dashboard.programlist');
    Route::get('/dashboard/students/edit/{s_id}', [StudentController::class, 'editStudent'])->name('dashboard.studentedit');
    Route::put('/dashboard/students/update/{s_id}', [StudentController::class, 'updateStudent'])->name('student.update');
    Route::delete('/dashboard/students/delete', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::delete('/dashboard/students/delete/{s_id?}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/dashboard/students', [StudentController::class, 'index'])->name('dashboard.studentlist');
    Route::get('/dashboard/students/filter', [StudentController::class, 'index'])->name('dashboard.filterstudents');

    Route::get('/dashboard/students/import',[StudentController::class, 'importStudentsPage'])->name('dashboard.importstudents');
    Route::post('/dashboard/students/import/processing', [StudentImportController::class, 'import'])->name('students.import');
    Route::get('/dashboard/students/export',[StudentController::class, 'exportStudentsPage'])->name('dashboard.exportstudentspage');
    Route::get('/dashboard/students/export/processing',[StudentController::class, 'exportStudents'])->name('dashboard.exportstudents');
});

// Formator group
Route::middleware(['auth'])->group(function(){
   //Route::get('/dashboard/formators', [DashboardController::class, 'showFormatorList'])->name('dashboard.formatorlist');
    Route::get('dashboard/formators/add', [FormatorController::class, 'addFormator'])->name('dashboard.addformator');
    Route::get('dashboard/formators/view/{f_id}', [FormatorController::class, 'showFormatorProfile'])->name('dashboard.showformator');
    Route::post('/dashboard/formators', [FormatorController::class, 'store'])->name('formator.store' );
    Route::get('/dashboard/formators/edit/{f_id}', [FormatorController::class, 'editFormator'])->name('dashboard.formatoredit');
    Route::put('/dashboard/formators/update/{f_id}', [FormatorController::class, 'updateFormator'])->name('formator.update');
    Route::delete('/dashboard/formators/delete', [FormatorController::class, 'destroy'])->name('formator.destroy');
    Route::delete('/dashboard/formators/delete/{f_id?}', [FormatorController::class, 'destroy'])->name('formator.destroy');
    Route::get('/dashboard/formators', [FormatorController::class, 'index'])->name('dashboard.formatorlist');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
