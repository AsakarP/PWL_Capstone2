<?php
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DataFakultasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FakultasController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

// Route::get('/adminindex', function () {
//     return view('admin.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//  Admin
Route::middleware(['auth', 'cekRole:1'])->group(function () {
    // Data User
    Route::get('/admin', [UserController::class, 'index'])->name('admin-index');
    Route::post('/admin/create', [UserController::class, 'store'])->name('admin-store');
    Route::get('/admin/create', [UserController::class, 'create'])->name('admin-create');
    Route::patch('/admin/edit/{id}', [UserController::class, 'update'])->name('admin-update');
    Route::get('/admin/edit/{id}', [UserController::class, 'edit'])->name('admin-edit');
    Route::get('/admin/delete/{id}', [UserController::class, 'destroy'])->name('admin-delete');

    // Data Fakultas
    Route::get('/admin/fakultas', [DataFakultasController::class, 'index'])->name('afk-index');
    Route::post('/admin/fakultas/create', [DataFakultasController::class, 'store'])->name('afk-store');
    Route::get('/admin/fakultas/create', [DataFakultasController::class, 'create'])->name('afk-create');
    Route::patch('/admin/fakultas/edit/{id}', [DataFakultasController::class, 'update'])->name('afk-update');
    Route::get('/admin/fakultas/edit/{id}', [DataFakultasController::class, 'edit'])->name('afk-edit');
    Route::get('/admin/fakultas/delete/{id}', [DataFakultasController::class, 'destroy'])->name('afk-delete');

    // Data Beasiswa
    Route::get('/admin/Beasiswa', [BeasiswaController::class, 'index'])->name('ab-index');
    Route::post('/admin/Beasiswa/create', [BeasiswaController::class, 'store'])->name('ab-store');
    Route::get('/admin/Beasiswa/create', [BeasiswaController::class, 'create'])->name('ab-create');
    Route::patch('/admin/Beasiswa/edit/{idBeasiswa}', [BeasiswaController::class, 'update'])->name('ab-update');
    Route::get('/admin/Beasiswa/edit/{idBeasiswa}', [BeasiswaController::class, 'edit'])->name('ab-edit');
    Route::get('/admin/Beasiswa/delete/{idBeasiswa}', [BeasiswaController::class, 'destroy'])->name('ab-delete');
});

// Fakultas
Route::middleware(['auth', 'cekRole:2'])->group(function () {
    Route::get('/fakultas', [FakultasController::class, 'index'])->name('fak-index');
    Route::post('/fakultas/create', [FakultasController::class, 'store'])->name('fak-store');
    Route::get('/fakultas/create', [FakultasController::class, 'create'])->name('fak-create');
    Route::patch('/fakultas/edit/{id}', [FakultasController::class, 'update'])->name('fak-update');
    Route::get('/fakultas/edit/{id}', [FakultasController::class, 'edit'])->name('fak-edit');
    Route::get('/fakultas/delete/{id}', [FakultasController::class, 'destroy'])->name('fak-delete');
});

// Prodi
Route::middleware(['auth', 'cekRole:3'])->group(function () {

    // MataKuliah
    Route::get('/prodi/matakuliah', [MatakuliahController::class, 'index'])->name('mk-index');
    Route::post('/prodi/matakuliah/create', [MatakuliahController::class, 'store'])->name('mk-store');
    Route::get('/prodi/matakuliah/create', [MatakuliahController::class, 'create'])->name('mk-create');
    Route::patch('/prodi/edit/{id}', [MatakuliahController::class, 'update'])->name('mk-update');
    Route::get('/prodi/edit/{id}', [MatakuliahController::class, 'edit'])->name('mk-edit');
    Route::get('/prodi/delete/{id}', [MatakuliahController::class, 'destroy'])->name('mk-delete');

});

// Mahasiwa
Route::middleware(['auth', 'cekRole:4'])->group(function () {
    
    // Beasiswa
    Route::get('/mahasiswa/beasiswa', [MahasiswaController::class, 'index'])->name('mab-index');
    Route::post('/mahasiswa/beasiswa/create', [MahasiswaController::class, 'store'])->name('mab-store');
    Route::get('/mahasiswa/beasiswa/create', [MahasiswaController::class, 'create'])->name('mab-create');
    Route::patch('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('mab-update');
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mab-edit');
    Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mab-delete');
});


require __DIR__.'/auth.php';
