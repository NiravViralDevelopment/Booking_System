<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Middleware\FrontMiddleware;
use App\Http\Controllers\Admin\TowerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@login');



Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Auth::routes();

// Route::resource('front_profile','Front\FrontProfileController');
Route::get('reset_form','Front\FrontProfileController@reset_form')->name('reset_form');
Route::POST('reset_login','Front\FrontProfileController@reset_login')->name('reset_login');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin route
Route::group(['middleware' => ['auth']], function () {
    Route::resource('resident','Front\ResidentController');
    Route::get('resident_delete/{id}','Front\ResidentController@resident_delete')->name('resident_delete');

    Route::get('resident_deactive/{id}','Front\ResidentController@resident_deactive')->name('resident_deactive');
    Route::get('resident_active/{id}','Front\ResidentController@resident_active')->name('resident_active');
    
    Route::resource('facility','Front\facilityController');
    Route::get('facility_destroy/{id}','Front\facilityController@destroy')->name('facility_destroy');
    Route::get('facility_delete/{id}','Front\facilityController@facility_delete')->name('facility_delete');
    
    Route::resource('quota_by_unit','Front\QuotaByUnitController');
    Route::resource('front_profile','Front\FrontProfileController');
    Route::resource('logbooking','Front\LogBookingController');
    Route::POST('booking','Front\LogBookingController@booking')->name('booking');
    Route::POST('booking_store','Front\LogBookingController@store')->name('booking_store');
    
    Route::resource('logcalender','Front\LogCalenderController');
    Route::resource('tack_attendance','Front\TakeAttendanceController');
    Route::POST('log_attendance_detail','Front\TakeAttendanceController@log_attendance_detail')->name('log_attendance_detail');
    Route::get('log_attendance_delete/{id}','Front\TakeAttendanceController@log_attendance_delete')->name('log_attendance_delete');
    // Route::get('log_attendance_detail','@log_attendance_detail')->name('attendance');
    
    Route::POST('attendance_store','Front\TakeAttendanceController@store')->name('attendance_store');

    Route::resource('record','Front\RecordController');
    Route::get('get_record_date_session','Front\RecordController@get_record_date_session')->name('get_record_date_session');
    Route::resource('report','Front\ReportController');
    Route::get('by_date','Front\ReportController@by_date')->name('by_date');
    
    Route::get('reportsserch','Front\ReportController@index')->name('reportsserch');
    Route::get('Booking_reports','Front\ReportController@Booking_reports')->name('Booking_reports');

    
});  





// 139.180.208.5
// username : root
// pass:glMa@2021#(1903{t

    // http://139.180.208.5/phpmyadmin-glma111/



    // Quesion Booking App

    //     1  =>  please explian Full system.
    //     2  =>  Resident List.
    //     3  =>  Resident Create.in sub aacount.

    //     *content
    //         1   =>   Facility add.
    //         2   =>  Quotes By Unit  list

    //     * LOG
    //         1  =>  Booking List please explain.select item after click button open popup. 
    //         2  =>  Take Attendance List please explain.
    //         3  =>  Record List please explain      
    //         4  =>  Report List please explain      




//admin routes

// Route::get('login','Admin\AuthController@login_form')->name('login');

// ['middleware' => 'isAdmin']


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('admin/home', 'Admin\AuthController@handleAdmin')->name('admin.home');
    
    Route::resource('admin/tower','Admin\TowerController');
    Route::get('tower/destroy/{id}','Admin\TowerController@destroy')->name('tower.destroy');
    
    Route::resource('admin/floar','Admin\FloarController');
    Route::get('floar/destroy/{id}','Admin\FloarController@destroy')->name('floar.destroy');

    Route::resource('admin/unit','Admin\UnitController');
    Route::get('get_flor/{id}','Admin\UnitController@get_flor');
    Route::get('get_unit/{id}','Admin\UnitController@get_unit');
    Route::get('unit/destroy/{id}','Admin\UnitController@destroy')->name('unit.destroy');

    Route::resource('admin/setting','Admin\SettingDataController');
    Route::get('setting_delete/{id}','Admin\SettingDataController@setting_delete')->name('setting_delete');
    
});

Route::get('change/lang', 'Admin\TowerController@lang_change')->name('LangChange');




