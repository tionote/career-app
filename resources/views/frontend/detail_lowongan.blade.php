@extends('frontend.layouts.app')

@section('title', $job->position . ' - Lowongan Kerja Sampharindo Group')

@section('meta')
    <meta name="description"
        content="Detail kualifikasi dan tanggung jawab untuk posisi {{ $job->position }} di Sampharindo Group. Segera kirimkan lamaran Anda!">
    <meta name="keywords" content="Lowongan Kerja {{ $job->position }}, Karir Sampharindo Group, PT Sampharindo Perdana, Loker Farmasi Semarang, Rekrutmen {{ $job->position }}, Kerja di Sampharindo">

    {{-- Open Graph / Social Media Meta Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $job->position }} - Lowongan Kerja Sampharindo Group">
    <meta property="og:description" content="Detail kualifikasi dan tanggung jawab untuk posisi {{ $job->position }} di Sampharindo Group. Segera kirimkan lamaran Anda!">
    @if(!empty($job->url_image))
    <meta property="og:image" content="{{ env('SIMCO_URL', 'https://simco.sampharindogroup.com') }}/view-job-image/{{ $job->url_image }}">
    @else
    <meta property="og:image" content="{{ asset('assets/img/gallery/perdana.webp') }}">
    @endif
    <meta property="og:site_name" content="Career Sampharindo Group">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $job->position }} - Lowongan Kerja Sampharindo Group">
    <meta name="twitter:description" content="Detail kualifikasi dan tanggung jawab untuk posisi {{ $job->position }} di Sampharindo Group. Segera kirimkan lamaran Anda!">
    @if(!empty($job->url_image))
    <meta name="twitter:image" content="{{ env('SIMCO_URL', 'https://simco.sampharindogroup.com') }}/view-job-image/{{ $job->url_image }}">
    @else
    <meta name="twitter:image" content="{{ asset('assets/img/gallery/perdana.webp') }}">
    @endif

    {{-- JSON-LD JobPosting for Google For Jobs --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "JobPosting",
      "title": "{{ $job->position }}",
      "description": "{!! addslashes(strip_tags($job->qualification . $job->job_description)) !!}",
      "datePosted": "{{ \Carbon\Carbon::parse($job->created_at)->format('Y-m-d') }}",
      "validThrough": "2026-12-31T23:59:59Z",
      "employmentType": "FULL_TIME",
      "hiringOrganization": {
        "@type": "Organization",
        "name": "PT Sampharindo Perdana",
        "sameAs": "https://sampharindogroup.com",
        "logo": "https://simco.sampharindogroup.com/assets/icon.ico"
      },
      "jobLocation": {
        "@type": "Place",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Jl. Tambak Aji Timur I No. 1",
          "addressLocality": "Semarang",
          "addressRegion": "Jawa Tengah",
          "postalCode": "50185",
          "addressCountry": "ID"
        }
      },
      "baseSalary": {
        "@type": "MonetaryAmount",
        "currency": "IDR",
        "value": {
          "@type": "QuantitativeValue",
          "value": 0,
          "unitText": "MONTH"
        }
      }
    }
    </script>

    {{-- JSON-LD BreadcrumbList for SERP --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://career.sampharindogroup.com"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Lowongan",
          "item": "https://career.sampharindogroup.com/#available-jobs"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $job->position }}",
          "item": "{{ url()->current() }}"
        }
      ]
    }
    </script>
@endsection

@section('content')
        <div class="page-title dark-background">
            <div class="container position-relative">
                {{-- JUDUL HALAMAN (H1) di sini --}}
                <h1>{{ $job->position }}</h1>

                {{-- DESKRIPSI SINGKAT KONSISTEN --}}
                <p>Detail lengkap posisi, kualifikasi, dan deskripsi pekerjaan untuk lowongan di Sampharindo Group.</p>

                <nav class="breadcrumbs">
                    <ol>
                        {{-- BREADCRUMB 1: HOME (TAUTAN) --}}
                        {{-- class="current" TIDAK digunakan di sini karena ini bukan halaman home --}}
                        <li><a href="{{ route('jobs.index') }}">Home</a></li>

                        {{-- BREADCRUMB 2: LOWONGAN (TAUTAN ke section #available-jobs) --}}
                        <li><a href="{{ route('jobs.index') }}#available-jobs">Lowongan</a></li>

                        {{-- BREADCRUMB 3: JUDUL LOWONGAN (AKTIF, BUKAN TAUTAN) --}}
                        <li class="current">{{ $job->position }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="job-detail" class="detail section pt-5 mt-5">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">

                        <h1 class="fw-bold mb-3">{{ $job->position }}</h1>
                        <p class="mb-5">
                            <span
                                class="badge {{ $job->status == 'Open' ? 'bg-success' : 'bg-secondary' }}">{{ $job->status }}</span>
                            <span class="text-muted small ms-3"><i class="bi bi-clock"></i> Dipublikasikan:
                                {{ $job->created_at ?? 'Tanggal Tidak Tersedia' }}</span>
                        </p>

                        @if(!empty($job->url_image))
                        <div class="mb-5 text-center" data-aos="zoom-in">
                            <a href="{{ env('SIMCO_URL', 'https://simco.sampharindogroup.com') }}/view-job-image/{{ $job->url_image }}" class="glightbox" data-gallery="flyer-gallery" title="Flyer {{ $job->position }}">
                                <img src="{{ env('SIMCO_URL', 'https://simco.sampharindogroup.com') }}/view-job-image/{{ $job->url_image }}" alt="Flyer {{ $job->position }}" class="img-fluid rounded shadow" style="max-height: 600px; width: auto;">
                            </a>
                            <p class="text-muted small mt-2"><i class="bi bi-zoom-in"></i> Klik gambar untuk memperbesar</p>
                        </div>
                        @endif

                        <div class="card p-4 mb-4 border-0 shadow-sm">
                            <h2 class="h5 fw-bold text-primary mb-3">Kualifikasi Utama</h2>
                            <div class="text-secondary detail-content">
                                {!! $job->qualification !!}
                            </div>
                        </div>

                        <div class="card p-4 mb-5 border-0 shadow-sm">
                            <h2 class="h5 fw-bold text-primary mb-3">Deskripsi Pekerjaan / Tanggung Jawab</h2>
                            <div class="text-secondary detail-content">
                                {!! $job->job_description !!}
                            </div>
                        </div>
                        <div class="mt-5 mb-5 text-center">
                            <p class="fw-bold mb-3 text-secondary">Bagikan Lowongan Ini:</p>

                            {{-- Ambil URL Lowongan Saat Ini secara dinamis --}}
                            @php
                                $shareUrl = url()->current();
                                $shareTitle = 'Lowongan Kerja: ' . $job->position . ' - Sampharindo Group';
                            @endphp

                            <div class="d-flex justify-content-center gap-3 fs-3">

                                {{-- WhatsApp Icon --}}
                                <a href="https://wa.me/?text={{ urlencode($shareTitle . ' - Segera Lamar di: ' . $shareUrl) }}"
                                    target="_blank" class="text-success hover-scale" title="Bagikan ke WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>

                                {{-- Facebook Icon --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                                    target="_blank" class="text-primary hover-scale" title="Bagikan ke Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>

                                {{-- LinkedIn Icon --}}
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}&title={{ urlencode($shareTitle) }}"
                                    target="_blank" style="color: #0077B5;" class="hover-scale"
                                    title="Bagikan ke LinkedIn">
                                    <i class="bi bi-linkedin"></i>
                                </a>

                                {{-- Email Icon --}}
                                <a href="mailto:?subject={{ urlencode($shareTitle) }}&body={{ urlencode('Hai, saya menemukan lowongan menarik: ' . $shareTitle . '. Lihat detailnya di: ' . $shareUrl) }}"
                                    target="_blank" class="text-danger hover-scale" title="Bagikan via Email">
                                    <i class="bi bi-envelope-fill"></i>
                                </a>

                            </div>
                        </div>  

                        <hr class="mt-5">

                        @if ($job->status === 'Open')
                            <div class="text-center mt-5">
                                <a href="https://simco.sampharindogroup.com/rekrutmen/{{ $job->id }}"
                                    class="btn btn-primary btn-lg fw-bold px-5" target="_blank">
                                    <i class="bi bi-send me-2"></i> Lamar Posisi Ini
                                </a>
                                <p class="small text-muted mt-3">Tautan akan mengarahkan Anda ke portal aplikasi resmi
                                    kami.</p>
                            </div>
                        @else
                            <div class="alert alert-warning text-center mt-5" role="alert">
                                Lowongan ini sudah **ditutup**. Terima kasih atas minat Anda!
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>
@endsection
