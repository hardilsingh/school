<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/students', 'StudentsController');
Route::get('getSections/{id}', 'StudentsController@getSections');
Route::get('getStudents', 'StudentsController@getStudents');

Route::resource('/classes', 'GradeController');
Route::resource('/streams', 'StreamController');
Route::resource('/sections', 'SectionController');
Route::resource('/stations', 'StationController');
Route::resource('/transfer-certificates', 'TcController');
Route::resource('/birth-certificates', 'BcController');
Route::resource('/character-certificates', 'CcController');
Route::resource('/annual-certificates', 'ExpenseController');
Route::resource('/gate-passes', 'GatePassController');
Route::resource('/employee', 'EmployeeController');
Route::resource('/fee', 'FeeController');
Route::resource('/concession', 'ConcessionController');

