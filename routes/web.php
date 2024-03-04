<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ViewControllerUser;
use App\Http\Controllers\Admin\ViewControllerAdmin;
use App\Http\Controllers\Pembimbing\ViewControllerPembimbing;
use App\Http\Controllers\Pembimbing\ViewControllerPembimbingIndustri;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(HomeController::class)->group(function(){
	Route::get('/', 'index')->name('home');
	Route::get('/akademik', 'akademik')->name('akademik');
	Route::get('/sejarah', 'sejarah')->name('sejarah');
	Route::get('/visi-misi', 'visimisi')->name('visimisi');
	Route::get('/guru-staff', 'gurustaff')->name('gurustaff');
	Route::get('/program-studi', 'programstudi')->name('programstudi');
	Route::get('/calendar-akademik/json', 'jsonCalendar')->name('calendar.json');
	Route::get('/kesiswaan', 'kesiswaan')->name('kesiswaan');
	Route::get('/berita', 'berita')->name('berita');
	Route::get('/berita/view/{id}', 'viewberita');
	Route::get('/prestasi', 'prestasi')->name('prestasi');
	Route::get('/admin', 'admin')->name('admin');
	Route::get('/pembimbing', 'pembimbing')->name('pembimbing');
	Route::get('/pembimbing-industri-pkl', 'pembimbingindustripkl')->name('pembimbingindustripkl');
});
Route::controller(AuthController::class)->group(function(){
	Route::post('/register-pkl', 'daftarpkl')->name('daftar.pkl.siswa');
	Route::post('/login-pkl', 'loginpkl')->name('login.pkl');
	Route::get('/logout', 'logout')->name('logout.pkl');
	Route::post('/login-admin', 'loginadmin')->name('login.admin');
	Route::get('/logout-admin', 'logoutadmin')->name('logoutadmin');
	Route::post('/login-pembimbing', 'loginpembimbing')->name('login.pembimbing');
	Route::get('/logout-pembimbing', 'logoutpembimbing')->name('logoutpembimbing');
	Route::post('/login-pembimbing', 'loginpembimbingindustri')->name('login.pembimbingindustripkl');
	Route::get('/logout-pembimbing', 'logoutpembimbingindustri')->name('logout.pembimbingindustripkl');
});
Route::controller(ViewControllerUser::class)->group(function(){
	Route::prefix('/siswa-pkl')->group(function(){
		Route::get('/', 'dashboard')->name('siswa.dashboard');
		Route::prefix('/profil')->group(function(){
			Route::get('/', 'profil')->name('siswa.profil');
			Route::get('/edit', 'editprofil')->name('siswa.editprofil');
			Route::post('/update', 'updateprofil')->name('siswa.updateprofil');
		});
		Route::prefix('/userdata')->group(function(){
			Route::get('/', 'userdata')->name('siswa.userdata');
		});
		Route::prefix('/absensi')->group(function(){
			Route::get('/', 'absensi')->name('siswa.absensi');
			Route::post('/store', 'storeabsensi')->name('siswa.storeabsensi');
		});
		Route::prefix('/laporan')->group(function(){
			Route::get('/', 'laporan')->name('siswa.laporan');
		});
		Route::prefix('/penilaian')->group(function(){
			Route::get('/', 'penilaian')->name('siswa.penilaian');
		});
	});
});
Route::controller(ViewControllerAdmin::class)->group(function(){
	Route::prefix('/admin')->group(function(){
		Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
		Route::prefix('/kelola-user')->group(function(){
			Route::get('/', 'kelolauser')->name('admin.user');
			Route::get('/aktifkan/{id}', 'aktifkanuser');
			Route::get('/view/{id}', 'viewuser');
			Route::get('/delete/{id}', 'deleteuser');
		});
		Route::prefix('/kelola-admin')->group(function(){
			Route::get('/', 'kelolaadmin')->name('admin.admin');
			Route::post('/store', 'addadmin')->name('admin.add');
			Route::get('/delete/{id}', 'deleteadmin');
		});
		Route::prefix('/pengajuan-pkl')->group(function(){
			Route::get('/', 'pengajuanpkl')->name('admin.pengajuanpkl');
			Route::post('/update', 'updatepkl')->name('update.member.pkl');
			Route::get('/tolak/{id}', 'tolakpkl');
		});
		Route::prefix('/absensi-pkl')->group(function(){
			Route::get('/', 'absensipkl')->name('admin.absensipkl');
			Route::get('/lihat-absensi/{id}', 'lihatabsensi');
		});
		Route::prefix('/pembimbing-industri-pkl')->group(function(){
			Route::get('/', 'industripkl')->name('admin.industripkl');
			Route::post('/store', 'addpembimbingindustri')->name('admin.add.pembimbingindustripkl');
			Route::get('/delete/{id}', 'deletepembimbingindustri');
			Route::get('/json', 'jsonbyidpembimbing')->name('admin.json.pembimbing');
			Route::post('/update', 'updatepembimbingindustri')->name('admin.update.pembimbingindustripkl');
		});
		Route::prefix('/penilaian')->group(function(){
			Route::get('/', 'penilaian')->name('admin.penilaian');
			Route::get('/lihat-penilaian/{id}', 'lihatpenilaian');
		});
	});
});
Route::controller(ViewControllerPembimbing::class)->group(function(){
	Route::prefix('/pembimbing')->group(function(){
		Route::get('/dashboard', 'dashboard')->name('pembimbing.dashboard');
		Route::prefix('/profil')->group(function(){
			Route::get('/', 'profilpembimbing')->name('profil.pembimbing');
			Route::post('/update', 'updatepembimbing')->name('update.pembimbing');
		});
		Route::prefix('/absensi-pkl')->group(function(){
			Route::get('/', 'absensipkl')->name('pembimbing.absensipkl');
			Route::get('/lihat-absensi/{id}', 'lihatabsensi');
		});
		Route::prefix('/penilaian')->group(function(){
			Route::get('/', 'penilaian')->name('pembimbing.penilaian');
			Route::get('/lihat-penilaian/{id}', 'lihatpenilaian');
			Route::get('/update-penilaian/{id}', 'editpenilaian');
			Route::post('/update-data', 'updatepenilaian')->name('pembimbing.update');
			Route::get('/hapus-penilaian/{id}', 'hapuspenilaian');
		});
	});
});
Route::controller(ViewControllerPembimbingIndustri::class)->group(function(){
	Route::prefix('/pembimbing-industri-pkl')->group(function(){
		Route::get('/dashboard', 'dashboard')->name('industri.pembimbing.dashboard');
		Route::prefix('/absensi-pkl')->group(function(){
			Route::get('/', 'absensipkl')->name('industri.pembimbing.absensipkl');
			Route::get('/lihat-absensi/{id}', 'lihatabsensi');
		});
		Route::prefix('/penilaian')->group(function(){
			Route::get('/', 'penilaian')->name('industri.pembimbing.penilaian');
			Route::get('/lihat-penilaian/{id}', 'lihatpenilaian');
			Route::get('/update-penilaian/{id}', 'editpenilaian');
			Route::post('/update-data', 'updatepenilaian')->name('industri.pembimbing.update');
			Route::get('/hapus-penilaian/{id}', 'hapuspenilaian');
		});
	});
});