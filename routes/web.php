<?php

use App\Http\Controllers\ProsesSistem\Guru;
use App\Http\Controllers\ProsesSistem\GuruPiket;
use App\Http\Controllers\ProsesSistem\IjinKeluar;
use App\Http\Controllers\ProsesSistem\IjinMasuk;
use App\Http\Controllers\ProsesSistem\JadwalBelajar;
use App\Http\Controllers\ProsesSistem\Kelas;
use App\Http\Controllers\ProsesSistem\Mapel;
use App\Http\Controllers\ProsesSistem\PresensiMapel;
use App\Http\Controllers\ProsesSistem\Semester;
use App\Http\Controllers\ProsesSistem\Siswa;
use App\Http\Controllers\ProsesSistem\TahunAjaran;
use App\Http\Controllers\Laporan\Laporan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TemplateController;
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

// Route::get('/buttons', function () {
//     return view('buttons');
// })->name("buttons");

// Route::get('/documentation', function () {
//     return view('documentation');
// })->name("documentation");

// Route::get('/', function () {
//     return view('index');
// })->name("index");;

// Route::get('/typography', function () {
//     return view('typography');
// })->name("typography");;

// Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [TemplateController::class, 'index'])->middleware('auth');
Route::get('/home', [TemplateController::class, 'index'])->name('home')->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['resources' => ['laporan'], ['middleware' => ['cekUserLogin:1|2|3']]], function () {
        // laporan jadwal belajar
        Route::get('lapjadwalbelajar', [Laporan::class, 'jadwal'])->name('laporan/jadwal/belajar');
        Route::get('lapjadwalbelajar/pdf', [Laporan::class, 'jadwalpdf'])->name('jadwalbelajar.pdf');
        // laporan presensi 
        Route::get('lappresensi', [Laporan::class, 'presensi'])->name('laporan/presensi');
        Route::get('lappresensi/pdf', [Laporan::class, 'presensipdf'])->name('presensi.pdf');

        Route::get('ijin/keluar', [Laporan::class, 'ijinkeluar'])->name('ijin/keluar');
        Route::get('lap/ijin/keluar/pdf', [Laporan::class, 'ijinkeluarpdf'])->name('lap/ijin/keluar/pdf');

        Route::get('ijin/masuk', [Laporan::class, 'ijinmasuk'])->name('ijin/masuk');
        Route::get('lap/ijin/masuk/pdf', [Laporan::class, 'ijinmasukpdf'])->name('lap/ijin/masuk/pdf');

        // Route::get('lap/kehadiran', [Laporan::class, 'kehadiran'])->name('lap/kehadiran');
        // Route::get('lap/kehadiran/pdf', [Laporan::class, 'kehadiranpdf'])->name('lap/kehadiran/pdf');
    });
    Route::group(['resource' => ['guru'], ['middleware' => ['cekUserLogin:1|2|3']]], function () {
        Route::get('guru/index', [Guru::class, 'index'])->name('guru/index');
        Route::get('guru/create', [Guru::class, 'create'])->name('guru/create');
        Route::post('guru/store', [Guru::class, 'store'])->name('guru/store');
        Route::get('guru/edit/{id}', [Guru::class, 'edit'])->name('guru/edit');
        Route::post('guru/update/{id}', [Guru::class, 'update'])->name('guru/update');
        Route::get('guru/destroy/{id}', [Guru::class, 'destroy'])->name('guru/destroy');
    });
    Route::group(['resource' => ['mapel'], ['middleware' => ['cekUserLogin:1|2']]], function () {
        Route::get('data/mapel/', [Mapel::class, 'index'])->name('data/mapel');
        Route::get('tambah/mapel', [Mapel::class, 'create'])->name('tambah/mapel');
        Route::post('simpan/mapel', [Mapel::class, 'store'])->name('simpan/mapel');
        Route::get('tampil/mapel/{id}', [Mapel::class, 'edit'])->name('tampil/mapel');
        Route::post('update/mapel/{id}', [Mapel::class, 'update'])->name('update/mapel');
        Route::get('hapus/mapel/{id}', [Mapel::class, 'destroy'])->name('hapus/mapel');
    });
    Route::group(['resource' => ['kelas'], ['middleware' => ['cekUserLogin:1|3']]], function () {
        Route::get('kelas/index', [Kelas::class, 'index'])->name('kelas/index');
        Route::get('kelas/create', [Kelas::class, 'create'])->name('kelas/create');
        Route::post('kelas/store', [Kelas::class, 'store'])->name('kelas/store');
        Route::get('kelas/edit/{id}', [Kelas::class, 'edit'])->name('kelas/edit');
        Route::post('kelas/update/{id}', [Kelas::class, 'update'])->name('kelas/update');
        Route::get('kelas/destroy/{id}', [Kelas::class, 'destroy'])->name('kelas/destroy');
    });
    Route::group(['resource' => ['semester'], ['middleware' => ['cekUserLogin:1|']]], function () {
        Route::get('semester/index', [Semester::class, 'index'])->name('semester/index');
        Route::get('semester/create', [Semester::class, 'create'])->name('semester/create');
        Route::post('semester/store', [Semester::class, 'store'])->name('semester/store');
        Route::get('semester/edit/{id}', [Semester::class, 'edit'])->name('semester/edit');
        Route::post('semester/update/{id}', [Semester::class, 'update'])->name('semester/update');
        Route::get('semester/destroy/{id}', [Semester::class, 'destroy'])->name('semester/destroy');
    });
    Route::group(['resource' => ['tahunajaran'], ['middleware' => ['cekUserLogin:1|']]], function () {
        Route::get('ta/index', [TahunAjaran::class, 'index'])->name('ta/index');
        Route::get('ta/create', [TahunAjaran::class, 'create'])->name('ta/create');
        Route::post('ta/store', [TahunAjaran::class, 'store'])->name('ta/store');
        Route::get('ta/edit/{id}', [TahunAjaran::class, 'edit'])->name('ta/edit');
        Route::post('ta/update/{id}', [TahunAjaran::class, 'update'])->name('ta/update');
        Route::get('ta/destroy/{id}', [TahunAjaran::class, 'destroy'])->name('ta/destroy');
    });
    Route::group(['resource' => ['siswa'], ['middleware' => ['cekUserLogin:1|2|3|4']]], function () {
        Route::get('siswa/index', [Siswa::class, 'index'])->name('siswa/index');
        Route::get('create/siswa', [Siswa::class, 'create'])->name('create/siswa');
        Route::post('store/siswa', [Siswa::class, 'store'])->name('store/siswa');
        Route::get('edit/siswa/{id}', [Siswa::class, 'edit'])->name('edit/siswa');
        Route::post('update/siswa/{id}', [Siswa::class, 'update'])->name('update/siswa');
        Route::get('destroy/siswa/{id}', [Siswa::class, 'destroy'])->name('destroy/siswa');
    });
    Route::group(['resource' => ['gurupiket'], ['middleware' => ['cekUserLogin:1|4']]], function () {
        Route::get('gp/index', [GuruPiket::class, 'index'])->name('gp/index');
        Route::get('gp/create', [GuruPiket::class, 'create'])->name('gp/create');
        Route::post('gp/store', [GuruPiket::class, 'store'])->name('gp/store');
        Route::get('gp/edit/{id}', [GuruPiket::class, 'edit'])->name('gp/edit');
        Route::post('gp/update/{id}', [GuruPiket::class, 'update'])->name('gp/update');
        Route::get('gp/destroy/{id}', [GuruPiket::class, 'destroy'])->name('gp/destroy');
    });
    Route::group(['resource' => ['jadwalbelajar'], ['middleware' => ['cekUserLogin:1|2']]], function () {
        Route::get('jb/index', [JadwalBelajar::class, 'index'])->name('jb/index');
        Route::get('jb/create', [JadwalBelajar::class, 'create'])->name('jb/create');
        Route::post('jb/store', [JadwalBelajar::class, 'store'])->name('jb/store');
        Route::get('jb/edit/{id}', [JadwalBelajar::class, 'edit'])->name('jb/edit');
        Route::post('jb/update/{id}', [JadwalBelajar::class, 'update'])->name('jb/update');
        Route::get('jb/destroy/{id}', [JadwalBelajar::class, 'destroy'])->name('jb/destroy');
    });
    Route::group(['resource' => ['presensimapel'], ['middleware' => ['cekUserLogin:1|2']]], function () {
        Route::get('pm/index', [PresensiMapel::class, 'index'])->name('pm/index');
        Route::get('pm/create', [PresensiMapel::class, 'create'])->name('pm/create');
        Route::post('pm/store', [PresensiMapel::class, 'store'])->name('pm/store');
        Route::get('pm/edit/{id}', [PresensiMapel::class, 'edit'])->name('pm/edit');
        Route::post('pm/udate/{id}', [PresensiMapel::class, 'update'])->name('pm/update');
        Route::get('pm/destroy/{id}', [PresensiMapel::class, 'destroy'])->name('pm/destroy');
    });
    Route::group(['resource' => ['presensiharian'], ['middleware' => ['cekUserLogin:1|4']]], function () {
        Route::get('hs/index', [IjinKeluar::class, 'index'])->name('hs/index');
        Route::get('hs/create', [IjinKeluar::class, 'create'])->name('hs/create');
        Route::get('hs/show', [IjinKeluar::class, 'show'])->name('hs/show');
        Route::post('hs/store', [IjinKeluar::class, 'store'])->name('hs/store');
        Route::get('hs/edit/{id}', [IjinKeluar::class, 'edit'])->name('hs/edit');
        Route::post('hs/update/{id}', [IjinKeluar::class, 'update'])->name('hs/update');
        Route::get('hs/destroy/{id}', [IjinKeluar::class, 'destroy'])->name('hs/destroy');
    });
    Route::group(['resource' => ['presensimasuk'], ['middleware' => ['cekUserLogin:1|4']]], function () {
        Route::get('im/index', [IjinMasuk::class, 'index'])->name('im/index');
        Route::get('im/create', [IjinMasuk::class, 'create'])->name('im/create');
        Route::post('im/store', [IjinMasuk::class, 'store'])->name('im/store');
        Route::get('im/edit/{id}', [IjinMasuk::class, 'edit'])->name('im/edit');
        Route::post('im/update/{id}', [IjinMasuk::class, 'update'])->name('im/update');
        Route::get('im/destroy/{id}', [IjinMasuk::class, 'destroy'])->name('im/destroy');
    });
});     
        // Route::resource('data-guru',GuruController::class);
        // Route::resource('siswa',SiswaController::class);
        // Route::resource('kelas',KelasController::class);
        // Route::group(['resource'=> ['kelas']],function(){
        // Route::get('data-kelas',[KelasController::class, 'index'])->name('data-kelas');
        // });

        // Route::controller(KelasController::class)->prefix('kelas')->group(function(){
        //     Route::get('', 'index')->name('kelas');
        //     Route::get('create', 'create')->name('kelas.create');
        //     Route::post('create', 'store')->name('kelas.create.store');
        //     Route::get('edit/{id}', 'edit')->name('kelas.edit');
        //     Route::post('edit/{id}', 'update')->name('kelas.create.update');
        //     Route::get('destroy/{id}', 'destroy')->name('kelas.destroy');
        // });


        // Route::get('data-mapel',[MapelController::class, 'index'])->name('data-mapel');
        // Route::get('tambah-mapel',[MapelController::class, 'create'])->name('tambah-mapel');
        // Route::resource('gurupiket',GuruPiketController::class);
        // Route::resource('semester',SemesterController::class);
        // Route::resource('tahunajaran',TahunAjaranController::class);


        
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);
