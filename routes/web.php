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
Route::get('/kelompok', 'Mah@index')->name('/kelompok');
Route::get('/detail_kelompok', 'Mah@detailkelompok')->name('/detail_kelompok');
Route::get('/detail_nilai', 'Mah@detailnilai')->name('/detail_nilai');
Route::get('/detail_nilai_penguji', 'Mah@nilaipenguji')->name('/detail_nilai_penguji');
Route::get('/input_nilai', 'Mah@inputnilai_dosen')->name('/input_nilai');
Route::get('/inputNilai_penguji', 'Mah@inputNilai_penguji')->name('/inputNilai_penguji');
Route::get('/dashboard', 'Mah@dashboard')->name('/dashboard');
Route::get('/laporan', 'Mah@laporan')->name('/laporan');
Route::get('/nilai_akhir', 'Mah@nilai_akhir')->name('/nilai_akhir');
Route::get('/login', 'Mah@logins')->name('/logins');
Route::get('/edit_profil', 'Mah@edit_profil')->name('/edit_profil');
Route::get('/add_lowongan', 'Mah@add_lowongan')->name('/add_lowongan');
Route::get('/lowongan', 'Mah@lowongan')->name('/lowongan');

// Route::get('/list_kegiatan', 'Mah@list_kegiatan')->name('/list_kegiatan');
Route::get('/list_kegiatanHarian', 'Mah@list_kegiatanHarian')->name('/list_kegiatanHarian');
Route::get('/acckegiatan/{id}/{tipe}', 'BukuHarianController@acckegiatan')->name('acckegiatan');
Route::get('/list_kegiatan/{id_mahasiswa}', 'BukuHarianController@index')->name('bukuharian.index');

Route::get('/profile', 'ProfileController@index')->name('/profile');
Route::get('/edit_profil/{id}','ProfileController@edit')->name('/edit_profil');
Route::post('/update_profil/{id}','ProfileController@update')->name('profil-update');

// tombolsave 
Route::get('/post/add/', 'ProfileController@add')->name('post.add');
Route::post('/profile/{id}', 'ProfileController@updateAvatar')->name('update');

//tombol acc lamaran
Route::get('/daftar_lamaran', 'Mah@daftar_lamaran')->name('/daftar_lamaran');
Route::get('/acclamaran/{id}/{tipe}', 'DaftarLamaran@acclamaran')->name('acclamaran');
Route::get('/daftar_lamaran/{id_kelompok}', 'DaftarLamaranController@index')->name('bukuharian.index');

Route::group(['prefix' => '/table'], function () {
    Route::get('/data-group', 'GroupController@getData');
    Route::get('/data-detailGroup', 'DetailGroupController@getData');
    Route::get('/data-daftarlowongan', 'LowonganController@getData');
    Route::get('/data-listKegiatanHarian', 'BukuHarianController@getDataMahasiswa');
    Route::get('/data-bukuharian-mahasiswa', 'BukuHarianController@getDataMahasiswa');
    Route::get('/data-bukuharian/{id_mahasiswa}', 'BukuHarianController@getData');
    Route::get('/data-lamaran', 'DaftarLamaranController@getData');
    Route::get('/data-inputnilai', 'inputNilaiController@getData');
    
  
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

