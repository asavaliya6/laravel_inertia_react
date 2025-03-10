<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Welcome Route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard Route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Student Management Routes
    Route::controller(StudentController::class)->group(function () {
        Route::get('/studentsdashboard', 'index')->name('studentsdashboard.index');
        Route::post('/addStudent', 'store')->name('addStudent.store');
        Route::patch('/updateStudent/{student_id}', 'update')->name('updateStudent.update');
        Route::delete('/deleteStudent/{student_id}', 'destroy')->name('deleteStudent.destroy');
    });
});

require __DIR__.'/auth.php';
