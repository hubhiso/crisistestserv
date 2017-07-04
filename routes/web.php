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
Route::get('officer', function () {
    return view('officer.home');
});
Route::get('ajax-amphur/{prov_id}','case_controller@ajax_amphur');

Route::resource('case_inputs','case_controller');