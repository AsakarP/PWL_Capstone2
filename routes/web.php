<?php
use App\Http\Controllers\DataFakultasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\PollingDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Matakuliah;
use App\Models\DataFakultas;
use App\Models\PollingDetail;
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
});

// Prodi
Route::middleware(['auth', 'cekRole:2'])->group(function () {

    // MataKuliah
    Route::get('/prodi/matakuliah', [MatakuliahController::class, 'index'])->name('mk-index');
    Route::post('/prodi/matakuliah/create', [MatakuliahController::class, 'store'])->name('mk-store');
    Route::get('/prodi/matakuliah/create', [MatakuliahController::class, 'create'])->name('mk-create');
    Route::patch('/prodi/edit/{id}', [MatakuliahController::class, 'update'])->name('mk-update');
    Route::get('/prodi/edit/{id}', [MatakuliahController::class, 'edit'])->name('mk-edit');
    Route::get('/prodi/delete/{id}', [MatakuliahController::class, 'destroy'])->name('mk-delete');

    // Polling
    Route::get('/prodi/polling', [PollingController::class, 'index'])->name('poll-index');
    Route::post('/prodi/polling/create', [PollingController::class, 'store'])->name('poll-store');
    Route::get('/prodi/polling/create', [PollingController::class, 'create'])->name('poll-create');
    Route::patch('/prodi/polling/edit/{id}', [PollingController::class, 'update'])->name('poll-update');
    Route::get('/prodi/polling/edit/{id}', [PollingController::class, 'edit'])->name('poll-edit');
    Route::get('/prodi/polling/delete/{id}', [PollingController::class, 'destroy'])->name('poll-delete');
});

// Mahasiswa
Route::middleware(['auth', 'cekRole:3'])->group(function () {
    Route::get('/mahasiswa', [PollingDetailController::class, 'index'])->name('mahasiswa-index');
    Route::get('/mahasiswa/mk', [PollingDetailController::class, 'indexmk'])->name('mahasiswa-indexmk');
});


require __DIR__.'/auth.php';
