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
    return view('welcome');
});
Route::resource('karyawan','KaryawanController');
Route::resource('aboutme', 'AboutmeController');
Route::resource('kendaraan','KendaraanController');
Route::resource('pembeli','PembeliController');
Auth::routes();
Route::get('/home', 'KaryawanController@index')->name('home');
Route::patch('/pembeli', 'PembeliController@store');
Route::patch('/kendaraan', 'KendaraanController@store');

