<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\LoginController;

// Rute untuk login
Route::get('/', [LoginController::class, 'home'] )->name('layout.home');
Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/proses-login', [LoginController::class, 'login']);
Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('regis');
Route::post('/daftar', [LoginController::class, 'daftar'])->name('SignUp');


// Rute untuk logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Web
Route::get('/index', [AgendaController::class, 'index'])->name('agenda.index'); // Read (tampilkan daftar agenda)
Route::get('/agenda/myagenda', [AgendaController::class, 'myAgenda'])->name('agenda.my'); // Tampilam MyAgenda
Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create'); // Create (tampilkan form tambah agenda)

Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store'); // Store (simpan agenda baru)
// Route::post('/agenda/{id}/done', [AgendaController::class, 'markAsDone'])->name('agenda.done');

Route::get('/agenda/{id}/edit', [AgendaController::class, 'edit'])->name('agenda.edit'); // Edit (tampilkan form edit)
Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update'); // Update (update data agenda)
Route::put('/agenda/updateStatus/{id}', [AgendaController::class, 'updateStatus'])->name('agenda.updateStatus'); //Update Status
Route::delete('/agenda/destroy/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy'); //Hapus Data