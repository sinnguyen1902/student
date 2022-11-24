<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// trang chu
Route::get('/', [Homecontroller::class, 'index']);
Route::get('/trangchu', [Homecontroller::class, 'index']);
Route::get('/login', [Homecontroller::class, 'login']);
Route::get('/logout', [Homecontroller::class, 'logout']);
Route::post('/login-dashboard', [Homecontroller::class, 'login_dashboard']);

Route::get('/add', [Homecontroller::class, 'add']);
Route::post('/add1', [Homecontroller::class, 'add1']);



Route::get('/view', [Homecontroller::class, 'view']);
Route::get('/profile', [Homecontroller::class, 'profile']);

// save student/teacher

Route::post('/save', [Homecontroller::class, 'save']);
Route::post('/save-khoa', [Homecontroller::class, 'save_khoa']);
Route::post('/save-lop', [Homecontroller::class, 'save_lop']);
Route::get('/khoa', [Homecontroller::class, 'khoa']);
Route::get('/lop', [Homecontroller::class, 'lop']);

//delete student/teacher
Route::get('/delete/{_id}', [Homecontroller::class, 'delete']);
Route::get('/show-student/{_id}', [Homecontroller::class, 'show_student']);
//profile
Route::get('/profile/{id}', [Homecontroller::class, 'profile']);
Route::post('/update/{id}', [Homecontroller::class, 'update']);
Route::post('/in', [Homecontroller::class, 'in']);
// search
Route::get('/search', [Homecontroller::class, 'search']);



Route::get('/delete-khoa/{id}', [Homecontroller::class, 'delete_khoa']);
Route::get('/delete-lop/{id}', [Homecontroller::class, 'delete_lop']);
Route::get('/show-khoa', [Homecontroller::class, 'show_khoa']);
Route::get('/show-lop', [Homecontroller::class, 'show_lop']);

