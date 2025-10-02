<?php

namespace App\Http\Controllers;

use App\Models\AvailableJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Pastikan ini diimpor

class AvailableJobsController extends Controller
{
    /**
     * Display a listing of the available jobs.
     */
    public function index()
    {
        $jobs = AvailableJobs::where('status', 'open')->get();
        return view('frontend.index', compact('jobs'));
    }

    /**
     * Display the specified job detail, searching by dynamically generated slug.
     */
    public function show($slug) // Hanya menerima $slug
    {
        // 1. Ambil semua lowongan yang statusnya 'open'
        $jobs = AvailableJobs::where('status', 'open')->get();

        // 2. Cari lowongan dengan membandingkan SLUG URL dengan SLUG yang dibuat dari Position
        $job = $jobs->first(function ($job) use ($slug) {
            return Str::slug($job->position) === $slug;
        });

        // 3. Jika tidak ditemukan, lempar error 404
        if (!$job) {
            abort(404, 'Lowongan yang Anda cari tidak tersedia atau sudah ditutup.');
        }

        // Opsional: Cek canonical URL untuk mencegah duplikasi SEO
        $correctSlug = Str::slug($job->position);
        if ($slug !== $correctSlug) {
            // Jika slug di URL salah, redirect ke slug yang benar
            return redirect()->route('jobs.show', ['slug' => $correctSlug]);
        }

        // 4. Kirim data lowongan tunggal ke view
        return view('frontend.detail_lowongan', compact('job'));
    }
}