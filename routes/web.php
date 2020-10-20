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
    return view('/auth/login');
});

Auth::routes();
// Route::group(['middleware' => ['auth']],function(){
//     Route::prefix('admin')->group(function(){
//         Route::get('/', function(){
//             return view ('home');
//             });

//         Route::prefix('user')->group(function(){
//             Route::get('/user', 'UserController@index')->name('user.index')->middleware('roles');
            
//         });
//     });
// });

Route::get('/home', 'HomeController@index')->name('home');

//detailhewan 
Route::get('/hewan', 'DetailhewanController@index')->name('hewan.index');
Route::get('/hewan/create', 'DetailhewanController@create')->name('hewan.create');
Route::post('/hewan/create', 'DetailhewanController@store')->name('hewan.store');
Route::get('/hewan/{DetailHewan}/edit', 'DetailhewanController@edit')->name('hewan.edit');
Route::patch('/hewan/{DetailHewan}/edit', 'DetailhewanController@update')->name('hewan.update');
Route::delete('/hewan/{DetailHewan}/delete', 'DetailhewanController@destroy')->name('hewan.destroy');

//nasabah
Route::get('/nasabah', 'NasabahController@index')->name('nasabah.index');
Route::get('/nasabah/cari', 'NasabahController@cari')->name('nasabah.cari');
Route::get('/nasabah/create', 'NasabahController@create')->name('nasabah.create');
Route::post('/nasabah/create', 'NasabahController@store')->name('nasabah.store');
Route::get('/nasabah/{Nasabah}/edit', 'NasabahController@edit')->name('nasabah.edit');
Route::patch('/nasabah/{Nasabah}/edit', 'NasabahController@update')->name('nasabah.update');
Route::delete('/nasabah/{Nasabah}/delete', 'NasabahController@destroy')->name('nasabah.delete');

//tabunga
Route::get('/tabungan', 'TabunganController@index')->name('tabungan.index');
Route::get('/tabungan/cari', 'TabunganController@cari')->name('tabungan.cari');
Route::get('/tabungan/create', 'TabunganController@create')->name('tabungan.create');
Route::get('/tabungan/detail/{idN}', 'TabunganController@detail')->name('tabungan.detail');
Route::post('/tabungan/create', 'TabunganController@store')->name('tabungan.store');
Route::get('/tabungan/{Tabungan}/edit', 'TabunganController@edit')->name('tabungan.edit');
Route::patch('/tabungan/{Tabungan}/edit', 'TabunganController@update')->name('tabungan.update');
Route::get('/tabungan/detail/{idN}/cetak_pdf', 'TabunganController@cetak_pdf')->name('tabungan.cetak');

//user
Route::get('/user', 'UserController@index')->name('user.index')->middleware('roles');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/create', 'UserController@store')->name('user.store');
Route::get('/user/{User}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/user/{User}/edit', 'UserController@update')->name('user.update');
Route::delete('/user/{User}/delete', 'UserController@destroy')->name('user.delete');

//laporan
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::get('/laporan/tabungan', 'LaporanController@indexT')->name('laporan.indexT');
Route::get('/laporan/nasabah', 'LaporanController@indexN')->name('laporan.indexN');
Route::get('/laporan/laporan_nasabah_pdf', 'LaporanController@laporan_nasabah_pdf')->name('laporan.nasabah');
Route::get('/laporan/laporan_tabungan_pdf', 'LaporanController@laporan_tabungan_pdf')->name('laporan.tabungan');