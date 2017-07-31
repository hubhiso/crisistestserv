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
    return view('index');
});

Auth::routes();
Route::prefix('officer')->group(function () {
    Route::get('/', 'OfficerController@index')->name('officer.main');
    Route::get('/show', 'OfficerInputController@show')->name('officer.show');
    Route::get('/login', 'Auth\OfficerLoginController@ShowLoginForm')->name('officer.login');
    Route::post('/login', 'Auth\OfficerLoginController@login')->name('officer.login.submit');
    Route::post('/logout', 'Auth\OfficerLoginController@logout')->name('officer.logout');
    Route::resource('input_case','OfficerInputController');
    Route::get('ajax-amphur/{prov_id}','OfficerInputController@ajax_amphur');

});
Route::get('status', function () {
    return view('layout.status');
});
Route::get('manage', function () {
    return view('officer.manageCase');
});
Route::get('detail1', function () {
    return view('officer.detail1');
})->name('data.detail1');
Route::get('detail2', function () {
    return view('officer.detail2');
})->name('data.detail2');
Route::get('activities', function () {
    return view('officer.activities');
})->name('data.detail3');
Route::get('ajax-amphur/{prov_id}','case_controller@ajax_amphur');

Route::resource('case_inputs','case_controller');

Route::get('/home', 'HomeController@index')->name('home');


