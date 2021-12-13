<?php

use Illuminate\Support\Facades\Route;

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

//employee
Route::get('/employee/create', 'App\Http\Controllers\EmployeeController@create')->name('employee.create');
Route::post('/employee/store', 'App\Http\Controllers\EmployeeController@store')->name('employee.store');
Route::get('/employee/index', 'App\Http\Controllers\EmployeeController@index')->name('employee.index');

Route::get('/edit/{employee}', 'App\Http\Controllers\EmployeeController@edit')->name('employee.edit');
Route::post('/update/{employee}', 'App\Http\Controllers\EmployeeController@update')->name('employee.update');
Route::post('/destroy/{employee}', 'App\Http\Controllers\EmployeeController@destroy')->name('employee.destroy');

