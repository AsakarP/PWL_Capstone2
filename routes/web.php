<?php
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DataFakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DataProdiController;
use App\Http\Controllers\ProdiApprovalController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
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
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile-index');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile-edit');
    Route::patch('/profile/edit/{id}', [ProfileController::class, 'update'])->name('profile-update');
    Route::delete('/profile/edit/{id}', [ProfileController::class, 'destroy'])->name('profile-destroy');
});

// Admin
Route::middleware(['auth', 'cekRole:Admin'])->group(function () {
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

    // Data Prodi
    Route::get('/admin/prodi', [DataProdiController::class, 'index'])->name('ap-index');
    Route::post('/admin/prodi/create', [DataProdiController::class, 'store'])->name('ap-store');
    Route::get('/admin/prodi/create', [DataProdiController::class, 'create'])->name('ap-create');
    Route::patch('/admin/prodi/edit/{id}', [DataProdiController::class, 'update'])->name('ap-update');
    Route::get('/admin/prodi/edit/{id}', [DataProdiController::class, 'edit'])->name('ap-edit');
    Route::get('/admin/prodi/delete/{id}', [DataProdiController::class, 'destroy'])->name('ap-delete');

    // Data Beasiswa
    Route::get('/admin/Beasiswa', [BeasiswaController::class, 'index'])->name('ab-index');
    Route::post('/admin/Beasiswa/create', [BeasiswaController::class, 'store'])->name('ab-store');
    Route::get('/admin/Beasiswa/create', [BeasiswaController::class, 'create'])->name('ab-create');
    Route::patch('/admin/Beasiswa/edit/{idBeasiswa}', [BeasiswaController::class, 'update'])->name('ab-update');
    Route::get('/admin/Beasiswa/edit/{idBeasiswa}', [BeasiswaController::class, 'edit'])->name('ab-edit');
    Route::get('/admin/Beasiswa/delete/{idBeasiswa}', [BeasiswaController::class, 'destroy'])->name('ab-delete');
});

// Fakultas
Route::middleware(['auth', 'cekRole:Fakultas'])->group(function () {
    // Periode
    Route::get('/fakultas/periode', [PeriodeController::class, 'index'])->name('fak-index');
    Route::post('/fakultas/periode/create', [PeriodeController::class, 'store'])->name('fak-store');
    Route::get('/fakultas/periode/create', [PeriodeController::class, 'create'])->name('fak-create');
    Route::patch('/fakultas/periode/update/{id}', [PeriodeController::class, 'update'])->name('fak-update');
    Route::get('/fakultas/periode/edit/{id}', [PeriodeController::class, 'edit'])->name('fak-edit');
    Route::get('/fakultas/periode/delete/{id}', [PeriodeController::class, 'destroy'])->name('fak-delete');

    // Approval
    Route::get('/fakultas/daftar', [ApprovalController::class, 'index'])->name('fad-index');
    Route::get('/approve_apply/{id}', [ApprovalController::class, 'approve_apply']);
    Route::get('/deny_apply/{id}', [ApprovalController::class, 'deny_apply']);
});

// Prodi
Route::middleware(['auth', 'cekRole:Prodi'])->group(function () {
    // Periode
    Route::get('/prodi/periode', [ProdiController::class, 'index'])->name('prop-index');
    Route::post('/prodi/periode/create', [ProdiController::class, 'store'])->name('prop-store');
    Route::get('/prodi/periode/create', [ProdiController::class, 'create'])->name('prop-create');
    Route::patch('/prodi/periode/update/{id}', [ProdiController::class, 'update'])->name('prop-update');
    Route::get('/prodi/periode/edit/{id}', [ProdiController::class, 'edit'])->name('prop-edit');
    Route::get('/prodi/periode/delete/{id}', [ProdiController::class, 'destroy'])->name('prop-delete');

    // Approval
    Route::get('/prodi/daftar', [ProdiApprovalController::class, 'index'])->name('proa-index');
    Route::get('/proa_approve_apply/{id}', [ProdiApprovalController::class, 'proa_approve_apply']);
    Route::get('/proa_deny_apply/{id}', [ProdiApprovalController::class, 'proa_deny_apply']);
});

// Mahasiswa
Route::middleware(['auth', 'cekRole:Mahasiswa'])->group(function () {
    // Beasiswa
    Route::get('/mahasiswa/beasiswa', [MahasiswaController::class, 'index'])->name('mab-index');
    Route::post('/mahasiswa/beasiswa/create', [MahasiswaController::class, 'store'])->name('mab-store');
    Route::get('/mahasiswa/beasiswa/create', [MahasiswaController::class, 'create'])->name('mab-create');
    Route::patch('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('mab-update');
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mab-edit');
    Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mab-delete');

    // History
    Route::get('/History/beasiswa', [HistoryController::class, 'index'])->name('mah-index');
    Route::post('/History/beasiswa/create', [HistoryController::class, 'store'])->name('mah-store');
    Route::get('/History/beasiswa/create', [HistoryController::class, 'create'])->name('mah-create');
    Route::patch('/History/edit/{id}', [HistoryController::class, 'update'])->name('mah-update');
    Route::get('/History/edit/{id}', [HistoryController::class, 'edit'])->name('mah-edit');
    Route::get('/History/delete/{id}', [HistoryController::class, 'destroy'])->name('mah-delete');
});

Route::get('/download/{id}', [ApprovalController::class, 'download'])->name('download');

require __DIR__.'/auth.php';
