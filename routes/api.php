<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
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