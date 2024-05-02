<?php

use App\Http\Controllers\student;
use App\Http\Controllers\teacher;
use App\Http\Controllers\course;
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
    Route::get('show', 'show');
    Route::post('submit', 'submit');
    Route::get('edit/{id}', 'edit');
    Route::post('student-update/{id}', 'update_student');
    Route::get('delete/{id}', 'delete');
    Route::get('user-list', 'data_show');
});
// Route::view('show', 'students.show');
Route::get('/add', function () {
    return view('students.add');
});
Route::get('courses/add', function () {
    return view('courses.add');
});

Route::controller(teacher::class)->group(function () {
    Route::get('teachers/show', 'show');
    Route::post('submit', 'submit');
    Route::get('teachers/edit/{id}', 'edit');
    Route::post('teachers-update/{id}', 'update_teacher');
    Route::get('teachers/delete/{id}', 'delete');
});
Route::controller(course::class)->group(function () {
    Route::get('courses/show', 'show');
    Route::post('submit', 'submit');
    Route::get('courses/edit/{id}', 'edit');
    Route::post('courses-update/{id}', 'update_courses');
    Route::get('courses/delete/{id}', 'delete');
});
