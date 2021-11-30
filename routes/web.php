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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

############# Admin Routes Group #############

Route::prefix('admin') -> middleware('adminAuth') -> group(function()
{
    Route::get('/index','CompanyController@index');
    #Route::get('/search','CompanyController@search');
    Route::get('/companies','CompanyController@show');
    Route::get('/company/create','CompanyController@create');
    Route::post('/companies','CompanyController@store');
    Route::get('/company/{company_id}/edit','CompanyController@edit') -> name('company.edit');
    Route::put('/company/{company_id}/edit','CompanyController@update') -> name('company.edit');
    Route::get('/company/{company_id}/delete','CompanyController@delete') -> name('company.delete');
    Route::get('/company/{company_id}/employees', 'CompanyController@company_employees') -> name('company.employees');

    ######################Employee Routes#########################

    Route::get('/employees','EmployeeController@index');
    Route::get('/employee/company/{company_id}/create','EmployeeController@create') -> name('employee.company.create');
    Route::post('/employee/company/{company_id}/create','EmployeeController@store') -> name('employee.company.create');
    Route::get('/employee/{employee_id}/company/{company_id}/edit','EmployeeController@edit') -> name('employee.company.edit');
    Route::put('/employee/{employee_id}/company/{company_id}/edit','EmployeeController@update') -> name('employee.company.edit');
    Route::get('/employee/{employee_id}/delete','EmployeeController@delete') -> name('employee.delete');
    
});

############## Normal user routes group ###############
Route::prefix('guest') -> middleware('auth') -> group(function(){
    Route::get('/index','GuestCompanyController@index');
    Route::get('/companies','GuestCompanyController@show');
    Route::get('/employees','GuestEmployeeController@show');
});
