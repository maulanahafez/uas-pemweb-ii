<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TugasController;
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

Route::redirect('/', '/proyek')->name('index');

Route::resource('proyek', ProyekController::class);
Route::resource('tugas', TugasController::class);
// Route::prefix('tugas')->group(function(){
//     Route::get('/')->Tugas
// });
Route::resource('department', DepartmentController::class);
Route::resource('karyawan', KaryawanController::class);
