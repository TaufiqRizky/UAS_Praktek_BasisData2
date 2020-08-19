<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin/')->name('admin.')->group(function(){
Route::get('dashboard','AdminController@index')->name('index');

Route::get('fakultas','AdminController@fakultas')->name('fakultas');
Route::post('fakultas/store','AdminController@Cfakultas')->name('fakultas.store');
Route::post('fakultas/update','AdminController@Ufakultas')->name('fakultas.update');
Route::delete('fakultas/destroy/{id}','AdminController@Dfakultas')->name('fakultas.destroy');

Route::get('jurusan','AdminController@jurusan')->name('jurusan');
Route::post('jurusan/store','AdminController@Cjurusan')->name('jurusan.store');
Route::post('jurusan/update','AdminController@Ujurusan')->name('jurusan.update');
Route::delete('jurusan/destroy/{id}','AdminController@Djurusan')->name('jurusan.destroy');

Route::get('matkul','AdminController@matkul')->name('matkul');
Route::post('matkul/store','AdminController@Cmatkul')->name('matkul.store');
Route::post('matkul/update','AdminController@Umatkul')->name('matkul.update');
Route::delete('matkul/destroy/{id}','AdminController@Dmatkul')->name('matkul.destroy');

Route::get('jadwal','AdminController@jadwal')->name('jadwal');
Route::post('jadwal/store','AdminController@Cjadwal')->name('jadwal.store');
Route::post('jadwal/update','AdminController@Ujadwal')->name('jadwal.update');
Route::delete('jadwal/destroy/{id}','AdminController@Djadwal')->name('jadwal.destroy');

Route::get('kelas','AdminController@kelas')->name('kelas');
Route::post('kelas/store','AdminController@Ckelas')->name('kelas.store');
Route::post('kelas/update','AdminController@Ukelas')->name('kelas.update');
Route::delete('kelas/destroy/{id}','AdminController@Dkelas')->name('kelas.destroy');

Route::get('ruangan','AdminController@ruangan')->name('ruangan');
Route::post('ruangan/store','AdminController@Cruangan')->name('ruangan.store');
Route::post('ruangan/update','AdminController@Uruangan')->name('ruangan.update');
Route::delete('ruangan/destroy/{id}','AdminController@Druangan')->name('ruangan.destroy');

Route::resource('mahasiswa', 'CRUDmhs');
Route::resource('dosen', 'CRUDdosen');

});

Route::prefix('mahasiswa/')->name('mhs.')->group(function(){
Route::get('dashboard','MahasiswaController@index')->name('index');

});