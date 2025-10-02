<?php

use App\Http\Controllers\AvailableJobsController;
use Illuminate\Support\Facades\Route;
use App\Models\AvailableJobs; 
use Spatie\Sitemap\Sitemap; 
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;

Route::get('/', [AvailableJobsController::class, 'index'])->name('jobs.index');
Route::get('lowongan-farmasi-semarang/{slug}', [AvailableJobsController::class, 'show'])->name('jobs.show');

Route::get('sitemap.xml', function () {
    
    $sitemap = Sitemap::create(config('app.url')); 

    // 1. Tautan Halaman Utama (Index)
    $sitemap->add(Url::create(route('jobs.index'))
        ->setPriority(1.0)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
    
    // 2. Tautan Halaman Rekrutmen (Form Aplikasi)

    // 3. Tautan Detail Lowongan (Iterasi dari Database)
    AvailableJobs::where('status', 'open')->get()->each(function (AvailableJobs $job) use ($sitemap) {
        
        // Cek data position. Jika kosong, kita tidak bisa membuat slug, maka dilewati.
        if (empty($job->position)) {
            // Jika ini masih error, coba hapus baris ini dan bersihkan cache lagi.
            // \Log::warning('Job ID ' . $job->id . ' dilewati karena Position kosong.');
            return; // Lanjutkan ke iterasi berikutnya
        }
        
        // FIX KRITIS: Generate slug secara dinamis dari 'position', 
        // sama seperti cara Controller memvalidasinya.
        $generatedSlug = Str::slug($job->position);
        
        // Memastikan parameter slug selalu diberikan ke jobs.show
        $url = route('jobs.show', ['slug' => $generatedSlug]);

        $sitemap->add(Url::create($url) 
            ->setLastModificationDate($job->updated_at)
            ->setPriority(0.8)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));
    });

    return $sitemap->toResponse(request());
});
