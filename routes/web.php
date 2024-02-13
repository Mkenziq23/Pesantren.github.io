<?php

use App\Models\Pegawai;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use App\Models\Riwayat_Jabatan;
use App\Models\Riwayat_Pendidikan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\DataKeluargaController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\JabatanPegawaiController;
use App\Http\Controllers\PresensiKhususController;
use App\Http\Controllers\RiwayatJabatanController;
use App\Http\Controllers\RiwayatMengajarController;
use App\Http\Controllers\DataAreaPresensiController;
use App\Http\Controllers\DataKitabController;
use App\Http\Controllers\DataLiburPresensiController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\JamMasukdanPulangController;
use App\Http\Controllers\JamPelajaranController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\RiwayatPendidikanController;
use App\Http\Controllers\RiwayatSeminardanPelatihanController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TahunAjaranController;

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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard',[
            "tittle" => "Dashboard"
        ]);
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile', [
            "tittle" => "Profile"
        ]);
	})->name('profile');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables',[
            "tittle" => "Tables"
        ]);
	})->name('tables');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');


    Route::get('kepegawaian/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('kepegawaian/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::get('showpegawai/{pegawai:nama_lengkap}', [PegawaiController::class, 'show'])
        ->name('pegawai.show');
    Route::post('/kepegawaian/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('editpegawai/{pegawai:nama_lengkap}', [PegawaiController::class, 'edit'])
        ->name('pegawai.edit');
    Route::put('editpegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('kepegawaian/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::get('kepegawaian/pegawai/export', [PegawaiController::class, 'export'])->name('pegawai.export');
    Route::post('kepegawaian/pegawai/import', [PegawaiController::class, 'import'])->name('pegawai.import');


    Route::resource('kepegawaian/dataareapresensi', DataAreaPresensiController::class)->except(['show']);
    Route::get('kepegawaian/dataareapresensi/export', [DataAreaPresensiController::class, 'export'])->name('dataareapresensi.export');

    Route::resource('kepegawaian/presensikhusus', PresensiKhususController::class)->except(['show']);
    Route::get('kepegawaian/presensikhusus/export', [PresensiKhususController::class, 'export'])->name('presensikhusus.export');

    Route::resource('kepegawaian/data-libur-presensi', DataLiburPresensiController::class)->except(['show']);
    Route::get('kepegawaian/data-libur-presensi/export', [DataLiburPresensiController::class, 'export'])->name('dataliburpresensi.export');

    Route::resource('kepegawaian/jam-masuk-dan-pulang', JamMasukdanPulangController::class)->except(['show']);
    Route::delete('kepegawaian/jam-masuk-dan-pulang', [JamMasukdanPulangController::class, 'destroyAll'])->name('jam-masuk-dan-pulang.destroyall');

    Route::resource('akademik/tahun-ajaran', TahunAjaranController::class);
    Route::post('akademik/tahun-ajaran/{id}/activate', [TahunAjaranController::class, 'activateStatus']);
    Route::resource('akademik/semester', SemesterController::class);
    Route::resource('akademik/Mata-Pelajaran', MatapelajaranController::class);
    Route::resource('akademik/Data-Kitab', DataKitabController::class);
    Route::resource('akademik/Jam-Pelajaran', JamPelajaranController::class);
    Route::resource('akademik/Jadwal-Pelajaran', JadwalPelajaranController::class);

});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session',[
        "tittle" => "Login"
    ]);
})->name('login');


Route::resource('kesantrian/kamar', KamarController::class);
Route::get('get-kamar', [KamarController::class, 'getKamar'])->name('get-kamar');
Route::resource('kesantrian/santri', SantriController::class);
Route::get('get-santri', [SantriController::class, 'getSantri'])->name('get-santri');

Route::resource('kepegawaian/jabatan', JabatanPegawaiController::class);


Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatpendidikan', [RiwayatPendidikanController::class, 'riwayatPendidikanStore'])->name('riwayatPendidikanStore');
Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatpendidikan/{riwayatPendidikan}', [RiwayatPendidikanController::class, 'riwayatPendidikanUpdate'])->name('riwayatPendidikanUpdate');
Route::delete('showpegawai/{pegawai:nama_lengkap}/{riwayatPendidikan}', [RiwayatPendidikanController::class, 'destroy'])
->name('destroy');


Route::post('showpegawai/{pegawai:nama_lengkap}/datakeluarga', [DataKeluargaController::class, 'dataKeluargaStore'])
    ->name('dataKeluargaStore');
Route::post('showpegawai/{pegawai:nama_lengkap}/datakeluarga/{dataKeluarga}', [DataKeluargaController::class, 'dataKeluargaUpdate'])
    ->name('dataKeluargaUpdate');
Route::delete('showpegawai/{pegawai:nama_lengkap}/datakeluarga/{dataKeluarga}', [DataKeluargaController::class, 'destroy'])
    ->name('dataKeluarga.destroy');

Route::post('showpegawai/{pegawai:nama_lengkap}/penghargaan', [PenghargaanController::class, 'penghargaanStore'])
    ->name('penghargaanStore');
Route::post('showpegawai/{pegawai:nama_lengkap}/penghargaan/{penghargaan}', [PenghargaanController::class, 'penghargaanUpdate'])
    ->name('penghargaanUpdate');
Route::delete('showpegawai/{pegawai:nama_lengkap}/penghargaan/{penghargaan}', [PenghargaanController::class, 'destroy'])
    ->name('penghargaan.destroy');

Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatmengajar', [RiwayatMengajarController::class, 'riwayatMengajarStore'])
    ->name('riwayatMengajarStore');
Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatmengajar/{riwayatMengajar}', [RiwayatMengajarController::class, 'riwayatMengajarUpdate'])
    ->name('riwayatMengajarUpdate');
Route::delete('showpegawai/{pegawai:nama_lengkap}/riwayatmengajar/{riwayatMengajar}', [RiwayatMengajarController::class, 'destroy'])
    ->name('riwayatMengajar.destroy');

Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatseminardanpelatihan', [RiwayatSeminardanPelatihanController::class, 'riwayatSeminardanPelatihanStore'])
    ->name('riwayatSeminardanPelatihanStore');
Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatseminardanpelatihan/{riwayatSeminardanPelatihan}', [RiwayatSeminardanPelatihanController::class, 'riwayatSeminardanPelatihanUpdate'])
    ->name('riwayatSeminardanPelatihanUpdate');
Route::delete('showpegawai/{pegawai:nama_lengkap}/riwayatseminardanpelatihan/{riwayatSeminardanPelatihan}', [RiwayatSeminardanPelatihanController::class, 'destroy'])
    ->name('riwayatSeminardanPelatihan.destroy');

Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatjabatan', [RiwayatJabatanController::class, 'riwayatJabatanStore'])
    ->name('riwayatJabatanStore');
Route::post('showpegawai/{pegawai:nama_lengkap}/riwayatjabatan/{riwayatJabatan}', [RiwayatJabatanController::class, 'riwayatJabatanUpdate'])
    ->name('riwayatJabatanUpdate');
Route::delete('showpegawai/{pegawai:nama_lengkap}/riwayatjabatan/{riwayatJabatan}', [riwayatJabatanController::class, 'destroy'])
    ->name('riwayatJabatan.destroy');
