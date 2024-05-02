<?php

use App\Http\Controllers\student;
use App\Http\Controllers\teacher;
use App\Http\Controllers\course;
use App\Http\Controllers\batche;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('home', 'home');

// Route::get('/show', function () {
//     return view('students.show');
// });

Route::controller(student::class)->group(function () {
    Route::get('students/show', 'show');
    Route::post('students/submit', 'submit');
    Route::get('students/edit/{id}', 'edit');
    Route::post('students/student-update/{id}', 'update_student');
    Route::get('students/delete/{id}', 'delete');
    // Route::get('user-list', 'data_show');
});
// Route::view('show', 'students.show');
Route::get('students/add', function () {
    return view('students.add');
});
Route::get('teachers/add', function () {
    return view('teachers.add');
});
// Route::get('courses/add', function () {
//     return view('courses.add');
// });

Route::controller(teacher::class)->group(function () {
    Route::get('teachers/show', 'show');
    Route::post('teachers/submit', 'submit');
    // Route::get('teachers/add', 'add');
    Route::get('teachers/edit/{id}', 'edit');
    Route::post('teachers-update/{id}', 'update_teacher');
    Route::get('teachers/delete/{id}', 'delete');
});
Route::controller(batche::class)->group(function () {
    Route::get('batchess/show', 'show');
    Route::post('batchess/submit', 'submit');
    Route::get('batchess/add', 'add');
    Route::get('batchess/edit/{id}', 'edit');
    Route::post('batchess-update/{id}', 'update_batche');
    Route::get('batchess/delete/{id}', 'delete');
});
Route::controller(course::class)->group(function () {
    Route::get('courses/show', 'show');
    Route::post('submit', 'submit');
    Route::get('courses/add', 'add');
    Route::get('courses/edit/{id}', 'edit');
    Route::post('courses-update/{id}', 'update_courses');
    Route::get('courses/delete/{id}', 'delete');
});
