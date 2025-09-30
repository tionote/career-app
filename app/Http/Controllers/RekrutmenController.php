<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AvailableJobs;
use Illuminate\Http\Request;
use App\Models\Rekrutmen;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; // Make sure to add this line

class RekrutmenController extends Controller
{

    public function index($nama = null)
    {
        $title = 'Form Rekrutmen Sampharindo Group';
        $referral = $nama;
        $bagianList = AvailableJobs::where('status','Open')->pluck('position')->toArray();
        // dd($bagianList);
    
        return view('frontend.rekrutmen', compact('title', 'referral', 'bagianList'));
    }

    /**
     * Check if a given NIK has been submitted in the last 6 months.
     * * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkNik(Request $request)
    {
        // Simple validation for the NIK field
        $request->validate([
            'no_ktp' => 'required|string|max:255',
        ]);

        $no_ktp = $request->input('no_ktp');
        $sixMonthsAgo = Carbon::now()->subMonths(6);

        // Check for an existing submission with the same NIK within the last 6 months
        $submission = Rekrutmen::where('no_ktp', $no_ktp)
                               ->where('created_at', '>=', $sixMonthsAgo)
                               ->first();

        // If a submission is found, return a forbidden error
        if ($submission) {
            return response()->json([
                'status' => false,
                'message' => 'NIK Anda sudah terdaftar dalam 6 bulan terakhir. Silakan coba lagi nanti.',
            ], 403);
        }

        // If no recent submission is found, return a success response
        return response()->json([
            'status' => true,
            'message' => 'NIK Anda valid. Silakan lengkapi formulir.',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_ktp' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'pendidikan' => 'required|string',
            'sumber_info' => 'required|string',
            'bagian' => 'required|string',
            'gaji_diinginkan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'pas_photo' => 'required|image|max:500',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'alamat_lengkap' => 'required|string|max:500',
            'ringkasan' => 'required|string|max:500',
            'referral' => 'nullable|string|max:255',

            // Pengalaman kerja (array paralel)
            'experience_company' => 'required|array|min:1',
            'experience_company.*' => 'required|string|max:255',
            'experience_position' => 'required|array|min:1',
            'experience_position.*' => 'required|string|max:255',
            'experience_job' => 'required|array|min:1',
            'experience_job.*' => 'required|string|max:255',

            'experience_duration_start' => 'required|array|min:1',
            'experience_duration_start.*' => 'required|date',
            'experience_duration_end' => 'required|array|min:1',
            'experience_duration_end.*' => 'required|date|after_or_equal:experience_duration_start.*',
        ]);

        // Simpan foto
        $filename = $request->file('pas_photo')->store('public/pas_photos');
        $filename = basename($filename);
        // Proses pengalaman kerja ke bentuk array of object
        $pengalaman = [];
        foreach ($validatedData['experience_company'] as $i => $val) {
            $pengalaman[] = [
                'experience_company' => $validatedData['experience_company'][$i] ?? null,
                'experience_position' => $validatedData['experience_position'][$i] ?? null,
                'experience_job' => $validatedData['experience_job'][$i] ?? null,
                'experience_duration_start' => $validatedData['experience_duration_start'][$i] ?? null,
                'experience_duration_end' => $validatedData['experience_duration_end'][$i] ?? null,
            ];
        }

        // Simpan data jika validasi sukses
        try {
            DB::beginTransaction(); // Start the transaction

            // Simpan data rekrutmen
            $rekrutmen = new Rekrutmen();
            $rekrutmen->no_ktp = $validatedData['no_ktp'];
            $rekrutmen->nama = $validatedData['nama'];
            $rekrutmen->email = $validatedData['email'];
            $rekrutmen->no_hp = $validatedData['no_hp'];
            $rekrutmen->tempat_lahir = $validatedData['tempat_lahir'];
            $rekrutmen->tanggal_lahir = $validatedData['tanggal_lahir'];
            $rekrutmen->jurusan = $validatedData['jurusan'];
            $rekrutmen->asal_sekolah = $validatedData['asal_sekolah'];
            $rekrutmen->pendidikan = $validatedData['pendidikan'];
            $rekrutmen->sumber_info = $validatedData['sumber_info'];
            $rekrutmen->bagian = $validatedData['bagian'];
            $rekrutmen->gaji_diinginkan = $validatedData['gaji_diinginkan'];
            $rekrutmen->jenis_kelamin = $validatedData['jenis_kelamin'];
            $rekrutmen->pas_photo = $filename;  // Correctly saving the file path
            $rekrutmen->provinsi = $validatedData['provinsi'];
            $rekrutmen->kota = $validatedData['kota'];
            $rekrutmen->kecamatan = $validatedData['kecamatan'];
            $rekrutmen->kelurahan = $validatedData['kelurahan'];
            $rekrutmen->alamat_lengkap = $validatedData['alamat_lengkap'];
            $rekrutmen->ringkasan = $validatedData['ringkasan'];
            $rekrutmen->referral = $request->input('referral');
            $rekrutmen->pengalaman_kerja = json_encode($pengalaman); // Save experience as JSON
            $rekrutmen->save();



            DB::commit(); // Commit the transaction

            return response()->json([
                'status' => true,
                'alert' => 'success',
                'message' => 'Data Was Created Successfully',
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


}