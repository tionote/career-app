<?php

use App\Http\Controllers\AvailableJobsController;
use App\Http\Controllers\RekrutmenController;
use Illuminate\Support\Facades\Route;

// --- IMPOR UNTUK SITEMAP ---
// PASTIKAN package spatie/laravel-sitemap sudah terinstal
use Spatie\Sitemap\Sitemap; 
use Spatie\Sitemap\Tags\Url;
// use App\Models\JobVacancy; // Tambahkan ini jika Anda ingin menyertakan semua lowongan secara dinamis

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROUTE APLIKASI UTAMA ---
Route::get('/', [AvailableJobsController::class, 'index'])->name('jobs.index');
// Route::get('form-rekrutment/{bagian}', [JobApplicationsController::class, 'form'])->name('form.rekrutment');
// Route::post('rekrutmen-submit', [JobApplicationsController::class, 'doSubmit']);
Route::get('/rekrutmen', [RekrutmenController::class, 'index'])->name('rekrutmen.index');
Route::get('/rekrutmen/referral/{nama}', [RekrutmenController::class, 'index'])->name('rekrutmen.referral');
Route::post('/rekrutmen-submit', [RekrutmenController::class, 'store'])->name('rekrutmen.store');
Route::post('/rekrutmen/check-nik', [RekrutmenController::class, 'checkNik'])->name('rekrutmen.checkNik');


// ----------------------------------------------------------------------
// --- ROUTE SITEMAP XML (PENTING UNTUK GOOGLE INDEXING) ---
// ----------------------------------------------------------------------
Route::get('sitemap.xml', function () {
    
    // Pastikan APP_URL di .env sudah disetel dengan benar (misalnya: https://career.sampharindogroup.com)
    $sitemap = Sitemap::create(config('app.url')); 

    // 1. Tambahkan Halaman Utama (Prioritas Tertinggi)
    $sitemap->add(Url::create('/')
        ->setPriority(1.0)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
    
    // 2. Tambahkan Halaman Target Keyword: "lowongan farmasi semarang"
    // Pastikan Anda telah membuat Halaman/View di /lowongan-farmasi-semarang
    $sitemap->add(Url::create('/lowongan-farmasi-semarang') 
        ->setPriority(0.9) 
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

    /*
    // 3. Tambahkan Lowongan Dinamis (Jika Anda punya Model JobVacancy)
    // JobVacancy::all()->each(function (JobVacancy $job) use ($sitemap) {
    //     $sitemap->add(Url::create("/lowongan/{$job->slug}") 
    //         ->setLastModificationDate($job->updated_at)
    //         ->setPriority(0.8)
    //         ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));
    // });
    */

    // Menggunakan toResponse(request()) untuk mengembalikan respons XML yang benar
    return $sitemap->toResponse(request());
});