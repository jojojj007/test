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
Route::resource('roles','RoleController');
Route::resource('departments', 'DepartmentController');
Route::resource('years', 'YearController');
Route::resource('riskTypes', 'RiskTypeController');
Route::resource('riskImpacts', 'RiskImpactController');
Route::resource('riskStrategies', 'RiskStrategyController');
Route::resource('riskActivityStatuses', 'RiskActivityStatusController');
Route::resource('departmentYears', 'DepartmentYearController');
Route::resource('users', 'UserController');
Route::resource('risks', 'RiskController');
Route::resource('riskFactors', 'RiskFactorController');
Route::resource('riskActivities', 'RiskActivityController');
Route::resource('riskIndicators', 'RiskIndicatorController');
Route::resource('riskResults', 'RiskResultController');
Route::resource('riskIndicatorResults', 'RiskIndicatorResultController');
Route::resource('riskActivityResults', 'RiskActivityResultController');
Auth::routes();

Route::resource('tests', 'TestController');

Route::get('/home', 'HomeController@index')->name('home');
