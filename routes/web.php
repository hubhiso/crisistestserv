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

Route::get('status', function () {
    return view('layout.status');
});

Route::get('officer', function () {
    return view('officer.home');
});
Route::get('manage', function () {
    return view('officer.manageCase');
});
Route::get('detail1', function () {
    return view('officer.detail1');
});
Route::get('detail2', function () {
    return view('officer.detail2');
});
Route::get('activities', function () {
    return view('officer.activities');
});
Route::get('ajax-amphur/{prov_id}','case_controller@ajax_amphur');

Route::resource('case_inputs','case_controller');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
