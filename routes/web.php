<?php

use App\Http\Controllers\AvailableJobsController;
use App\Http\Controllers\RekrutmenController;
use Illuminate\Support\Facades\Route;
use App\Models\AvailableJobs; 
use Spatie\Sitemap\Sitemap; 
use Spatie\Sitemap\Tags\Url;

Route::get('/', [AvailableJobsController::class, 'index'])->name('jobs.index');
Route::get('/lowongan-kerja-semarang/{slug}', [AvailableJobsController::class, 'show'])->name('jobs.show');
Route::get('/rekrutmen', [RekrutmenController::class, 'index'])->name('rekrutmen.index');
Route::get('/rekrutmen/referral/{nama}', [RekrutmenController::class, 'index'])->name('rekrutmen.referral');
Route::post('/rekrutmen-submit', [RekrutmenController::class, 'store'])->name('rekrutmen.store');
Route::post('/rekrutmen/check-nik', [RekrutmenController::class, 'checkNik'])->name('rekrutmen.checkNik');

Route::get('sitemap.xml', function () {
    
    $sitemap = Sitemap::create(config('app.url')); 

    $sitemap->add(Url::create('/')
        ->setPriority(1.0)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
    
    $sitemap->add(Url::create('/lowongan-farmasi-semarang') 
        ->setPriority(0.9) 
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

    AvailableJobs::where('status', 'open')->get()->each(function (AvailableJobs $job) use ($sitemap) {
        
        $url = route('jobs.show', ['slug' => $job->slug]);

        $sitemap->add(Url::create($url) 
            ->setLastModificationDate($job->updated_at)
            ->setPriority(0.8)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));
    });

    return $sitemap->toResponse(request());
});