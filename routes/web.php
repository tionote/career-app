<?php

use App\Http\Controllers\AvailableJobsController;
use App\Http\Controllers\RekrutmenController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AvailableJobsController::class, 'index'])->name('jobs.index');
// Route::get('form-rekrutment/{bagian}', [JobApplicationsController::class, 'form'])->name('form.rekrutment');
// Route::post('rekrutmen-submit', [JobApplicationsController::class, 'doSubmit']);
Route::get('/rekrutmen', [RekrutmenController::class, 'index'])->name('rekrutmen.index');
Route::get('/rekrutmen/referral/{nama}', [RekrutmenController::class, 'index'])->name('rekrutmen.referral');
Route::post('/rekrutmen-submit', [RekrutmenController::class, 'store'])->name('rekrutmen.store');
Route::post('/rekrutmen/check-nik', [RekrutmenController::class, 'checkNik'])->name('rekrutmen.checkNik');


