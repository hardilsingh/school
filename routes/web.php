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
Route::patch('/basicUpdate' , 'StudentsController@basicUpdate');

Route::get('/report', 'StudentsController@report');

Route::resource('/classes', 'GradeController');
Route::resource('/streams', 'StreamController');
Route::resource('/sections', 'SectionController');
Route::resource('/stations', 'StationController');
Route::get('/stationSearch', 'StationController@search');
Route::get('/stationSearchnow', 'StationController@searchNow');
Route::resource('/transfer-certificates', 'TcController');
Route::resource('/birth-certificates', 'BcController');
Route::resource('/character-certificates', 'CcController');
Route::resource('/annual-certificates', 'ExpenseController');
Route::resource('/gate-passes', 'GatePassController');
Route::resource('/employee', 'EmployeeController');

Route::get('/feeform' , 'FeeController@feeForm');
Route::get('/saveData' , 'FeeController@saveData');


Route::get('/fee/student/{id}', 'FeeController@manage');
Route::resource('/fee', 'FeeController');
Route::post('/fee/student/concessionapply', 'FeeController@updateConcession');
Route::resource('/concession', 'ConcessionController');
Route::resource('/prints', 'PrintController');
Route::get('/searchedlist', 'PrintController@prints');
Route::get('/export', 'PrintController@export');

Route::get('/exportpdf', 'PrintController@pdf');
Route::resource('/customPrints', 'CustomPrintController');

Route::resource('/deactivated', 'DeactivatedController');
Route::get('/activateStudent' , 'DeactivatedController@activate');
Route::get('/deactivateStudent' , 'DeactivatedController@deactivate');

