<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\admin\DataPegawaiController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\PegawaiAuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\Admin\BiodataController as AdminBiodataController;
use App\Http\Controllers\Admin\PendidikanController as AdminPendidikanController;
use App\Http\Controllers\Admin\KursusController as AdminKursusController;
use App\Http\Controllers\Admin\KepangkatanController as AdminKepangkatanController;
use App\Http\Controllers\Admin\JabatanController as AdminJabatanController;
use App\Http\Controllers\Admin\PenghargaanController as AdminPenghargaanController;
use App\Http\Controllers\Admin\PengalamanController as AdminPengalamanController;
use App\Http\Controllers\Admin\Keluarga_pasanganController as AdminKeluarga_pasanganController;
use App\Http\Controllers\Admin\Keluarga_anakController as AdminKeluarga_anakController;
use App\Http\Controllers\Admin\Keluarga_orangtuaController as AdminKeluarga_orangtuaController;
use App\Http\Controllers\Admin\Keluarga_saudaraController as AdminKeluarga_saudaraController;
use App\Http\Controllers\Admin\OrganisasiController as AdminOrganisasiController;
use App\Http\Controllers\AkunPegawaiController;
use App\Http\Controllers\HapusAkunPegawaiController;
use App\Http\Controllers\Pegawai\BiodataController as PegawaiBiodataController;
use App\Http\Controllers\Pegawai\PendidikanController as PegawaiPendidikanController;
use App\Http\Controllers\Pegawai\KursusController as PegawaiKursusController;
use App\Http\Controllers\Pegawai\KepangkatanController as PegawaiKepangkatanController;
use App\Http\Controllers\Pegawai\JabatanController as PegawaiJabatanController;
use App\Http\Controllers\Pegawai\PenghargaanController as PegawaiPenghargaanController;
use App\Http\Controllers\Pegawai\PengalamanController as PegawaiPengalamanController;
use App\Http\Controllers\Pegawai\Keluarga_pasanganController as PegawaiKeluarga_pasanganController;
use App\Http\Controllers\Pegawai\Keluarga_anakController as PegawaiKeluarga_anakController;
use App\Http\Controllers\Pegawai\Keluarga_orangtuaController as PegawaiKeluarga_orangtuaController;
use App\Http\Controllers\Pegawai\Keluarga_saudaraController as PegawaiKeluarga_saudaraController;
use App\Http\Controllers\Pegawai\OrganisasiController as PegawaiOrganisasiController;


Route::get('/', [PegawaiAuthController::class, 'showLoginForm'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/datapegawai', [DataPegawaiController::class, 'dataPegawai'])->name('admin.dataPegawai');
        Route::get('/datapegawai/{nip}', [DataPegawaiController::class, 'show'])->name('admin.dataPegawai.show');
        
        Route::prefix('biodata')->group(function () {
            Route::get('/create', [AdminBiodataController::class, 'create'])->name('admin.biodata.create');
            Route::post('/store', [AdminBiodataController::class, 'store'])->name('admin.biodata.store');
            Route::get('/{nip}', [AdminBiodataController::class, 'index'])->name('admin.biodata.index');
            Route::get('/edit/{nip}', [AdminBiodataController::class, 'edit'])->name('admin.biodata.edit'); 
            Route::put('/update/{nip}', [AdminBiodataController::class, 'update'])->name('admin.biodata.update'); 
        });

        Route::prefix('pendidikan')->group(function () {
            Route::get('/{nip}', [AdminPendidikanController::class, 'index'])->name('admin.pendidikan.index');
            Route::get('/create/{nip}', [AdminPendidikanController::class, 'create'])->name('admin.pendidikan.create');
            Route::post('/store', [AdminPendidikanController::class, 'store'])->name('admin.pendidikan.store');
            Route::get('/edit/{id}', [AdminPendidikanController::class, 'edit'])->name('admin.pendidikan.edit');
            Route::put('/update/{id}', [AdminPendidikanController::class, 'update'])->name('admin.pendidikan.update');
            Route::delete('/destroy/{id}', [AdminPendidikanController::class, 'destroy'])->name('admin.pendidikan.destroy');
        });

        Route::prefix('kursus')->group(function () {
            Route::get('/{nip}', [AdminKursusController::class, 'index'])->name('admin.kursus.index');
            Route::get('/create/{nip}', [AdminKursusController::class, 'create'])->name('admin.kursus.create');
            Route::post('/store', [AdminKursusController::class, 'store'])->name('admin.kursus.store');
            Route::get('/edit/{id}', [AdminKursusController::class, 'edit'])->name('admin.kursus.edit');
            Route::put('/update/{id}', [AdminKursusController::class, 'update'])->name('admin.kursus.update');
            Route::delete('/destroy/{id}', [AdminKursusController::class, 'destroy'])->name('admin.kursus.destroy');
        });

        Route::prefix('kepangkatan')->group(function () {
            Route::get('/{nip}', [AdminKepangkatanController::class, 'index'])->name('admin.kepangkatan.index');
            Route::get('/create/{nip}', [AdminKepangkatanController::class, 'create'])->name('admin.kepangkatan.create');
            Route::post('/store', [AdminKepangkatanController::class, 'store'])->name('admin.kepangkatan.store');
            Route::get('/edit/{id}', [AdminKepangkatanController::class, 'edit'])->name('admin.kepangkatan.edit');
            Route::put('/update/{id}', [AdminKepangkatanController::class, 'update'])->name('admin.kepangkatan.update');
            Route::delete('/destroy/{id}', [AdminKepangkatanController::class, 'destroy'])->name('admin.kepangkatan.destroy');
        });

        Route::prefix('jabatan')->group(function () {
            Route::get('/{nip}', [AdminJabatanController::class, 'index'])->name('admin.jabatan.index');
            Route::get('/create/{nip}', [AdminJabatanController::class, 'create'])->name('admin.jabatan.create');
            Route::post('/store', [AdminJabatanController::class, 'store'])->name('admin.jabatan.store');
            Route::get('/edit/{id}', [AdminJabatanController::class, 'edit'])->name('admin.jabatan.edit');
            Route::put('/update/{id}', [AdminJabatanController::class, 'update'])->name('admin.jabatan.update');
            Route::delete('/destroy/{id}', [AdminJabatanController::class, 'destroy'])->name('admin.jabatan.destroy');
        });

        Route::prefix('penghargaan')->group(function () {
            Route::get('/{nip}', [AdminPenghargaanController::class, 'index'])->name('admin.penghargaan.index');
            Route::get('/create/{nip}', [AdminPenghargaanController::class, 'create'])->name('admin.penghargaan.create');
            Route::post('/store', [AdminPenghargaanController::class, 'store'])->name('admin.penghargaan.store');
            Route::get('/edit/{id}', [AdminPenghargaanController::class, 'edit'])->name('admin.penghargaan.edit');
            Route::put('/update/{id}', [AdminPenghargaanController::class, 'update'])->name('admin.penghargaan.update');
            Route::delete('/destroy/{id}', [AdminPenghargaanController::class, 'destroy'])->name('admin.penghargaan.destroy');
        });

        Route::prefix('pengalaman')->group(function () {
            Route::get('/{nip}', [AdminPengalamanController::class, 'index'])->name('admin.pengalaman.index');
            Route::get('/create/{nip}', [AdminPengalamanController::class, 'create'])->name('admin.pengalaman.create');
            Route::post('/store', [AdminPengalamanController::class, 'store'])->name('admin.pengalaman.store');
            Route::get('/edit/{id}', [AdminPengalamanController::class, 'edit'])->name('admin.pengalaman.edit');
            Route::put('/update/{id}', [AdminPengalamanController::class, 'update'])->name('admin.pengalaman.update');
            Route::delete('/destroy/{id}', [AdminPengalamanController::class, 'destroy'])->name('admin.pengalaman.destroy');
        });

        Route::prefix('keluarga')->group(function () {
            Route::get('/{nip}', [AdminKeluarga_pasanganController::class, 'index'])->name('admin.keluarga.index');
            Route::get('/create/{nip}', [AdminKeluarga_pasanganController::class, 'create'])->name('admin.keluarga.create');
            Route::post('/store', [AdminKeluarga_pasanganController::class, 'store'])->name('admin.keluarga.store');
            Route::get('/edit/{id}', [AdminKeluarga_pasanganController::class, 'edit'])->name('admin.keluarga.edit');
            Route::put('/update/{id}', [AdminKeluarga_pasanganController::class, 'update'])->name('admin.keluarga.update');
            Route::delete('/destroy/{id}', [AdminKeluarga_pasanganController::class, 'destroy'])->name('admin.keluarga.destroy');
        });

        Route::prefix('keluarga_anak')->group(function () {
            Route::get('/{nip}', [AdminKeluarga_anakController::class, 'index'])->name('admin.keluarga_anak.index');
            Route::get('/create/{nip}', [AdminKeluarga_anakController::class, 'create'])->name('admin.keluarga_anak.create');
            Route::post('/store', [AdminKeluarga_anakController::class, 'store'])->name('admin.keluarga_anak.store');
            Route::get('/edit/{id}', [AdminKeluarga_anakController::class, 'edit'])->name('admin.keluarga_anak.edit');
            Route::put('/update/{id}', [AdminKeluarga_anakController::class, 'update'])->name('admin.keluarga_anak.update');
            Route::delete('/destroy/{id}', [AdminKeluarga_anakController::class, 'destroy'])->name('admin.keluarga_anak.destroy');
        });

        Route::prefix('keluarga_orangtua')->group(function () {
            Route::get('/{nip}', [AdminKeluarga_orangtuaController::class, 'index'])->name('admin.keluarga_orangtua.index');
            Route::get('/create/{nip}', [AdminKeluarga_orangtuaController::class, 'create'])->name('admin.keluarga_orangtua.create');
            Route::post('/store', [AdminKeluarga_orangtuaController::class, 'store'])->name('admin.keluarga_orangtua.store');
            Route::get('/edit/{id}', [AdminKeluarga_orangtuaController::class, 'edit'])->name('admin.keluarga_orangtua.edit');
            Route::put('/update/{id}', [AdminKeluarga_orangtuaController::class, 'update'])->name('admin.keluarga_orangtua.update');
            Route::delete('/destroy/{id}', [AdminKeluarga_orangtuaController::class, 'destroy'])->name('admin.keluarga_orangtua.destroy');
        });

        Route::prefix('keluarga_saudara')->group(function () {
            Route::get('/{nip}', [AdminKeluarga_saudaraController::class, 'index'])->name('admin.keluarga_saudara.index');
            Route::get('/create/{nip}', [AdminKeluarga_saudaraController::class, 'create'])->name('admin.keluarga_saudara.create');
            Route::post('/store', [AdminKeluarga_saudaraController::class, 'store'])->name('admin.keluarga_saudara.store');
            Route::get('/edit/{id}', [AdminKeluarga_saudaraController::class, 'edit'])->name('admin.keluarga_saudara.edit');
            Route::put('/update/{id}', [AdminKeluarga_saudaraController::class, 'update'])->name('admin.keluarga_saudara.update');
            Route::delete('/destroy/{id}', [AdminKeluarga_saudaraController::class, 'destroy'])->name('admin.keluarga_saudara.destroy');
        });

        Route::prefix('organisasi')->group(function () {
            Route::get('/{nip}', [AdminOrganisasiController::class, 'index'])->name('admin.organisasi.index');
            Route::get('/create/{nip}', [AdminOrganisasiController::class, 'create'])->name('admin.organisasi.create');
            Route::post('/store', [AdminOrganisasiController::class, 'store'])->name('admin.organisasi.store');
            Route::get('/edit/{id}', [AdminOrganisasiController::class, 'edit'])->name('admin.organisasi.edit');
            Route::put('/update/{id}', [AdminOrganisasiController::class, 'update'])->name('admin.organisasi.update');
            Route::delete('/destroy/{id}', [AdminOrganisasiController::class, 'destroy'])->name('admin.organisasi.destroy');
        });

        Route::get('/akun-pegawai', [AkunPegawaiController::class, 'index'])->name('admin.akun-pegawai.index');
        Route::get('/akun-pegawai/create', [AkunPegawaiController::class, 'create'])->name('admin.akun-pegawai.create');
        Route::post('/akun-pegawai', [AkunPegawaiController::class, 'store'])->name('admin.akun-pegawai.store');
        Route::delete('/akun-pegawai/{nip}', [AkunPegawaiController::class, 'destroy'])->name('admin.akun-pegawai.destroy');
       
    });
});

// Pegawai Routes
Route::prefix('pegawai')->group(function () {
    Route::get('login', [PegawaiAuthController::class, 'showLoginForm'])->name('pegawai.login');
    Route::post('login', [PegawaiAuthController::class, 'login'])->name('pegawai.login.submit');
    Route::post('logout', [PegawaiAuthController::class, 'logout'])->name('pegawai.logout');

    Route::middleware('auth:pegawai')->group(function () {
        Route::prefix('biodata')->group(function () {
            Route::get('/', [PegawaiBiodataController::class, 'index'])->name('pegawai.biodata.index');
            Route::get('/edit', [PegawaiBiodataController::class, 'edit'])->name('pegawai.biodata.edit');
            Route::put('/update', [PegawaiBiodataController::class, 'update'])->name('pegawai.biodata.update');
        });

        Route::prefix('pendidikan')->group(function () {
            Route::get('/', [PegawaiPendidikanController::class, 'index'])->name('pegawai.pendidikan.index');
            Route::get('/create', [PegawaiPendidikanController::class, 'create'])->name('pegawai.pendidikan.create');
            Route::post('/store', [PegawaiPendidikanController::class, 'store'])->name('pegawai.pendidikan.store');
            Route::get('/edit/{id}', [PegawaiPendidikanController::class, 'edit'])->name('pegawai.pendidikan.edit');
            Route::put('/update/{id}', [PegawaiPendidikanController::class, 'update'])->name('pegawai.pendidikan.update');
            Route::delete('/destroy/{id}', [PegawaiPendidikanController::class, 'destroy'])->name('pegawai.pendidikan.destroy');
        });

        Route::prefix('kursus')->group(function () {
            Route::get('/', [PegawaiKursusController::class, 'index'])->name('pegawai.kursus.index');
            Route::get('/create', [PegawaiKursusController::class, 'create'])->name('pegawai.kursus.create');
            Route::post('/store', [PegawaiKursusController::class, 'store'])->name('pegawai.kursus.store');
            Route::get('/edit/{id}', [PegawaiKursusController::class, 'edit'])->name('pegawai.kursus.edit');
            Route::put('/update/{id}', [PegawaiKursusController::class, 'update'])->name('pegawai.kursus.update');
            Route::delete('/destroy/{id}', [PegawaiKursusController::class, 'destroy'])->name('pegawai.kursus.destroy');
        });

         Route::prefix('kepangkatan')->group(function () {
            Route::get('/', [PegawaiKepangkatanController::class, 'index'])->name('pegawai.kepangkatan.index');
            Route::get('/create', [PegawaiKepangkatanController::class, 'create'])->name('pegawai.kepangkatan.create');
            Route::post('/store', [PegawaiKepangkatanController::class, 'store'])->name('pegawai.kepangkatan.store');
            Route::get('/edit/{id}', [PegawaiKepangkatanController::class, 'edit'])->name('pegawai.kepangkatan.edit');
            Route::put('/update/{id}', [PegawaiKepangkatanController::class, 'update'])->name('pegawai.kepangkatan.update');
            Route::delete('/destroy/{id}', [PegawaiKepangkatanController::class, 'destroy'])->name('pegawai.kepangkatan.destroy');
        });

        Route::prefix('jabatan')->group(function () {
            Route::get('/', [PegawaiJabatanController::class, 'index'])->name('pegawai.jabatan.index');
            Route::get('/create', [PegawaiJabatanController::class, 'create'])->name('pegawai.jabatan.create');
            Route::post('/store', [PegawaiJabatanController::class, 'store'])->name('pegawai.jabatan.store');
            Route::get('/edit/{id}', [PegawaiJabatanController::class, 'edit'])->name('pegawai.jabatan.edit');
            Route::put('/update/{id}', [PegawaiJabatanController::class, 'update'])->name('pegawai.jabatan.update');
            Route::delete('/destroy/{id}', [PegawaiJabatanController::class, 'destroy'])->name('pegawai.jabatan.destroy');
        });

        Route::prefix('penghargaan')->group(function () {
            Route::get('/', [PegawaiPenghargaanController::class, 'index'])->name('pegawai.penghargaan.index');
            Route::get('/create', [PegawaiPenghargaanController::class, 'create'])->name('pegawai.penghargaan.create');
            Route::post('/store', [PegawaiPenghargaanController::class, 'store'])->name('pegawai.penghargaan.store');
            Route::get('/edit/{id}', [PegawaiPenghargaanController::class, 'edit'])->name('pegawai.penghargaan.edit');
            Route::put('/update/{id}', [PegawaiPenghargaanController::class, 'update'])->name('pegawai.penghargaan.update');
            Route::delete('/destroy/{id}', [PegawaiPenghargaanController::class, 'destroy'])->name('pegawai.penghargaan.destroy');
        });

        Route::prefix('pengalaman')->group(function () {
            Route::get('/', [PegawaiPengalamanController::class, 'index'])->name('pegawai.pengalaman.index');
            Route::get('/create', [PegawaiPengalamanController::class, 'create'])->name('pegawai.pengalaman.create');
            Route::post('/store', [PegawaiPengalamanController::class, 'store'])->name('pegawai.pengalaman.store');
            Route::get('/edit/{id}', [PegawaiPengalamanController::class, 'edit'])->name('pegawai.pengalaman.edit');
            Route::put('/update/{id}', [PegawaiPengalamanController::class, 'update'])->name('pegawai.pengalaman.update');
            Route::delete('/destroy/{id}', [PegawaiPengalamanController::class, 'destroy'])->name('pegawai.pengalaman.destroy');
        });

        Route::prefix('keluarga')->group(function () {
            Route::get('/', [PegawaiKeluarga_pasanganController::class, 'index'])->name('pegawai.keluarga.index');
            Route::get('/create', [PegawaiKeluarga_pasanganController::class, 'create'])->name('pegawai.keluarga.create');
            Route::post('/store', [PegawaiKeluarga_pasanganController::class, 'store'])->name('pegawai.keluarga.store');
            Route::get('/edit/{id}', [PegawaiKeluarga_pasanganController::class, 'edit'])->name('pegawai.keluarga.edit');
            Route::put('/update/{id}', [PegawaiKeluarga_pasanganController::class, 'update'])->name('pegawai.keluarga.update');
            Route::delete('/destroy/{id}', [PegawaiKeluarga_pasanganController::class, 'destroy'])->name('pegawai.keluarga.destroy');
        });

        Route::prefix('keluarga_anak')->group(function () {
            Route::get('/', [PegawaiKeluarga_anakController::class, 'index'])->name('pegawai.keluarga_anak.index');
            Route::get('/create', [PegawaiKeluarga_anakController::class, 'create'])->name('pegawai.keluarga_anak.create');
            Route::post('/store', [PegawaiKeluarga_anakController::class, 'store'])->name('pegawai.keluarga_anak.store');
            Route::get('/edit/{id}', [PegawaiKeluarga_anakController::class, 'edit'])->name('pegawai.keluarga_anak.edit');
            Route::put('/update/{id}', [PegawaiKeluarga_anakController::class, 'update'])->name('pegawai.keluarga_anak.update');
            Route::delete('/destroy/{id}', [PegawaiKeluarga_anakController::class, 'destroy'])->name('pegawai.keluarga_anak.destroy');
        });

        Route::prefix('keluarga_orangtua')->group(function () {
            Route::get('/', [PegawaiKeluarga_orangtuaController::class, 'index'])->name('pegawai.keluarga_orangtua.index');
            Route::get('/create', [PegawaiKeluarga_orangtuaController::class, 'create'])->name('pegawai.keluarga_orangtua.create');
            Route::post('/store', [PegawaiKeluarga_orangtuaController::class, 'store'])->name('pegawai.keluarga_orangtua.store');
            Route::get('/edit/{id}', [PegawaiKeluarga_orangtuaController::class, 'edit'])->name('pegawai.keluarga_orangtua.edit');
            Route::put('/update/{id}', [PegawaiKeluarga_orangtuaController::class, 'update'])->name('pegawai.keluarga_orangtua.update');
            Route::delete('/destroy/{id}', [PegawaiKeluarga_orangtuaController::class, 'destroy'])->name('pegawai.keluarga_orangtua.destroy');
        });

        Route::prefix('keluarga_saudara')->group(function () {
            Route::get('/', [PegawaiKeluarga_saudaraController::class, 'index'])->name('pegawai.keluarga_saudara.index');
            Route::get('/create', [PegawaiKeluarga_saudaraController::class, 'create'])->name('pegawai.keluarga_saudara.create');
            Route::post('/store', [PegawaiKeluarga_saudaraController::class, 'store'])->name('pegawai.keluarga_saudara.store');
            Route::get('/edit/{id}', [PegawaiKeluarga_saudaraController::class, 'edit'])->name('pegawai.keluarga_saudara.edit');
            Route::put('/update/{id}', [PegawaiKeluarga_saudaraController::class, 'update'])->name('pegawai.keluarga_saudara.update');
            Route::delete('/destroy/{id}', [PegawaiKeluarga_saudaraController::class, 'destroy'])->name('pegawai.keluarga_saudara.destroy');
        });

        Route::prefix('organisasi')->group(function () {
            Route::get('/', [PegawaiOrganisasiController::class, 'index'])->name('pegawai.organisasi.index');
            Route::get('/create', [PegawaiOrganisasiController::class, 'create'])->name('pegawai.organisasi.create');
            Route::post('/store', [PegawaiOrganisasiController::class, 'store'])->name('pegawai.organisasi.store');
            Route::get('/edit/{id}', [PegawaiOrganisasiController::class, 'edit'])->name('pegawai.organisasi.edit');
            Route::put('/update/{id}', [PegawaiOrganisasiController::class, 'update'])->name('pegawai.organisasi.update');
            Route::delete('/destroy/{id}', [PegawaiOrganisasiController::class, 'destroy'])->name('pegawai.organisasi.destroy');
        });

        

    });
});
