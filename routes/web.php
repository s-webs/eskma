<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/dit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    Route::group(['middleware' => ['role:superuser']], function () {
        Route::resource('administrators', \App\Http\Controllers\Users\AdministratorsController::class);
    });

    Route::group(['middleware' => ['role:superuser|admin']], function () {
        Route::resource('faculties', \App\Http\Controllers\FacultiesController::class);
        Route::resource('academicYears', \App\Http\Controllers\AcademicYears::class);
        Route::resource('educationalPrograms', \App\Http\Controllers\EducationalProgramsController::class);
        Route::resource('departments', \App\Http\Controllers\DepartmentsController::class);
        Route::resource('groups', \App\Http\Controllers\GroupsController::class);
        Route::resource('practice-bases', \App\Http\Controllers\PracticeBasesController::class);
        Route::resource('practice-base-users', \App\Http\Controllers\Users\PracticeBaseUserController::class);
        Route::resource('teachers', \App\Http\Controllers\Users\TeachersController::class);
        Route::resource('administrators', \App\Http\Controllers\Users\AdministratorsController::class);
        Route::resource('department-heads', \App\Http\Controllers\Users\DepartmentHeadsController::class);
    });

    Route::group(['middleware' => ['role:superuser|admin|teacher']], function () {
        Route::resource('students', \App\Http\Controllers\Users\StudentsController::class);
    });

    Route::group(['middleware' => ['role:teacher']], function () {
        Route::resource('practices', \App\Http\Controllers\Practice\PracticesController::class);
        Route::get('practices/{id}/students', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'listStudents'])->name('students-in-practice');
        Route::get('practices/{id}/students/add', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'addStudents'])->name('add-students-to-practice');
    });
});

Route::get('/test', function () {
    $student = \App\Models\Student::where('id', 3)->first();
    foreach ($student->practiceStudent as $item) {
        dump($item);
    }
});

require __DIR__ . '/auth.php';
