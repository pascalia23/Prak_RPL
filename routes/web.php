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
/*
*/

use App\Signature;
use App\User;

Route::get('/', function () {
   return view('auth.login');
});
Route::get('/logout', function () {
   Auth::logout();
   return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function () {
   Route::get('dashboard', 'AdminPageController@index')->name('admin.dashboard');
   Route::get('/user', 'AdminPageController@user')->name('admin.user');
   Route::post('/user-import', 'AdminPageController@importUser')->name('admin.user.import');
   Route::put('/user-update/{user}', 'AdminPageController@updateUser')->name('admin.user.update');
   Route::delete('/user-destroy/{user}', 'AdminPageController@destroyUser')->name('admin.user.destroy');
   Route::resource('signature', SignatureController::class);
});

Route::prefix('/dosen')->middleware(['auth', 'dosen'])->group(function () {
   Route::get('dashboard', 'DosenPageController@index')->name('dosen.dashboard');
});

Route::prefix('/mahasiswa')->middleware(['auth', 'mahasiswa'])->group(function () {
   Route::get('dashboard', 'MahasiswaPageController@index')->name('mahasiswa.dashboard');
});

Route::middleware(['auth'])->group(function () {
   Route::get('surat-masuk', 'PageController@suratMasuk')->name('surat.masuk');
   Route::get('buat-surat', 'PageController@buatSurat')->name('buat.surat');
   Route::post('kirim-surat', 'PageController@kirimSurat')->name('kirim.surat');
   Route::put('validasi-surat', 'PageController@validasiSurat')->name('validasi.surat')->middleware(['admin']);
   Route::delete('hapus-surat', 'PageController@hapusSurat')->name('hapus.surat');
   Route::put('change-password', 'PageController@updatePassword')->name('update.password');
   Route::post('edit-surat', 'PageController@editSurat')->name('edit.surat');
   Route::post('update-surat', 'PageController@updateSurat')->name('update.surat');
   Route::get('download/{surat}', 'PageController@download')->name('surat.download');
   Route::get('surat-keluar', 'PageController@suratKeluar')->name('surat.keluar');
   Route::get('profile', 'PageController@profile')->name('user.profile');
   Route::get('dashboard', 'PageController@dashboard')->name('user.dashboard');
});










// Route::get('/', 'HomeController@index');
/*
Route::get('/user', 'UserController@index');
Route::get('/user-register', 'UserController@create');
Route::post('/user-register', 'UserController@store');
Route::get('/user-edit/{id}', 'UserController@edit');
*/
// Route::resource('user', 'UserController');

// Route::resource('buku', 'BukuController');
// Route::post('filter/custom', 'BukuController@custom')->name('filter.custom');
// Route::post('filter/', 'BukuController@filter')->name('filter');
// Route::get('buku/filter/{name}', 'BukuController@filterName')->name('filter.name');
// Route::get('/export/{type}', 'LaporanController@export')->name('export.excel');
// Route::get('/exportDoc/{type}', 'LaporanController@exportDoc')->name('export.doc');
// Route::get('/exportDoc/{from}/{to}', 'LaporanController@exportDocCustom')->name('export.doc.custom');

// Route::get('/laporan/mingguan', 'LaporanController@minggu')->name('laporan.minggu');
// Route::get('/laporan/bulanan', 'LaporanController@bulan')->name('laporan.bulan');
// Route::get('/laporan/tahunan', 'LaporanController@tahun')->name('laporan.tahun');