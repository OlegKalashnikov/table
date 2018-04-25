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
    /*
     * Главная страница
     * */
    Route::get('/', 'IndexController@index')->name('index');

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
     * Установка праздничных дней
     * */
    Route::get('settings/holidays', 'HolidayController@index')->name('settings.holidays');
    Route::get('settings/holidays/create', 'HolidayController@create')->name('settings.holidays.create');
    Route::post('settings/holidays/add', 'HolidayController@store')->name('settings.holidays.store');
    Route::get('settings/holidays/{id}/edit', 'HolidayController@edit')->name('settings.holidays.edit');
    Route::patch('settings/holidays/{id}/update', 'HolidayController@update')->name('settings.holidays.update');
    Route::delete('settings/holidays/{id}/delete', 'HolidayController@destroy')->name('settings.holidays.destroy');

    /*
     * Должности
     * */
    Route::get('directory/positions', 'PositionController@index')->name('directory.position');
    Route::get('directory/positions/create', 'PositionController@create')->name('directory.position.create');
    Route::post('directory/positions/add', 'PositionController@store')->name('directory.position.store');
    Route::get('directory/positions/upload', 'PositionController@uploadForm')->name('directory.position.upload');
    Route::post('directory/positions/upload', 'PositionController@upload');
    Route::get('directory/positions/{id}/edit', 'PositionController@edit')->name('directory.position.edit');
    Route::patch('directory/positions/{id}/update', 'PositionController@update')->name('directory.position.update');
    Route::delete('directory/positions/{id}/delete', 'PositionController@destroy')->name('directory.position.destroy');

    /*
     * Подразделения
     * */
    Route::get('directory/departments', 'DepartmentController@index')->name('directory.department');
    Route::get('directory/departments/create', 'DepartmentController@create')->name('directory.department.create');
    Route::post('directory/departments/add', 'DepartmentController@store')->name('directory.department.store');
    Route::get('directory/departments/upload', 'DepartmentController@uploadForm')->name('directory.department.upload');
    Route::post('directory/departments/upload', 'DepartmentController@upload');
    Route::get('directory/departments/{id}/edit', 'DepartmentController@edit')->name('directory.department.edit');
    Route::patch('directory/departments/{id}/update', 'DepartmentController@update')->name('directory.department.update');
    Route::delete('directory/departments/{id}/delete', 'DepartmentController@destroy')->name('directory.department.destroy');

    /*
     * Сотрудники
     * */
    Route::get('directory/employees', 'EmployeeController@index')->name('directory.employee');
    Route::get('directory/employees/create', 'EmployeeController@create')->name('directory.employee.create');
    Route::post('directory/employees/add', 'EmployeeController@store')->name('directory.employee.store');
    Route::get('directory/employees/upload', 'EmployeeController@uploadForm')->name('directory.employee.upload');
    Route::post('directory/employees/upload', 'EmployeeController@upload');
    Route::get('directory/employees/{id}/edit', 'EmployeeController@edit')->name('directory.employee.edit');
    Route::patch('directory/employees/{id}/update', 'EmployeeController@update')->name('directory.employee.update');
    Route::delete('directory/employees/{id}/delete', 'EmployeeController@destroy')->name('directory.employee.destroy');

    /*
     * Типы графиков
     * */
//    Route::get('settings/types', 'TypeController@index')->name('settings.type');
//    Route::post('settings/types/add', 'TypeController@store')->name('settings.type.store');
//    Route::patch('settings/types/{id}/update', 'TypeController@update')->name('settings.type.update');
//    Route::delete('settings/types/{id}/delete', 'TypeController@destroy')->name('settings.type.destroy');


    /*
     * Графики для табеля и графика)
     * */
    Route::get('graphic', 'TabelgraphicController@index')->name('graphic');
    Route::get('graphic/create/other', 'TabelgraphicController@showFormCreateOther')->name('graphic.create.other');
    Route::post('graphic/add/other', 'TabelgraphicController@storeOther')->name('graphic.store.other');
    Route::get('graphic/create/medicalstaff', 'TabelgraphicController@showFormCreateMedicalstaff')->name('graphic.create.medicalstaff');
    Route::post('graphic/add/medicalstaff', 'TabelgraphicController@storeMedicalstaff')->name('graphic.add.medicalstaff');
    Route::get('graphic/create/employee', 'TabelgraphicController@showFormCreateEmployee')->name('graphic.create.employee');
    Route::get('graphic/create/employee/{id}', 'TabelgraphicController@showFormCreateEmployeeId')->name('graphic.create.employee.id');
    Route::post('graphic/add/employee', 'TabelgraphicController@storeEmployee')->name('graphic.add.employee');


    Route::get('graphic/create', 'TabelgraphicController@create')->name('graphic.create');
    Route::post('graphic/add', 'TabelgraphicController@store')->name('graphic.store');
    Route::patch('graphic/{id}/update', 'TabelgraphicController@update')->name('graphic.update');
    Route::delete('graphic/{id}/delete', 'TabelgraphicController@destroy')->name('graphic.destroy');


    /*
     * Вид невыхода на работу
     * */
    Route::get('settings/absence', 'AbsenceController@index')->name('settings.absence');
    Route::post('settings/absence/add', 'AbsenceController@store')->name('settings.absence.store');
    Route::patch('settings/absence/{id}/update', 'AbsenceController@update')->name('settings.absence.update');
    Route::delete('settings/absence/{id}/delete', 'AbsenceController@destroy')->name('settings.absence.destroy');

    Route::get('/absence/sickleave', 'AbsenceController@showFormSickleave')->name('absence.sickleave');//больничный лист
    Route::get('/absence/holiday', 'AbsenceController@showFormHoliday')->name('absence.holiday');//отпуск
    Route::get('/absence/absenteeism', 'AbsenceController@showFormAbsenteeism')->name('absence.absenteeism');//прогул
    Route::get('/absence/withoutcontent', 'AbsenceController@showFormWithoutcontent')->name('absence.withoutcontent');//без содержания
    Route::get('/absence/apprenticeship', 'AbsenceController@showFormApprenticeship')->name('absence.apprenticeship');//Ученический отпуск
    Route::get('/absence/specialization', 'AbsenceController@showFormSpecialization')->name('absence.specialization');//Специализация
    Route::get('/absence/businesstrip', 'AbsenceController@showFormBusinesstrip')->name('absence.businesstrip');//Командировка

    Route::get('/absence/sickleave/create', 'AbsenceController@showFormCreateSickleave')->name('absence.sickleave.create');//больничный лист
    Route::get('/absence/holiday/create', 'AbsenceController@showFormCreateHoliday')->name('absence.holiday.create');//отпуск
    Route::get('/absence/absenteeism/create', 'AbsenceController@showFormCreateAbsenteeism')->name('absence.absenteeism.create');//прогул
    Route::get('/absence/withoutcontent/create', 'AbsenceController@showFormCreateWithoutcontent')->name('absence.withoutcontent.create');//без содержания
    Route::get('/absence/apprenticeship/create', 'AbsenceController@showFormCreateApprenticeship')->name('absence.apprenticeship.create');//Ученический отпуск
    Route::get('/absence/specialization/create', 'AbsenceController@showFormCreateSpecialization')->name('absence.specialization.create');//Специализация
    Route::get('/absence/businesstrip/create', 'AbsenceController@showFormCreateBusinesstrip')->name('absence.businesstrip.create');//Командировка

    Route::post('/absence/sickleave/add', 'AbsenceController@storeSickleave')->name('absence.sickleave.add');//больничный лист
    Route::post('/absence/holiday/add', 'AbsenceController@storeHoliday')->name('absence.holiday.add');//отпуск
    Route::post('/absence/absenteeism/add', 'AbsenceController@storeAbsenteeism')->name('absence.absenteeism.add');//прогул
    Route::post('/absence/withoutcontent/add', 'AbsenceController@storeWithoutcontent')->name('absence.withoutcontent.add');//без содержания
    Route::post('/absence/apprenticeship/add', 'AbsenceController@storeApprenticeship')->name('absence.apprenticeship.add');//Ученический отпуск
    Route::post('/absence/specialization/add', 'AbsenceController@storeSpecialization')->name('absence.specialization.add');//Специализация
    Route::post('/absence/businesstrip/add', 'AbsenceController@storeBusinesstrip')->name('absence.businesstrip.add');//Командировка

    /*
     * Совмещение
     * */

    Route::get('/alignment', 'AlignmentController@index')->name('alignment');
    Route::get('/alignment/create', 'AlignmentController@create')->name('alignment.create');
    Route::post('/alignment/add', 'AlignmentController@store')->name('alignment.store');


    /*
     * Увольнения
     * */
    Route::get('dismissal', 'DismissalController@index')->name('dismissal');
    Route::get('dismissal/create', 'DismissalController@create')->name('dismissal.create');
    Route::get('dismissal/create/{id}/employee', 'DismissalController@createEmployee')->name('dismissal.create.employee');
    Route::post('dismissal/add', 'DismissalController@store')->name('dismissal.store');
    Route::get('dismissal/{id}/edit', 'DismissalController@edit')->name('dismissal.edit');
    Route::patch('dismissal/{id}/update', 'DismissalController@update')->name('dismissal.update');

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

    Route::get('print/graphics', 'PrintGraphicController@index')->name('print.graphics');
    Route::get('print/graphics/{department_id}/{month}/show', 'PrintGraphicController@showGraphic')->name('print.graphics.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
