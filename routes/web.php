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
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    /*
     * Для хлебных крошек
     * */
    Route::get('settings', 'BreadcrumbController@setting')->name('breadcrumb.settings');

    /*
     * Пользователи
    * */
    Route::get('settings/users', 'UserController@index')->name('settings.user');
    Route::get('settings/users/create', 'UserController@create')->name('settings.user.create');

    /*
     * Роли
     * */
    Route::get('settings/roles', 'RoleController@index')->name('settings.role');
    Route::get('settings/roles/create', 'RoleController@create')->name('settings.role.create');
    Route::post('settings/roles/add', 'RoleController@store')->name('settings.role.store');
    Route::get('settings/roles/{id}/edit', 'RoleController@edit')->name('settings.role.edit');
    Route::patch('settings/roles/{id}/update', 'RoleController@update')->name('settings.role.update');
    Route::delete('settings/roles/{id}/delete', 'RoleController@destroy')->name('settings.role.destroy');

    /*
     * Должности
     * */
    Route::get('settings/positions', 'PositionController@index')->name('settings.position');
    Route::get('settings/positions/create', 'PositionController@create')->name('settings.position.create');
    Route::post('settings/positions/add', 'PositionController@store')->name('settings.position.store');
    Route::get('settings/positions/upload', 'PositionController@uploadForm')->name('settings.position.upload');
    Route::post('settings/positions/upload', 'PositionController@uploadForm');
    Route::get('settings/positions/{id}/edit', 'PositionController@edit')->name('settings.position.edit');
    Route::patch('settings/positions/{id}/update', 'PositionController@update')->name('settings.position.update');
    Route::delete('settings/positions/{id}/delete', 'PositionController@destroy')->name('settings.position.destroy');


    Route::get('/employee/list', function(){
        return view('settings.employee.show');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
