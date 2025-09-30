<?php

namespace App\Http\Controllers;

use App\Models\AvailableJobs;
use Illuminate\Http\Request;

class AvailableJobsController extends Controller
{

    /**
     * Display a listing of the available jobs.
     */
    public function index()
    {
        // Mengambil semua data dari tabel 'available_jobs' yang statusnya 'open'
        $jobs = AvailableJobs::where('status', 'open')->get();

        // Mengirim data lowongan ke view 'jobs.index'
        return view('frontend.index', compact('jobs'));
    }
}
