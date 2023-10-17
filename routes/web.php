<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\taskController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('service', ServiceController::class);
Route::resource('employee',EmployeeController::class);
Route::resource('project',ProjectController::class);
Route::resource('fullcalendar',FullCalendarController::class);
Route::resource('reclamation',ReclamationController::class);
Route::resource('task',TaskController::class);
Route::get('/download/{description}',[ProjectController::class,'download']);
Route::get('/view/{is}',[ProjectController::class,'view']);
//Route::get('/home', [App\Http\Controllers\ServiceController::class, 'index'])->name('home');

