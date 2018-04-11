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
     * Блокировка экрана
     * */
    Route::get('user/lockscreen', 'UserController@lockscreen')->name('lockscreen');

    /*
     * Для хлебных крошек
     * */
    Route::get('settings', 'BreadcrumbController@setting')->name('breadcrumb.settings');

    /*
     * Пользователи
    * */
    Route::get('settings/users', 'UserController@index')->name('settings.user');
    Route::get('settings/users/create', 'UserController@create')->name('settings.user.create');
    Route::post('setting/user/add', 'UserController@store')->name('settings.user.store');

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
    Route::post('settings/positions/upload', 'PositionController@upload');
    Route::get('settings/positions/{id}/edit', 'PositionController@edit')->name('settings.position.edit');
    Route::patch('settings/positions/{id}/update', 'PositionController@update')->name('settings.position.update');
    Route::delete('settings/positions/{id}/delete', 'PositionController@destroy')->name('settings.position.destroy');

    /*
     * Подразделения
     * */
    Route::get('settings/departments', 'DepartmentController@index')->name('settings.department');
    Route::get('settings/departments/create', 'DepartmentController@create')->name('settings.department.create');
    Route::post('settings/departments/add', 'DepartmentController@store')->name('settings.department.store');
    Route::get('settings/departments/upload', 'DepartmentController@uploadForm')->name('settings.department.upload');
    Route::post('settings/departments/upload', 'DepartmentController@upload');
    Route::get('settings/departments/{id}/edit', 'DepartmentController@edit')->name('settings.department.edit');
    Route::patch('settings/departments/{id}/update', 'DepartmentController@update')->name('settings.department.update');
    Route::delete('settings/departments/{id}/delete', 'DepartmentController@destroy')->name('settings.department.destroy');

    /*
     * Сотрудники
     * */
    Route::get('settings/employees', 'EmployeeController@index')->name('settings.employee');
    Route::get('settings/employees/create', 'EmployeeController@create')->name('settings.employee.create');
    Route::post('settings/employees/add', 'EmployeeController@store')->name('settings.employee.store');
    Route::get('settings/employees/upload', 'EmployeeController@uploadForm')->name('settings.employee.upload');
    Route::post('settings/employees/upload', 'EmployeeController@upload');
    Route::get('settings/employees/{id}/edit', 'EmployeeController@edit')->name('settings.employee.edit');
    Route::patch('settings/employees/{id}/update', 'EmployeeController@update')->name('settings.employee.update');
    Route::delete('settings/employees/{id}/delete', 'EmployeeController@destroy')->name('settings.employee.destroy');

    /*
     * Типы графиков
     * */
    Route::get('settings/types', 'TypeController@index')->name('settings.type');
    Route::post('settings/types/add', 'TypeController@store')->name('settings.type.store');
    Route::patch('settings/types/{id}/update', 'TypeController@update')->name('settings.type.update');
    Route::delete('settings/types/{id}/delete', 'TypeController@destroy')->name('settings.type.destroy');

    /*
     * Графики для табеля и графика)
     * */
    Route::get('settings/graphic', 'TabelgraphicController@index')->name('settings.graphic');
    Route::post('settings/graphic/add', 'TabelgraphicController@store')->name('settings.graphic.store');
    Route::patch('settings/graphic/{id}/update', 'TabelgraphicController@update')->name('settings.graphic.update');
    Route::delete('settings/graphic/{id}/delete', 'TabelgraphicController@destroy')->name('settings.graphic.destroy');


    /*
     * Вид невыхода на работу
     * */
    Route::get('settings/absence', 'AbsenceController@index')->name('settings.absence');
    Route::post('settings/absence/add', 'AbsenceController@store')->name('settings.absence.store');
    Route::patch('settings/absence/{id}/update', 'AbsenceController@update')->name('settings.absence.update');
    Route::delete('settings/absence/{id}/delete', 'AbsenceController@destroy')->name('settings.absence.destroy');
    /*
     * Мои сотрудники
     * */
    Route::get('/my/employee', 'MyemployeeController@index')->name('my.employee');
    Route::get('/my/employee/create', 'MyemployeeController@create')->name('my.employee.create');
    Route::post('/my/employee/add', 'MyemployeeController@store')->name('my.employee.store');
    Route::get('my/employees/{id}/edit', 'MyemployeeController@edit')->name('my.employee.edit');
    Route::patch('my/employees/{id}/update', 'MyemployeeController@update')->name('my.employee.update');
    Route::delete('my/employees/{id}/delete', 'MyemployeeController@destroy')->name('my.employee.destroy');
    /*
     * Каледарь для графика и табеля
     * */
    Route::get('my/employee/{id}/calendar', 'MyemployeeController@calendar')->name('my.employee.calendar');
    Route::post('my/employee/event', 'MyemployeeController@calendarEvent')->name('my.employee.event');
    Route::get('calendar', 'MyemployeeController@getJsonData')->name('calendar.init');
    /*
     * Графики
     * */
    Route::get('graphics', 'GraphicController@index')->name('graphics');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
