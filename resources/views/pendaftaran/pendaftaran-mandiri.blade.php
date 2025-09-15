<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pendaftaran Step by Step</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/vendor/waitMe/waitMe.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: url("{{ asset('assets/bg 2.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .step-card {
            max-width: 850px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.15);
            /* transparan putih */
            backdrop-filter: blur(12px);
            /* efek kaca blur */
            -webkit-backdrop-filter: blur(12px);
            /* support Safari */
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* garis halus */
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.2);
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
            gap: 5px;
        }

        .progress {
            position: absolute;
            top: 18px;
            left: 0;
            width: 100%;
            height: 4px;
            background: #e9ecef;
            border-radius: 5px;
            z-index: 1;
        }

        .progress-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            border-radius: 5px;
            transition: width 0.4s ease;
        }

        .step {
            text-align: center;
            flex: 1;
            z-index: 2;
        }

        .step span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #dee2e6;
            color: #000;
            font-weight: bold;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .step.active span,
        .step.completed span {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: #fff;
            box-shadow: 0 0 10px rgba(13, 110, 253, 0.5);
        }

        .step-label {
            margin-top: 8px;
            font-size: 14px;
            color: #030303ff;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            /* transparan putih */
            backdrop-filter: blur(8px);
            /* efek kaca */
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: #fff;
            /* teks putih */
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
            /* placeholder lebih samar */
        }

        .btn {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 500;
        }

        /* 🔹 Grup tombol navigasi */
        .btn-group-nav {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }

        /* 🔹 Responsif untuk layar kecil */
        @media (max-width: 576px) {
            .step-card {
                margin: 20px 10px;
                padding: 20px;
            }

            .step span {
                width: 32px;
                height: 32px;
                font-size: 12px;
            }

            .step-label {
                font-size: 12px;
            }

            .btn-group-nav {
                flex-direction: column;
            }

            .btn-group-nav .btn {
                width: 100%;
            }

            .form-label {
                color: #ffffff !important;
                /* Putih */
                font-weight: 600;
                /* Sedikit tebal */
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
                /* Biar jelas di atas background */
            }

            input,
            textarea {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="step-card">
        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="progress">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            <div class="step active"><span>1</span>
                <div class="step-label">Kelompok</div>
            </div>
            <div class="step"><span>2</span>
                <div class="step-label">Pendiri</div>
            </div>
            <div class="step"><span>3</span>
                <div class="step-label">Pengurus</div>
            </div>
            <div class="step"><span>4</span>
                <div class="step-label">Administrasi</div>
            </div>
            <div class="step"><span>5</span>
                <div class="step-label">Upload</div>
            </div>
        </div>

        <!-- Form -->
        <form id="formPendaftaran" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" name="id" id="id">

            <!-- Step 1 -->
            <div class="step-content" id="step1">
                <h4 class="mb-3 text-primary">📋 Data Kelompok</h4>
                <div class="mb-3"><label class="form-label">Nama Kelompok</label><input type="text"
                        class="form-control" name="nama_kelompok"></div>
                <div class="mb-3"><label class="form-label">Nomor Surat Permohonan</label><input type="text"
                        class="form-control" name="no_surat_permohonan"></div>
                <div class="mb-3"><label class="form-label">Tanggal Surat Permohonan</label><input type="date"
                        class="form-control" name="tgl_surat_permohonan"></div>
                <div class="mb-3"><label class="form-label">Hal Surat Permohonan</label><input type="text"
                        class="form-control" name="hal_surat_permohonan"></div>
                <div class="mb-3"><label class="form-label">Nomor Surat Dinas</label><input type="text"
                        class="form-control" name="no_surat_dinas"></div>
                <div class="mb-3"><label class="form-label">Tanggal Surat Dinas</label><input type="date"
                        class="form-control" name="tgl_surat_dinas"></div>
                <div class="mb-3"><label class="form-label">Hal Surat Dinas</label><input type="text"
                        class="form-control" name="hal_surat_dinas"></div>
                <div class="mb-3"><label class="form-label">Bidang Kegiatan</label><input type="text"
                        class="form-control" name="bidang_kegiatan"></div>
                <div class="mb-3"><label class="form-label">Program Kerja</label><input type="text"
                        class="form-control" name="program_kerja"></div>
                <div class="mb-3"><label class="form-label">Alamat Kantor</label>
                    <textarea class="form-control" name="alamat_kantor"></textarea>
                </div>
                <div class="mb-3"><label class="form-label">Tempat Pendirian</label><input type="text"
                        class="form-control" name="tempat_pendirian"></div>
                <div class="mb-3"><label class="form-label">Waktu Pendirian</label><input type="date"
                        class="form-control" name="waktu_pendirian"></div>
                <div class="mb-3"><label class="form-label">Asas</label><input type="text" class="form-control"
                        name="asas"></div>
                <div class="mb-3"><label class="form-label">Tujuan Kelompok</label><input type="text"
                        class="form-control" name="tujuan_kelompok"></div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-primary" onclick="nextStep()">Lanjut ➡️</button>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step-content d-none" id="step2">
                <h4 class="mb-3 text-success">👥 Data Pendiri & Pembina</h4>
                <div class="mb-3"><label class="form-label">Nama Pendiri</label><input type="text"
                        class="form-control" name="nama_pendiri"></div>
                <div class="mb-3"><label class="form-label">NIK Pendiri</label><input type="text"
                        name="nik_pendiri" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Agama Pendiri</label><select name="agama_pendiri"
                        class="form-control">
                        <option value="">-- Pilih Agama --</option>
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Katolik</option>
                        <option value="4">Hindu</option>
                        <option value="5">Buddha</option>
                        <option value="6">Konghucu</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Jenis Kelamin Pendiri</label><select name="jk_pendiri"
                        class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Tempat Lahir Pendiri</label><input type="text"
                        class="form-control" name="tl_pendiri"></div>
                <div class="mb-3"><label class="form-label">Tanggal Lahir Pendiri</label><input type="date"
                        class="form-control" name="tgll_pendiri"></div>
                <div class="mb-3"><label class="form-label">Status Kawin</label><select name="status_kawin_pendiri"
                        class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="1">Belum Kawin</option>
                        <option value="2">Kawin</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Alamat Pendiri</label>
                    <textarea class="form-control" name="alamat_pendiri"></textarea>
                </div>
                <div class="mb-3"><label class="form-label">No HP Pendiri</label><input type="text"
                        name="hp_pendiri" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Pekerjaan Pendiri</label><input type="text"
                        class="form-control" name="pekerjaan_pendiri"></div>
                <div class="mb-3"><label class="form-label">Nama Pembina</label><input type="text"
                        class="form-control" name="nama_pembina"></div>
                <div class="mb-3"><label class="form-label">Nama Penasehat</label><input type="text"
                        class="form-control" name="nama_penasehat"></div>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Kembali</button>
                <button type="button" class="btn btn-primary float-end" onclick="nextStep()">Lanjut ➡️</button>
            </div>

            <!-- Step 3 -->
            <div class="step-content d-none" id="step3">
                <h4 class="mb-3 text-warning">👔 Data Pengurus</h4>
                <!-- Ketua -->
                <div class="mb-3"><label class="form-label">Nama Ketua</label><input type="text"
                        class="form-control" name="nama_ketua_pengurus"></div>
                <div class="mb-3"><label class="form-label">NIK Ketua</label><input type="text"
                        name="nik_ketua_pengurus" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Agama Ketua</label><select name="agama_ketua_pengurus"
                        class="form-control">
                        <option value="">-- Pilih Agama --</option>
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Katolik</option>
                        <option value="4">Hindu</option>
                        <option value="5">Buddha</option>
                        <option value="6">Konghucu</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Jenis Kelamin Ketua</label><select
                        name="jk_ketua_pengurus" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Tempat Lahir Ketua</label><input type="text"
                        class="form-control" name="tl_ketua_pengurus"></div>
                <div class="mb-3"><label class="form-label">Tanggal Lahir Ketua</label><input type="date"
                        class="form-control" name="tgll_ketua_pengurus"></div>
                <div class="mb-3"><label class="form-label">Status Kawin Ketua</label><select
                        name="status_kawin_ketua_pengurus" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="1">Belum Kawin</option>
                        <option value="2">Kawin</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Alamat Ketua</label>
                    <textarea class="form-control" name="alamat_ketua_pengurus"></textarea>
                </div>
                <div class="mb-3"><label class="form-label">No HP Ketua</label><input type="text"
                        name="hp_ketua_pengurus" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Pekerjaan Ketua</label><input type="text"
                        class="form-control" name="pekerjaan_ketua_pengurus"></div>

                <!-- Sekretaris -->
                <hr>
                <div class="mb-3"><label class="form-label">Nama Sekretaris</label><input type="text"
                        class="form-control" name="nama_sekretaris_pengurus"></div>
                <div class="mb-3"><label class="form-label">NIK Sekretaris</label><input type="text"
                        name="nik_sekretaris_pengurus" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Agama Sekretaris</label><select
                        name="agama_sekretaris_pengurus" class="form-control">
                        <option value="">-- Pilih Agama --</option>
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Katolik</option>
                        <option value="4">Hindu</option>
                        <option value="5">Buddha</option>
                        <option value="6">Konghucu</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Jenis Kelamin Sekretaris</label><select
                        name="jk_sekretaris_pengurus" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Tempat Lahir Sekretaris</label><input type="text"
                        class="form-control" name="tl_sekretaris_pengurus"></div>
                <div class="mb-3"><label class="form-label">Tanggal Lahir Sekretaris</label><input type="date"
                        class="form-control" name="tgll_sekretaris_pengurus"></div>
                <div class="mb-3"><label class="form-label">Status Kawin Sekretaris</label><select
                        name="status_kawin_sekretaris_pengurus" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="1">Belum Kawin</option>
                        <option value="2">Kawin</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Alamat Sekretaris</label>
                    <textarea class="form-control" name="alamat_sekretaris_pengurus"></textarea>
                </div>
                <div class="mb-3"><label class="form-label">No HP Sekretaris</label><input type="text"
                        name="hp_sekretaris_pengurus" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Pekerjaan Sekretaris</label><input type="text"
                        class="form-control" name="pekerjaan_sekretaris_pengurus"></div>

                <!-- Bendahara -->
                <hr>
                <div class="mb-3"><label class="form-label">Nama Bendahara</label><input type="text"
                        class="form-control" name="nama_bendahara_pengurus"></div>
                <div class="mb-3"><label class="form-label">NIK Bendahara</label><input type="text"
                        name="nik_bendahara_pengurus" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Agama Bendahara</label><select
                        name="agama_bendahara_pengurus" class="form-control">
                        <option value="">-- Pilih Agama --</option>
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Katolik</option>
                        <option value="4">Hindu</option>
                        <option value="5">Buddha</option>
                        <option value="6">Konghucu</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Jenis Kelamin Bendahara</label><select
                        name="jk_bendahara_pengurus" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Tempat Lahir Bendahara</label><input type="text"
                        class="form-control" name="tl_bendahara_pengurus"></div>
                <div class="mb-3"><label class="form-label">Tanggal Lahir Bendahara</label><input type="date"
                        class="form-control" name="tgll_bendahara_pengurus"></div>
                <div class="mb-3"><label class="form-label">Status Kawin Bendahara</label><select
                        name="status_kawin_bendahara_pengurus" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="1">Belum Kawin</option>
                        <option value="2">Kawin</option>
                    </select></div>
                <div class="mb-3"><label class="form-label">Alamat Bendahara</label>
                    <textarea class="form-control" name="alamat_bendahara_pengurus"></textarea>
                </div>
                <div class="mb-3"><label class="form-label">No HP Bendahara</label><input type="text"
                        name="hp_bendahara_pengurus" class="form-control" maxlength="16" pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"></div>
                <div class="mb-3"><label class="form-label">Pekerjaan Bendahara</label><input type="text"
                        class="form-control" name="pekerjaan_bendahara_pengurus"></div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Kembali</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep()">Lanjut ➡️</button>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="step-content d-none" id="step4">
                <h4 class="mb-3 text-info">📑 Data Administrasi</h4>
                <div class="mb-3"><label class="form-label">Kecamatan</label><select id="kecamatan"
                        name="id_kecamatan" class="form-select">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach ($kecamatan as $u)
                            <option value="{{ $u->id }}">{{ $u->nama_kecamatan }}</option>
                        @endforeach
                    </select></div>
                <div class="mb-3"><label class="form-label">Desa</label><select id="desa" name="id_desa"
                        class="form-select">
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desa as $u)
                            <option value="{{ $u->id }}">{{ $u->nama_desa }}</option>
                        @endforeach
                    </select></div>
                <div class="mb-3"><label class="form-label">Jenis Kelompok</label><select id="jenis"
                        name="id_jenis" class="form-select">
                        <option value="">-- Pilih Jenis Kelompok --</option>
                        @foreach ($jenisKelompok as $u)
                            <option value="{{ $u->id }}">{{ $u->nama_jenis_kelompok }}</option>
                        @endforeach
                    </select></div>
                <div class="mb-3"><label class="form-label">Masa Kepengurusan</label><input type="text"
                        class="form-control" name="masa_kepengurusan"></div>
                <div class="mb-3"><label class="form-label">Keputusan Kelompok</label><input type="text"
                        class="form-control" name="keputusan_kelompok"></div>
                <div class="mb-3"><label class="form-label">Sumber Keuangan</label><input type="text"
                        class="form-control" name="sumber_keuangan"></div>
                <div class="mb-3"><label class="form-label">Upload Logo</label><input type="file"
                        class="form-control" name="logo_kelompok"></div>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Kembali</button>
                <button type="button" class="btn btn-primary float-end" onclick="nextStep()">Lanjut ➡️</button>
            </div>

            <!-- Step 5 -->
            <div class="step-content d-none" id="step5">
                <h4 class="mb-3 text-danger">📂 Upload Persyaratan</h4>
                @foreach ($persyaratan as $u)
                    <div class="mb-3">
                        <label class="form-label">{{ $u->nama_persyaratan }}</label>
                        <input type="file" class="form-control" name="persyaratan[{{ $u->id }}]">
                    </div>
                @endforeach

                <button type="button" class="btn btn-secondary" onclick="prevStep()">⬅️ Kembali</button>
                <button type="submit" class="btn btn-success float-end">✅ Daftar</button>
            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/vendor/waitMe/waitMe.min.js') }}"></script>

    <script>
        function myLoader(element, message) {
            bgLoading = 'rgba(255,255,255,0.8)';
            colorLoading = '#000';

            $(element).waitMe({
                effect: 'win8_linear',
                text: message,
                color: colorLoading,
                bg: bgLoading,
                maxSize: '',
                // waitTime: 3000,
                textPos: 'vertical',
                fontSize: '10pt',
                // source: "{{ asset('logo/ezgif-5-cd5e3bb456.gif') }}",
                onClose: function() {}
            });
        }
    </script>
    <script>
        let currentStep = 1;
        const totalSteps = 5;

        function nextStep() {
            // Ambil step aktif
            const stepContent = document.getElementById(`step${currentStep}`);
            const inputs = stepContent.querySelectorAll("input, select, textarea");

            let valid = true;

            // Reset pesan error
            stepContent.querySelectorAll(".text-danger").forEach(el => el.remove());

            inputs.forEach(input => {
                if (input.type !== "hidden" && input.value.trim() === "") {
                    valid = false;

                    // Kasih pesan error kalau belum ada
                    if (!input.nextElementSibling || !input.nextElementSibling.classList.contains("text-danger")) {
                        let error = document.createElement("div");
                        error.classList.add("text-danger", "mt-1");
                        error.innerText = "Kolom ini harus diisi!";
                        input.insertAdjacentElement("afterend", error);
                    }
                }
            });

            if (!valid) {
                return; // stop kalau ada kolom kosong
            }

            // Kalau valid baru pindah step
            document.getElementById(`step${currentStep}`).classList.add("d-none");
            currentStep++;
            document.getElementById(`step${currentStep}`).classList.remove("d-none");

            updateStepIndicator();
        }

        function prevStep() {
            document.getElementById(`step${currentStep}`).classList.add("d-none");
            currentStep--;
            document.getElementById(`step${currentStep}`).classList.remove("d-none");

            updateStepIndicator();
        }

        function updateStepIndicator() {
            const steps = document.querySelectorAll(".step");
            const progressBar = document.getElementById("progressBar");
            steps.forEach((step, index) => {
                if (index < currentStep - 1) {
                    step.classList.add("completed");
                    step.classList.remove("active");
                } else if (index === currentStep - 1) {
                    step.classList.add("active");
                    step.classList.remove("completed");
                } else {
                    step.classList.remove("active", "completed");
                }
            });

            progressBar.style.width = ((currentStep - 1) / (totalSteps - 1)) * 100 + "%";
        }

        $('#formPendaftaran').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('pendaftaran/store') }}",
                type: "POST",
                data: formData,
                processData: false, // biar FormData ke-post utuh
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    myLoader('body',
                        'Sedang memuat... <br> Mohon menunggu beberapa saat...');
                },
                complete: function() {
                    $('body').waitMe('hide');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        $('#formPendaftaran')[0].reset();
                        window.location.href = "/"; // redirect kalau perlu
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        $.each(errors, function(key, value) {
                            errorMessages += value[0] + "<br>";
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi Gagal',
                            html: errorMessages
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Terjadi kesalahan pada server.'
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
