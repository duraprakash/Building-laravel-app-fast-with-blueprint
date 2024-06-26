<?php

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

// Route::resource('employee', 'EmployeeController');

// Route::get('employees/test', [App\Http\Controllers\EmployeeController::class, 'test']);

Route::get('employees/test', [App\Http\Controllers\EmployeeController::class, 'test']);
Route::get('employees/show-employee', [App\Http\Controllers\EmployeeController::class, 'showEmployee'])->name("employee.show");
