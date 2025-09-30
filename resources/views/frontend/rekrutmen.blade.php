@extends("frontend.body.parent")

{{-- Push title ke stack mtitle di parent --}}
@push('mtitle')
{{ $title ?? 'Form Rekrutmen' }} -
@endpush

@section("contentfrontend")
<div class="auth-main form-rekrutmen-sampharindo">
    <div class="auth-wrapper v3">
        <div class="auth-form">
            <div class="card-body cardbody-rekrutmen">

                <div class="text-center mb-4">
                    <h2 class="fw-bold">Form Rekrutmen Sampharindo Group</h2>
                </div>
                <div id="alertContainer"></div>

                <form id="rekrutmenForm" enctype="multipart/form-data">
                    @csrf
                    {{-- Validasi Error --}}
                    {{-- Pesan error dari validasi server --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Step 1: Input NIK --}}
                    <div id="nik-form">
                        <div class="container-lg">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        {{-- ID disesuaikan untuk step 1 --}}
                                        <input type="text" class="form-control" id="no_ktp_step1" name="no_ktp_step1" placeholder="No. KTP" required>
                                        <label for="no_ktp_step1">No. KTP</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    {{-- Tombol Lanjut --}}
                                    <button type="button" class="btn btn-primary w-50 mt-4" id="continueBtn">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 2: Formulir Lengkap (Awalnya disembunyikan) --}}
                    <div id="full-form" style="display:none;">
                        <div class="container-lg">
                            <div class="row g-3">
                                @php
                                $fields = [
                                    // No. KTP akan diisi dari step 1 dan jadi readonly
                                    // ['id' => 'no_ktp', 'label' => 'No. KTP', 'type' => 'text', 'readonly' => true],
                                    ['id' => 'nama', 'label' => 'Nama Lengkap', 'type' => 'text'],
                                    ['id' => 'email', 'label' => 'Email', 'type' => 'email'],
                                    ['id' => 'no_hp', 'label' => 'Nomor Handphone', 'type' => 'text'],
                                    ['id' => 'tempat_lahir', 'label' => 'Tempat Lahir', 'type' => 'text'],
                                    ['id' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'type' => 'date'],
                                    ['id' => 'asal_sekolah', 'label' => 'Asal Sekolah/Universitas', 'type' => 'text'],
                                    ['id' => 'jurusan', 'label' => 'Jurusan', 'type' => 'text'],
                                ];
                                @endphp

                                {{-- Input No. KTP, akan diisi dari step 1 dan menjadi readonly --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No. KTP" readonly>
                                        <label for="no_ktp">No. KTP</label>
                                    </div>
                                </div>

                                {{-- Loop untuk field umum --}}
                                @foreach ($fields as $field)
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="{{ $field['type'] }}" class="form-control" id="{{ $field['id'] }}" name="{{ $field['id'] }}" placeholder="{{ $field['label'] }}" {{ $field['id'] === 'no_ktp' ? 'readonly' : '' }}>
                                            <label for="{{ $field['id'] }}">{{ $field['label'] }}</label>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- Pilihan Pendidikan Terakhir --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="pendidikan" name="pendidikan">
                                            <option value="">-- Pilih Pendidikan Terakhir --</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SMK">SMK</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                    </div>
                                </div>

                                {{-- Tahun Lulus --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        {{-- Gunakan type="number" untuk tahun --}}
                                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus">
                                        <label for="tahun_lulus">Tahun Lulus</label>
                                    </div>
                                </div>
                                
                                {{-- Info Loker Dari --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="sumber_info" name="sumber_info">
                                            <option value="">-- Info Loker Dari --</option>
                                            <option value="WEBSITE">WEBSITE</option>
                                            <option value="TEMAN">TEMAN</option>
                                            <option value="KELUARGA">KELUARGA</option>
                                            <option value="MEDIA SOSIAL">MEDIA SOSIAL</option>
                                            <option value="LAINNYA">LAINNYA</option> {{-- Tambahkan opsi lain --}}
                                        </select>
                                        <label for="sumber_info">Info Loker Dari</label>
                                    </div>
                                </div>

                                {{-- Pilih Bagian --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="bagian" name="bagian">
                                            <option value="">-- Pilih Bagian --</option> {{-- Tambahkan opsi default --}}
                                            @isset($bagianList) {{-- Pastikan $bagianList ada --}}
                                                @foreach ($bagianList as $bagian)
                                                    <option value="{{ $bagian }}">{{ $bagian }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        <label for="bagian">Pilih Bagian</label>
                                    </div>
                                </div>

                                {{-- Gaji Diinginkan --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="gaji_diinginkan" name="gaji_diinginkan">
                                            <option value="">-- Gaji Diinginkan --</option> {{-- Tambahkan opsi default --}}
                                            @foreach (['Rp 3.000.000', 'Rp 5.000.000', 'Rp 7.000.000', 'Rp 10.000.000', 'Rp 12.000.000', 'Lainnya'] as $gaji)
                                                <option value="{{ $gaji }}">{{ $gaji }}</option>
                                            @endforeach
                                        </select>
                                        <label for="gaji_diinginkan">Gaji Diinginkan</label>
                                    </div>
                                </div>

                                {{-- Jenis Kelamin --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                    </div>
                                </div>

                                {{-- Pas Foto --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="file" class="form-control" id="pas_photo" name="pas_photo" accept="image/*">
                                        <label for="pas_photo">Pas Foto (Maks. 500kb)</label>
                                        {{-- Tambahkan hint ukuran file di label --}}
                                    </div>
                                </div>

                                {{-- Alamat Lengkap --}}
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" placeholder="Alamat Lengkap" style="height: 100px"></textarea>
                                        <label for="alamat_lengkap">Alamat Lengkap</label>
                                    </div>
                                </div>

                                {{-- Wilayah (Provinsi, Kota, Kecamatan, Kelurahan) --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="provinsi" name="provinsi">
                                            <option value="">-- Pilih Provinsi --</option>
                                            {{-- Opsi akan diisi oleh JavaScript --}}
                                        </select>
                                        <label for="provinsi">Provinsi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="kota" name="kota">
                                            <option value="">-- Pilih Kota --</option>
                                            {{-- Opsi akan diisi oleh JavaScript --}}
                                        </select>
                                        <label for="kota">Kota</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="kecamatan" name="kecamatan">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            {{-- Opsi akan diisi oleh JavaScript --}}
                                        </select>
                                        <label for="kecamatan">Kecamatan</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="kelurahan" name="kelurahan">
                                            <option value="">-- Pilih Kelurahan --</option>
                                            {{-- Opsi akan diisi oleh JavaScript --}}
                                        </select>
                                        <label for="kelurahan">Kelurahan</label>
                                    </div>
                                </div>

                                {{-- Kolom Referral --}}
                                @if (!empty($referral))
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="referral" name="referral" value="{{ $referral }}" readonly>
                                            <label for="referral">Reff</label>
                                        </div>
                                    </div>
                                @endif

                                {{-- Ringkasan Diri --}}
                                <div class="col-md-12">
                                    <label for="ringkasan">Ringkasan</label>
                                    <textarea class="form-control" id="ringkasan" name="ringkasan" placeholder="Ceritakan tentang diri Anda..." style="height: 100px"></textarea>
                                </div>
                            </div>
                            <br>

                            {{-- Pengalaman Kerja --}}
                            <div class="form-group">
                                <label for="pengalaman_kerja"><h3>Pengalaman Kerja</h3></label>
                                <div class="section-loop" id="experience-container">
                                    {{-- Pengalaman pertama, akan dirender langsung --}}
                                    <div id="experienceform-1" class="p-2 my-1 container-loopfields" style="background-color:#f5f5f5;">
                                        <p><b>Pengalaman 1</b></p>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <small>Nama Perusahaan</small>
                                                <input type="text" name="experience_company[]" class="form-control">
                                            </div>
                                            <div class="col-md-5">
                                                <small>Posisi</small>
                                                <input type="text" name="experience_position[]" class="form-control">
                                            </div>
                                            <div class="col-md-10">
                                                <small>Jobdeks</small>
                                                <textarea class="form-control" name="experience_job[]" placeholder="Jobdeks" style="height: 100px"></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <small>Tanggal Masuk</small>
                                                <input type="date" name="experience_duration_start[]" class="form-control">
                                            </div>
                                            <div class="col-md-5">
                                                <small>Tanggal Keluar</small>
                                                <input type="date" name="experience_duration_end[]" class="form-control">
                                            </div>
                                            <div class="col-md-1">
                                                {{-- Tombol hapus --}}
                                                <button class="btn btn-danger btn-sm m-1" onclick="removeExperience(1)" type="button"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary mt-2" id="add-experience">Tambah Pengalaman</button>
                            </div>

                            {{-- Tombol Kirim Lamaran --}}
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 mt-4">Kirim Lamaran</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section("footer")
    <footer id="footer" class="footer light-background">
        <div class="container">
            <h3 class="sitename">CAREER SAMPHARINDO</h3>
            <p>Bergabunglah dengan tim kami dan kembangkan potensi Anda!</p>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <span>Copyright</span> <strong class="px-1 sitename">PT. Sampharindo Perdana</strong> <span>All Rights
                        Reserved</span>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Developed by <a href="https://simco.sampharindogroup.com/">O.R</a> © <a
                        href="https://simco.sampharindogroup.com/" target="_blank">it.hrd.sp</a>
                </div>
            </div>
        </div>
    </footer>

@endsection --}}

{{-- Pindahkan script ke dalam @push('fescripts') agar terender di bagian bawah body parent --}}
@push('fescripts')
{{-- Pastikan jQuery sudah dimuat di parent.blade.php atau tambahkan di sini --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- Pastikan SweetAlert2 sudah dimuat di parent.blade.php atau tambahkan di sini --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script>
    let experienceCount = 1;

    // Fungsi untuk menambah pengalaman kerja
    document.getElementById("add-experience").addEventListener("click", function() {
        experienceCount++;
        const container = document.getElementById("experience-container");

        const html = `
        <div id="experienceform-${experienceCount}" class="p-2 my-1 container-loopfields" style="background-color:#f5f5f5;">
            <p><b>Pengalaman ${experienceCount}</b></p>
            <div class="row">
                <div class="col-md-5">
                    <small>Nama Perusahaan</small>
                    <input type="text" name="experience_company[]" class="form-control">
                </div>
                <div class="col-md-5">
                    <small>Posisi</small>
                    <input type="text" name="experience_position[]" class="form-control">
                </div>
                <div class="col-md-10">
                    <small>Jobdeks</small>
                    <textarea class="form-control" name="experience_job[]" placeholder="Jobdeks" style="height: 100px"></textarea>
                </div>
                <div class="col-md-5">
                    <small>Tanggal Masuk</small>
                    <input type="date" name="experience_duration_start[]" class="form-control">
                </div>
                <div class="col-md-5">
                    <small>Tanggal Keluar</small>
                    <input type="date" name="experience_duration_end[]" class="form-control">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-danger btn-sm m-1" onclick="removeExperience(${experienceCount})" type="button"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
    });

    // Fungsi untuk menghapus pengalaman kerja
    function removeExperience(id) {
        const element = document.getElementById(`experienceform-${id}`);
        if (element) {
            // experienceCount--; // Tidak perlu decrement jika kita hanya menghapus elemen
            element.remove();
        }
    }

    // Handler untuk tombol Lanjut (Langkah 1)
    $('#continueBtn').on('click', function() {
        const noKtp = $('#no_ktp_step1').val().trim(); // Trim untuk menghapus spasi
        if (!noKtp) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Nomor KTP harus diisi.',
            });
            return;
        }

        // Panggil AJAX untuk memeriksa NIK di server
        $.ajax({
            url: "{{ route('rekrutmen.checkNik') }}", // Pastikan route ini ada di web.php
            type: "POST",
            data: {
                no_ktp: noKtp,
                _token: "{{ csrf_token() }}"
            },
            dataType: 'json', // Pastikan server mengembalikan JSON
            success: function(response) {
                if (response.status) {
                    // NIK valid, sembunyikan formulir NIK dan tampilkan formulir lengkap
                    $('#nik-form').hide();
                    $('#full-form').show();
                    // Isi NIK dan jadikan readonly
                    $('#no_ktp').val(noKtp).prop('readonly', true);
                } else {
                    // NIK tidak valid, tampilkan pesan error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'NIK tidak valid atau sudah terdaftar.',
                    });
                }
            },
            error: function(xhr, status, error) {
                let msg = 'Terjadi kesalahan saat memeriksa NIK.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                } else if (error) {
                    msg = error;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error Koneksi',
                    text: msg,
                });
                console.error("AJAX Error:", status, error, xhr.responseText);
            }
        });
    });

    // Handler untuk pengiriman formulir lengkap (Langkah 2)
    $('#rekrutmenForm').on('submit', function(e) {
        e.preventDefault(); // Mencegah submit default form

        // Validasi sederhana sebelum mengirim
        const noKtpFull = $('#no_ktp').val().trim();
        const nama = $('#nama').val().trim();
        const email = $('#email').val().trim();
        const noHp = $('#no_hp').val().trim();
        const tanggalLahir = $('#tanggal_lahir').val();
        const pendidikan = $('#pendidikan').val();
        const asalSekolah = $('#asal_sekolah').val().trim();
        const jurusan = $('#jurusan').val().trim();
        const tahunLulus = $('#tahun_lulus').val().trim();
        const sumberInfo = $('#sumber_info').val();
        const bagian = $('#bagian').val();
        const gajiDiinginkan = $('#gaji_diinginkan').val();
        const jenisKelamin = $('#jenis_kelamin').val();
        const pasPhoto = $('#pas_photo')[0].files[0];
        const provinsi = $('#provinsi').val();
        const kota = $('#kota').val();
        const kecamatan = $('#kecamatan').val();
        const kelurahan = $('#kelurahan').val();
        const alamatLengkap = $('#alamat_lengkap').val().trim();
        const ringkasan = $('#ringkasan').val().trim();

        // Validasi ukuran file foto
        if (pasPhoto && pasPhoto.size > 500 * 1024) { // 500kb
            Swal.fire({
                icon: 'warning',
                title: 'Ukuran File Terlalu Besar',
                text: 'Ukuran pas foto tidak boleh melebihi 500kb.',
            });
            return;
        }

        // Validasi dasar, bisa ditambahkan sesuai kebutuhan
        if (!noKtpFull || !nama || !email || !noHp || !tanggalLahir || !pendidikan || !asalSekolah || !jurusan || !tahunLulus || !sumberInfo || !bagian || !gajiDiinginkan || !jenisKelamin || !provinsi || !kota || !kecamatan || !kelurahan || !alamatLengkap || !ringkasan) {
             Swal.fire({
                icon: 'warning',
                title: 'Validasi Gagal',
                text: 'Harap lengkapi semua kolom yang wajib diisi.',
            });
            return;
        }


        let formData = new FormData(this);
        // Pastikan _token disertakan dalam FormData jika tidak menggunakan helper @csrf
        // formData.append('_token', "{{ csrf_token() }}"); // Sudah otomatis jika menggunakan @csrf

        // Hilangkan alert error sebelumnya jika ada
        $('#alertContainer').empty();

        $.ajax({
            url: "{{ route('rekrutmen.store') }}", // Pastikan route ini ada
            type: "POST",
            data: formData,
            contentType: false, // Penting untuk pengiriman file
            processData: false, // Penting untuk pengiriman file
            dataType: 'json', // Asumsikan server mengembalikan JSON
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.alert ? response.alert.charAt(0).toUpperCase() + response.alert.slice(1) : (response.status ? 'Berhasil' : 'Gagal'),
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (response.status) {
                        // Jika berhasil, reset form dan kembali ke step 1
                        $('#rekrutmenForm')[0].reset();
                        $('#full-form').hide();
                        $('#nik-form').show();
                        // Kosongkan input KTP step 1
                        $('#no_ktp_step1').val('');
                        // Reset dropdown wilayah
                        $('#provinsi').val('');
                        $('#kota').html('<option value="">-- Pilih Kota --</option>');
                        $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                        $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>');
                        // Hapus elemen pengalaman kerja, kecuali yang pertama
                        $('.container-loopfields').not(':first').remove();
                        experienceCount = 1; // Reset counter
                    }
                });
            },
            error: function(xhr, status, error) {
                let msg = 'Terjadi kesalahan saat menyimpan data.';
                let errors = {};

                if (xhr.status === 422) { // Unprocessable Entity (Validation errors)
                    errors = xhr.responseJSON.errors;
                    let errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';
                    for (const field in errors) {
                        errors[field].forEach(err => {
                            errorHtml += `<li>${err}</li>`;
                        });
                    }
                    errorHtml += '</ul></div>';
                    $('#alertContainer').html(errorHtml); // Tampilkan error di alertContainer
                    // Scroll ke atas untuk melihat error
                    $('html, body').animate({
                        scrollTop: $("#alertContainer").offset().top - 100 // Offset sedikit agar tidak tertutup header
                    }, 500);

                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                } else if (error) {
                    msg = error;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: msg,
                    confirmButtonText: 'OK'
                });
                console.error("AJAX Error:", status, error, xhr.responseText);
            }
        });
    });

    // Script untuk dropdown wilayah
    $(document).ready(function() {
        // Panggil API untuk provinsi
        $.ajax({
            url: '/api/wilayah/provinces', // Asumsi Anda punya API endpoint ini
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let options = '<option value="">-- Pilih Provinsi --</option>';
                data.forEach(item => {
                    options += `<option value="${item.id}">${item.name}</option>`;
                });
                $('#provinsi').html(options);
            },
            error: function(xhr) {
                console.error("Error fetching provinces:", xhr.responseText);
                $('#provinsi').html('<option value="">Gagal memuat Provinsi</option>');
            }
        });

        // Listener untuk perubahan provinsi
        $('#provinsi').on('change', function() {
            const provinsiId = $(this).val();
            $('#kota').html('<option value="">-- Pilih Kota --</option>'); // Reset kota
            $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>'); // Reset kecamatan
            $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>'); // Reset kelurahan

            if (provinsiId) {
                $('#kota').html('<option value="">Loading...</option>');
                $.ajax({
                    url: `/api/wilayah/regencies/${provinsiId}`, // Asumsi endpoint ini
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let options = '<option value="">-- Pilih Kota --</option>';
                        data.forEach(item => {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#kota').html(options);
                    },
                    error: function(xhr) {
                        console.error("Error fetching regencies:", xhr.responseText);
                        $('#kota').html('<option value="">Gagal memuat Kota</option>');
                    }
                });
            }
        });

        // Listener untuk perubahan kota
        $('#kota').on('change', function() {
            const kotaId = $(this).val();
            $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>'); // Reset kecamatan
            $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>'); // Reset kelurahan

            if (kotaId) {
                $('#kecamatan').html('<option value="">Loading...</option>');
                $.ajax({
                    url: `/api/wilayah/districts/${kotaId}`, // Asumsi endpoint ini
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let options = '<option value="">-- Pilih Kecamatan --</option>';
                        data.forEach(item => {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#kecamatan').html(options);
                    },
                    error: function(xhr) {
                        console.error("Error fetching districts:", xhr.responseText);
                        $('#kecamatan').html('<option value="">Gagal memuat Kecamatan</option>');
                    }
                });
            }
        });

        // Listener untuk perubahan kecamatan
        $('#kecamatan').on('change', function() {
            const kecamatanId = $(this).val();
            $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>'); // Reset kelurahan

            if (kecamatanId) {
                $('#kelurahan').html('<option value="">Loading...</option>');
                $.ajax({
                    url: `/api/wilayah/villages/${kecamatanId}`, // Asumsi endpoint ini
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let options = '<option value="">-- Pilih Kelurahan --</option>';
                        data.forEach(item => {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#kelurahan').html(options);
                    },
                    error: function(xhr) {
                        console.error("Error fetching villages:", xhr.responseText);
                        $('#kelurahan').html('<option value="">Gagal memuat Kelurahan</option>');
                    }
                });
            }
        });
    });
</script>
@endpush