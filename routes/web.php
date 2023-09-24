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

    Route::group(['middleware' => ['role:teacher|base_user|student']], function () {
        Route::get('practices-student/{id}/add-grade', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'addGrade'])->name('add-grade');
        Route::post('practices-student/{id}/store-grade', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'storeGrade'])->name('store-grade');
        Route::get('practices-student/{id}/add-total-grade', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'addTotalGrade'])->name('add-total-grade');
        Route::post('practices-student/{id}/store-total-grade', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'storeTotalGrade'])->name('store-total-grade');
        Route::get('practices-student/{id}/add-review', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'addReview'])->name('add-review');
        Route::post('practices-student/{id}/store-review', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'storeReview'])->name('store-review');
    });

    Route::resource('practices', \App\Http\Controllers\Practice\PracticesController::class);
    Route::get('practices/{id}/students', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'listStudents'])->name('students-in-practice');
    Route::post('practices/{id}/disable', [\App\Http\Controllers\Practice\PracticesController::class, 'disable'])->name('disable-practice');

    Route::group(['middleware' => ['role:teacher']], function () {
        Route::get('practices/{id}/students/add', [\App\Http\Controllers\Practice\PracticeStudentsController::class, 'addStudents'])->name('add-students-to-practice');
    });
    Route::get('practices/{id}/detail', [\App\Http\Controllers\PracticeStudent\PracticesController::class, 'details'])->name('student.practices-details');
    Route::group(['middleware' => ['role:student']], function () {
        Route::get('practices-student', [\App\Http\Controllers\PracticeStudent\PracticesController::class, 'index'])->name('student.practices-index');


        Route::get('practices/{id}/add-plan', [\App\Http\Controllers\PracticeStudent\PracticePlansController::class, 'create'])->name('student.practices-add-plan');
        Route::post('practices/store-plan', [\App\Http\Controllers\PracticeStudent\PracticePlansController::class, 'store'])->name('student.practices-store-plan');
        Route::get('practices/edit-plan/{id}', [\App\Http\Controllers\PracticeStudent\PracticePlansController::class, 'edit'])->name('student.practices-edit-plan');
        Route::post('practices/update-plan/{id}', [\App\Http\Controllers\PracticeStudent\PracticePlansController::class, 'update'])->name('student.practices-update-plan');
        Route::delete('practices/delete-plan/{id}', [\App\Http\Controllers\PracticeStudent\PracticePlansController::class, 'destroy'])->name('student.practices-delete-plan');
//        Route::resource('student/practices/{id}/plans', \App\Http\Controllers\PracticeStudent\PracticePlansController::class);

        Route::get('practices/{id}/add-content', [\App\Http\Controllers\PracticeStudent\PracticeContentsController::class, 'create'])->name('student.practices-add-content');
        Route::get('practices/{id}/edit-content', [\App\Http\Controllers\PracticeStudent\PracticeContentsController::class, 'edit'])->name('student.practices-edit-content');
        Route::post('practices/store-content', [\App\Http\Controllers\PracticeStudent\PracticeContentsController::class, 'store'])->name('student.practices-store-content');
        Route::post('practices/update-content/{id}', [\App\Http\Controllers\PracticeStudent\PracticeContentsController::class, 'update'])->name('student.practices-update-content');
        Route::delete('practices/delete-content/{id}', [\App\Http\Controllers\PracticeStudent\PracticeContentsController::class, 'destroy'])->name('student.practices-delete-content');

        Route::post('/upload-image', [\App\Http\Controllers\ImageUploadController::class, 'upload'])->name('image.upload');
    });
});


Route::get('/test', function () {
    $student = \App\Models\Student::where('id', 3)->first();
    foreach ($student->practiceStudent as $item) {
        dump($item);
    }
});

require __DIR__ . '/auth.php';
