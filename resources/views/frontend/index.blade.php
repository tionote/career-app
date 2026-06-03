@extends('frontend.layouts.app')

@section('title', 'Sampharindo Group - Lowongan Kerja & Karir Resmi (PT Sampharindo Perdana)')

@section('meta')
    <meta name="description" content="Portal Karir Resmi Sampharindo Group. Temukan lowongan kerja terbaru di PT Sampharindo Perdana, Semarang. Bergabunglah dengan industri farmasi terkemuka sekarang!">
    <meta name="keywords" content="Sampharindo Group, Lowongan Kerja Sampharindo, Karir PT Sampharindo Perdana, Loker Farmasi Semarang, Rekrutmen Sampharindo, Kerja di Sampharindo">

    {{-- Open Graph / Social Media Meta Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Sampharindo Group - Lowongan Kerja & Karir Resmi">
    <meta property="og:description" content="Portal Karir Resmi Sampharindo Group. Temukan lowongan kerja terbaru di PT Sampharindo Perdana, Semarang. Bergabunglah dengan industri farmasi terkemuka sekarang!">
    <meta property="og:image" content="{{ asset('assets/img/gallery/perdana.webp') }}">
    <meta property="og:site_name" content="Career Sampharindo Group">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Sampharindo Group - Lowongan Kerja & Karir Resmi">
    <meta name="twitter:description" content="Portal Karir Resmi Sampharindo Group. Temukan lowongan kerja terbaru di PT Sampharindo Perdana, Semarang. Bergabunglah dengan industri farmasi terkemuka sekarang!">
    <meta name="twitter:image" content="{{ asset('assets/img/gallery/perdana.webp') }}">

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Sampharindo Group",
      "alternateName": "PT Sampharindo Perdana",
      "url": "https://career.sampharindogroup.com",
      "logo": "https://simco.sampharindogroup.com/assets/icon.ico",
      "sameAs": [
        "https://www.instagram.com/career.sampharindo",
        "https://www.linkedin.com/company/sampharindogroup"
      ]
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "PT Sampharindo Perdana (Sampharindo Group)",
      "image": "https://career.sampharindogroup.com/assets/img/gallery/perdana.webp",
      "@id": "https://career.sampharindogroup.com",
      "url": "https://career.sampharindogroup.com",
      "telephone": "+62247604318",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Jl. Tambak Aji Timur I No. 1",
        "addressLocality": "Semarang",
        "postalCode": "50185",
        "addressRegion": "Jawa Tengah",
        "addressCountry": "ID"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": -6.9890,
        "longitude": 110.3340
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday"
        ],
        "opens": "08:00",
        "closes": "17:00"
      }
    }
    </script>
@endsection

@section('content')
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade"
                data-bs-ride="carousel">

                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Wujudkan Potensi Terbaik Anda Bersama Kami
                            <span>di Sampharindo Group (<strong class="d-inline-block">Loker Farmasi Semarang</strong>)</span>
                        </h2>
                        <p class="animate__animated animate__fadeInUp">PT. Sampharindo Perdana adalah tempat bagi para
                            profesional yang ingin membuat perbedaan. <strong class="d-inline-block">Temukan Lowongan Kerja Farmasi di Semarang dan raih Karir Terbaik Anda Sekarang!</strong></p>
                        <a href="#available-jobs" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lihat Lowongan Terbaru</a>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Tempat di Mana Karier Anda Bersemi</h2>
                        <p class="animate__animated animate__fadeInUp">Bergabunglah dengan tim dinamis di <strong>PT Sampharindo Perdana</strong> yang suportif. Kami menciptakan lingkungan kerja yang positif, di mana ide-ide Anda didengarkan
                            dan potensi Anda dihargai. Mulailah perjalanan karier Anda yang berarti bersama kami.</p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Selengkapnya</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Berkembang Bersama, Maju Bersama.</h2>
                        <p class="animate__animated animate__fadeInUp">Kami percaya setiap individu adalah aset
                            berharga. Di <strong>PT Sampharindo Perdana</strong>, kami tidak hanya menawarkan pekerjaan, tapi juga
                            kesempatan untuk berkembang, berinovasi, dan berkontribusi nyata.</p>
                        <a href="#available-jobs" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lihat Lowongan</a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section>        <section id="about" class="about section pt-5 pb-5">
            <div class="container" data-aos="fade-up">

                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6 about-img-wrap" data-aos="zoom-in" data-aos-delay="200">
                        <div class="position-relative shadow rounded-4 overflow-hidden">
                            <img src="{{ asset('assets/img/gallery/perdana.webp') }}" alt="Pabrik PT Sampharindo Perdana" class="img-fluid w-100" style="object-fit: cover; min-height: 400px;">
                            <div class="position-absolute bottom-0 start-0 p-4 bg-primary text-white" style="border-top-right-radius: 20px;">
                                <h3 class="fw-bold mb-0">Sejak 1974</h3>
                                <p class="mb-0 small">Membangun Kesehatan Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 content px-lg-5" data-aos="fade-up" data-aos-delay="100">
                        <span class="badge bg-primary-subtle text-primary mb-3 px-3 py-2 rounded-pill border border-primary">Tentang Kami</span>
                        <h2 class="fw-bold mb-4">Membangun Masa Depan Bersama <span class="text-primary">Sampharindo Group</span></h2>
                        <p class="text-muted mb-4" style="line-height: 1.8;">
                            Berawal dari <b>PT. Corolla</b> pada tahun 1974, Sampharindo Group telah berkembang menjadi salah satu pilar industri farmasi di Indonesia. Kami tidak hanya memproduksi obat, tetapi terus berinovasi membangun ekosistem kesehatan terpadu.
                        </p>

                        <div class="d-flex flex-column gap-3 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-box bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-1">Fasilitas Produksi Modern</h5>
                                    <p class="text-muted small mb-0">Ekspansi fasilitas sejak 1988 di Semarang, termasuk lini betalaktam dan pabrik retroviral terkemuka.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                                    <i class="bi bi-globe"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-1">Jangkauan Global & Nasional</h5>
                                    <p class="text-muted small mb-0">Mendistribusikan produk berkualitas tinggi hingga pelosok negeri dan berkolaborasi di kancah global.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="icon-box bg-info text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-1">Karir & Pertumbuhan Bersama</h5>
                                    <p class="text-muted small mb-0">Kami mencari talenta terbaik untuk maju, berinovasi, dan memberikan kontribusi nyata bagi masyarakat.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Subsidiary Cards --}}
                <div class="row gy-4 mt-5 pt-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-12 text-center mb-4">
                        <h3 class="fw-bold">Entitas <span class="text-primary">Bisnis Kami</span></h3>
                        <p class="text-muted">Ekosistem lengkap dari produksi hingga distribusi farmasi.</p>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 hover-lift">
                            <div class="mb-3 mx-auto d-flex align-items-center justify-content-center" style="height: 70px;">
                                <img src="{{ asset('assets/img/gallery/sp.webp') }}" class="img-fluid" style="max-height: 100%;" alt="Sampharindo Perdana">
                            </div>
                            <h5 class="fw-bold text-dark mt-2">Sampharindo Perdana</h5>
                            <p class="text-muted small mb-0 mt-2">Entitas utama yang terus berinovasi memproduksi berbagai produk farmasi berkualitas tinggi.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 hover-lift">
                            <div class="mb-3 mx-auto d-flex align-items-center justify-content-center" style="height: 70px;">
                                <img src="{{ asset('assets/img/gallery/spt.webp') }}" class="img-fluid" style="max-height: 100%;" alt="Sampharindo Putra Trading">
                            </div>
                            <h5 class="fw-bold text-dark mt-2">Sampharindo Putra Trading</h5>
                            <p class="text-muted small mb-0 mt-2">Didirikan pada tahun 2015 sebagai distributor tunggal produk-produk andalan dari Sampharindo Group.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 hover-lift">
                            <div class="mb-3 mx-auto d-flex align-items-center justify-content-center" style="height: 70px;">
                                <img src="{{ asset('assets/img/gallery/spi.webp') }}" class="img-fluid" style="max-height: 100%;" alt="Sampharindo Perdana Investama">
                            </div>
                            <h5 class="fw-bold text-dark mt-2">Sampharindo Investama</h5>
                            <p class="text-muted small mb-0 mt-2">Berfokus pada pengembangan aset, infrastruktur, dan investasi strategis untuk masa depan grup.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 hover-lift">
                            <div class="mb-3 mx-auto d-flex align-items-center justify-content-center" style="height: 70px;">
                                <img src="{{ asset('assets/img/gallery/sri.webp') }}" class="img-fluid" style="max-height: 100%;" alt="Sampharindo Retroviral Indonesia">
                            </div>
                            <h5 class="fw-bold text-dark mt-2">Sampharindo Retroviral</h5>
                            <p class="text-muted small mb-0 mt-2">Beroperasi secara global sejak 2018, berkolaborasi khusus dalam memproduksi obat retroviral kritis.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <style>
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                background-color: #ffffff;
            }
            .hover-lift:hover {
                transform: translateY(-8px);
                box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
                border-bottom: 4px solid var(--bs-primary);
            }
            .bg-primary-subtle {
                background-color: #e6f0ff;
            }
        </style>

        <section id="alur-rekrutmen" class="alur-rekrutmen section features-2">

            <div class="container section-title" data-aos="fade-up">
                <h2>ALUR RECRUITMENT SAMPHARINDO GROUP - <strong>Cara Melamar Kerja Farmasi</strong></h2>
                <p>Proses langkah demi langkah untuk bergabung bersama kami di <strong>PT. Sampharindo Perdana</strong>.</p>
            </div>
            <div class="container">

                <div class="row gy-4 justify-content-between">
                    <div class="alur-rekrutmen-image col-lg-4 d-flex align-items-center" data-aos="fade-up">
                        <img src="assets/img/alur-rekrutmen.webp" class="img-fluid"
                            alt="Tahapan Proses Rekrutmen Sampharindo Group dari Screening hingga Announcement">
                    </div>

                    <div class="col-lg-7 d-flex flex-column justify-content-center">

                        <div class="alur-rekrutmen-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-file-earmark-text flex-shrink-0"></i>
                            <div>
                                <h4>Screening Administration</h4>
                                <p>Kelengkapan administrasi seperti Form Permohonan, CV, KTP/SIM, Ijazah, Transkip
                                    Nilai, SKCK, Surat Keterangan Sehat, Sertifikat Vaksin, dan Pas Photo diperiksa.</p>
                            </div>
                        </div>

                        <div class="alur-rekrutmen-item d-flex mt-5" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-people flex-shrink-0"></i>
                            <div>
                                <h4>Interview</h4>
                                <p>Tahapan wawancara yang melibatkan <strong>Interview HR</strong> dan <strong>Interview User/Manager</strong>
                                    untuk karyawan baru.</p>
                            </div>
                        </div>

                        <div class="alur-rekrutmen-item d-flex mt-5" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-tools flex-shrink-0"></i>
                            <div>
                                <h4>Tes Bidang</h4>
                                <p>Tes seleksi yang sesuai dengan posisi yang dilamar, dapat berupa <strong>tes tertulis</strong>
                                    atau <strong>praktek</strong>.</p>
                            </div>
                        </div>

                        <div class="alur-rekrutmen-item d-flex mt-5" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-headset flex-shrink-0"></i>
                            <div>
                                <h4>Psikotest</h4>
                                <p>Meliputi Tes <strong>IQ, Kepribadian, dan Sikap Kerja</strong> untuk memahami kemampuan dan
                                    kecocokan, dilakukan secara *offline* maupun *online*.</p>
                            </div>
                        </div>

                        <div class="alur-rekrutmen-item d-flex mt-5" data-aos="fade-up" data-aos-delay="600">
                            <i class="bi bi-bullhorn flex-shrink-0"></i>
                            <div>
                                <h4>Announcement</h4>
                                <p>Pengumuman kandidat yang lolos akan diberitahukan oleh <strong>Tim HRD PT Sampharindo</strong>.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>

        <section id="available-jobs" class="services section">

            <div class="container section-title" data-aos="fade-up">
                <h2><strong>Lowongan Kerja Terbaru</strong> Sampharindo Group (Loker Farmasi)</h2>
                <p>Temukan kesempatan <strong>karier di bidang Farmasi</strong> yang sesuai dengan keahlian Anda di <strong>PT. Sampharindo Perdana</strong>. Kami membuka pintu bagi talenta terbaik untuk berkembang bersama kami.</p>
            </div>

            <div class="container">
                
                {{-- Company Filter Tabs --}}
                <div class="row mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 text-center">
                        <div class="company-filter-buttons d-inline-flex flex-wrap gap-2 justify-content-center p-2 rounded-4 shadow-sm bg-light">
                            <button type="button" class="btn btn-filter active px-4 py-2 rounded-pill fw-bold border-0" data-filter="all">
                                <i class="bi bi-grid-fill me-1"></i> Semua Perusahaan
                            </button>
                            @foreach($companies as $company)
                                <button type="button" class="btn btn-filter px-4 py-2 rounded-pill fw-bold border-0" data-filter="{{ $company->id }}">
                                    <i class="bi bi-building me-1"></i> {{ $company->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row gy-4" id="jobs-container">

                    @foreach ($jobs as $job)
                    <script type="application/ld+json">
                    {
                      "@context": "https://schema.org",
                      "@type": "JobPosting",
                      "title": "{{ $job->position }} - {{ $job->company->name ?? 'Sampharindo Group' }}",
                      "description": "{!! addslashes(strip_tags($job->qualification . $job->job_description)) !!}",
                      "datePosted": "{{ \Carbon\Carbon::parse($job->created_at)->format('Y-m-d') }}", 
                      "validThrough": "2026-12-31T23:59:59Z", 
                      "employmentType": "FULL_TIME",
                      "hiringOrganization": {
                        "@type": "Organization",
                        "name": "{{ $job->company->name ?? 'PT Sampharindo Perdana' }}",
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
                        <div class="col-lg-4 col-md-6 job-item-card" data-company-id="{{ $job->company_id }}" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden job-card-hover">
                                
                                {{-- Top Image/Placeholder --}}
                                <div class="job-img-wrapper position-relative" style="height: 220px;">
                                    @if(!empty($job->url_image))
                                        <img src="{{ env('SIMCO_URL', 'https://simco.sampharindogroup.com') }}/view-job-image/{{ $job->url_image }}" alt="Flyer {{ $job->position }}" class="w-100 h-100" style="object-fit: cover;">
                                    @else
                                        <div class="w-100 h-100 job-placeholder">
                                            <i class="bi bi-briefcase"></i>
                                        </div>
                                    @endif
                                    
                                    {{-- Status Badge --}}
                                    <span class="badge {{ $job->status == 'Open' ? 'bg-success' : 'bg-secondary' }} position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                                        {{ $job->status }}
                                    </span>
                                </div>

                                {{-- Card Body --}}
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="text-primary small fw-bold">
                                            <i class="bi bi-clock me-1"></i> {{ date('d M Y', strtotime($job->created_at)) }}
                                        </div>
                                        @if($job->company)
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 small fw-bold" style="font-size: 0.72rem; letter-spacing: 0.2px;">
                                                <i class="bi bi-building me-0.5"></i> {{ $job->company->name }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-1 small fw-bold" style="font-size: 0.72rem; letter-spacing: 0.2px;">
                                                Sampharindo Group
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <h4 class="card-title fw-bold text-dark mb-3" style="font-size: 1.25rem; line-height: 1.4;">
                                        {{ $job->position }}
                                    </h4>
                                    
                                    <p class="card-text text-muted small mb-4 flex-grow-1">
                                        {{ Str::limit(strip_tags($job->qualification), 120) }}
                                    </p>
                                </div>

                                {{-- Card Footer --}}
                                <div class="card-footer bg-white border-0 px-4 pb-4 pt-0">
                                    <a href="{{route('jobs.show', ['slug' => Str::slug($job->position) . '-' . $job->id]) }}" class="btn btn-outline-primary w-100 rounded-pill fw-bold stretched-link d-flex justify-content-center align-items-center gap-2" style="transition: all 0.3s;">
                                        Lihat Detail <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            
            <style>
                .company-filter-buttons {
                    background-color: #f8f9fa;
                    border: 1px solid rgba(0,0,0,0.06);
                    box-shadow: 0 10px 30px rgba(0,0,0,0.04) !important;
                }
                .btn-filter {
                    color: #555;
                    background-color: transparent;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    font-size: 0.88rem;
                }
                .btn-filter:hover {
                    color: var(--bs-primary);
                    background-color: rgba(13, 110, 253, 0.08);
                }
                .btn-filter.active {
                    color: #fff !important;
                    background-color: var(--bs-primary);
                    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
                }
                .job-item-card {
                    transition: opacity 0.35s ease, transform 0.35s ease;
                    opacity: 1;
                    transform: scale(1);
                }
                .bg-primary-subtle {
                    background-color: #e6f0ff !important;
                }
                .border-primary-subtle {
                    border-color: #b3d1ff !important;
                }
                .job-card-hover {
                    transition: all 0.3s ease;
                    border: 1px solid rgba(0,0,0,0.05) !important;
                }
                .job-card-hover:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
                }
                .job-img-wrapper {
                    overflow: hidden;
                    background-color: #f8f9fa;
                }
                .job-img-wrapper img {
                    transition: transform 0.5s ease;
                }
                .job-card-hover:hover .job-img-wrapper img {
                    transform: scale(1.05);
                }
                .job-placeholder {
                    background: linear-gradient(135deg, #f0f7ff 0%, #e0edff 100%);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .job-placeholder i {
                    font-size: 4rem;
                    color: rgba(13, 110, 253, 0.2);
                }
                .job-card-hover:hover .btn-outline-primary {
                    background-color: var(--bs-primary);
                    color: white;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const filterButtons = document.querySelectorAll('.btn-filter');
                    const jobCards = document.querySelectorAll('.job-item-card');

                    filterButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            // Hapus kelas aktif dari semua tombol
                            filterButtons.forEach(btn => btn.classList.remove('active'));
                            // Tambahkan kelas aktif ke tombol yang diklik
                            this.classList.add('active');

                            const filterValue = this.getAttribute('data-filter');

                            jobCards.forEach(card => {
                                const cardCompanyId = card.getAttribute('data-company-id');
                                
                                if (filterValue === 'all' || cardCompanyId === filterValue) {
                                    card.style.display = '';
                                    setTimeout(() => {
                                        card.style.opacity = '1';
                                        card.style.transform = 'scale(1)';
                                    }, 20);
                                } else {
                                    card.style.opacity = '0';
                                    card.style.transform = 'scale(0.95)';
                                    setTimeout(() => {
                                        if (card.style.opacity === '0') {
                                            card.style.display = 'none';
                                        }
                                    }, 350);
                                }
                            });
                        });
                    });
                });
            </script>
        </section>

        <section id="call-to-action" class="call-to-action section dark-background">
            <img src="assets/img/cta-bg.webp" alt="Kantor Sampharindo Group, PT Sampharindo Perdana">
            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Siap Mengembangkan Karier Anda Bersama Kami?</h3>
                            <p>Temukan kesempatan karier yang sesuai dengan keahlian Anda dan mari bersama-sama
                                membangun masa depan yang lebih baik di <strong>PT. Sampharindo Perdana</strong>.</p>
                            <a class="cta-btn" href="#available-jobs">Lihat Lowongan Tersedia</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="gallery" class="gallery section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery <strong>Aktivitas Sampharindo Group</strong></h2>
            </div><div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/audithalal.webp') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/audithalal.webp') }}" alt="Kegiatan Audit Halal PT Sampharindo Perdana" class="img-fluid">
                            </a>
                        </div>
                    </div><div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/iso.webp') }}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/iso.webp') }}" alt="Sertifikat ISO Kualitas PT Sampharindo" class="img-fluid">
                            </a>
                        </div>
                    </div><div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/posong.webp') }}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/posong.webp') }}" alt="Foto Bersama Karyawan Sampharindo Group saat acara Team Building" class="img-fluid">
                            </a>
                        </div>
                    </div><div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/posong2.webp') }}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/posong2.webp') }}" alt="Suasana Rekreasi Bersama Karyawan Sampharindo Group" class="img-fluid">
                            </a>
                        </div>
                    </div></div>

            </div>

        </section>
@endsection