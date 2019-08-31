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

//Login Routes
Route::post('user-login', 'AuthController@userLogin');
Route::post('companies-login', 'AuthController@companiesLogin');

//Register Routes
Route::post('user-register', 'RegisterController@userRegister');
Route::post('companies-register', 'RegisterController@companiesRegister');

// Companies Routes
Route::group(['prefix' => 'companies','middleware' => ['assign.guard:companies','jwt.auth']],function () {
    Route::get('/demo','CompaniesController@demo');
    Route::post('/add','CompaniesController@add');
    Route::post('/view/{id}','CompaniesController@view');
    Route::post('/update/{id}','CompaniesController@update');
    Route::post('/delete/{id}','CompaniesController@delete');
});

// Users Routes
Route::group(['prefix' => 'users','middleware' => ['assign.guard:users','jwt.auth']],function () {
    Route::get('/demo','UsersController@demo');
    Route::post('/add','UsersController@add');
    Route::post('/view/{id}','UsersController@view');
    Route::post('/update/{id}','UsersController@update');
    Route::post('/delete/{id}','UsersController@delete');
});

// Authenticate check route
Route::get('check', 'AuthController@check')->name('check');
