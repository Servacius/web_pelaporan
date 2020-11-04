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
    return view('welcome');
});

Auth::routes();
Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
    })->name('upgrade');

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('/admin_home', [App\Http\Controllers\HomeController::class, 'admin_index'])->middleware('role:1')->name('admin_home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:2')->name('home');

    // Data pelaporan routes
    Route::get('/data-barang-hilang', [App\Http\Controllers\PelaporanController::class, 'indexBarangHilang'])->name('data-barang-hilang');
    Route::get('/data-barang-rusak', [App\Http\Controllers\PelaporanController::class, 'indexBarangRusak'])->name('data-barang-rusak');
    Route::get('/data-barang-temuan', [App\Http\Controllers\PelaporanController::class, 'indexBarangTemuan'])->name('data-barang-temuan');

    // Master data routes
    Route::resource('kategori', 'App\Http\Controllers\KategoriController');
    Route::resource('divisi', 'App\Http\Controllers\DivisiController');
    Route::resource('lokasi', 'App\Http\Controllers\LokasiController');

    // Report routes
    // Route::resource('report', 'App\Http\Controllers\ReportController');
    Route::get('report-hilang', ['as' => 'report.report_hilang', 'uses' => 'App\Http\Controllers\ReportController@index_report_hilang']);
    Route::get('report-rusak', ['as' => 'report.report_rusak', 'uses' => 'App\Http\Controllers\ReportController@index_report_rusak']);
    Route::get('report-temuan', ['as' => 'report.report_temuan', 'uses' => 'App\Http\Controllers\ReportController@index_report_temuan']);
    Route::get('report-export/{id}', ['as' => 'report.export', 'uses' => 'App\Http\Controllers\ReportController@export']);

    // Histori routes
    // Data pelaporan routes
    Route::get('histori-pengajuan-hilang', ['as' => 'histori.pengajuan_hilang', 'uses' => 'App\Http\Controllers\PelaporanController@indexHistoriHilang']);
    Route::get('edit-pengajuan-hilang/{id}', ['as' => 'histori.edit_pengajuan_hilang', 'uses' => 'App\Http\Controllers\PelaporanController@editPengajuanHilang']);
    Route::get('histori-pengajuan-rusak', ['as' => 'histori.pengajuan_rusak', 'uses' => 'App\Http\Controllers\PelaporanController@indexHistoriRusak']);
    Route::get('edit-pengajuan-rusak/{id}', ['as' => 'histori.edit_pengajuan_rusak', 'uses' => 'App\Http\Controllers\PelaporanController@editPengajuanRusak']);
    Route::get('histori-pengajuan-temuan', ['as' => 'histori.pengajuan_temuan', 'uses' => 'App\Http\Controllers\PelaporanController@indexHistoriTemuan']);
    Route::get('edit-pengajuan-temuan/{id}', ['as' => 'histori.edit_pengajuan_temuan', 'uses' => 'App\Http\Controllers\PelaporanController@editPengajuanTemuan']);
});

