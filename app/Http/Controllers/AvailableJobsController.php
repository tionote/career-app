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
        // Pecah slug untuk mendapatkan ID di akhir (format: judul-posisi-id)
        $parts = explode('-', $slug);
        $id = end($parts);

        // Cari lowongan berdasarkan ID dan status open
        $job = AvailableJobs::where('status', 'open')->find($id);

        // Jika tidak ditemukan berdasarkan ID (misal URL lama tanpa ID), kita coba fallback cari berdasarkan nama
        if (!$job) {
            $jobs = AvailableJobs::where('status', 'open')->get();
            $job = $jobs->first(function ($j) use ($slug) {
                return Str::slug($j->position) === $slug;
            });
        }

        // Jika benar-benar tidak ditemukan, lempar error 404
        if (!$job) {
            abort(404, 'Lowongan yang Anda cari tidak tersedia atau sudah ditutup.');
        }

        // Cek canonical URL untuk memastikan slug selalu mengandung ID (format baru: posisi-id)
        $correctSlug = Str::slug($job->position) . '-' . $job->id;
        if ($slug !== $correctSlug) {
            // Jika slug di URL salah, redirect ke slug yang benar
            return redirect()->route('jobs.show', ['slug' => $correctSlug]);
        }

        // 4. Kirim data lowongan tunggal ke view
        return view('frontend.detail_lowongan', compact('job'));
    }
}