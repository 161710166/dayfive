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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('kelas','KelasController');
Route::resource('piket','PiketController');
Route::resource('siswa','SiswaController');
Route::resource('absen','AbsenController');

Route::get('cek', function(){
	 return view('layouts.admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','Middleware'=>['auth','role:admin']],
function(){
	//isi route disini
	Route::resource('/absen','AbsenController');
	Route::resource('/piket','PiketController');
	Route::resource('/kelas','KelasController');
	Route::resource('/siswa','SiswaController');
	});
