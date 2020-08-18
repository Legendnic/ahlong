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

// this is home  routes
Route::get('/home', 'HomeController@index')->name('home');

// this is company routes
Route::get('/company', 'CompanyController@index')->name('company');
Route::get('/company/list', 'CompanyController@show')->name('company_list');
Route::get('/company/create', 'CompanyController@create')->name('company_add');
Route::get('/company/edit', 'CompanyController@edit')->name('company_edit');
Route::post('/company/update/{id}', 'CompanyController@update')->name('company_update');
Route::delete('/company/delete/{id}', 'CompanyController@destroy')->name('company_delete');
Route::post('/company/store', 'CompanyController@store')->name('company_store');
