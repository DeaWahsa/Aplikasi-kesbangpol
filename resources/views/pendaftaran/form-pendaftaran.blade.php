@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">General Form Elements</h5>

                    <!-- General Form Elements -->
                    <form id="form-pendaftaran">
                        @csrf

                        {{-- Nama Kelompok Tani --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Kelompok</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kelompok" class="form-control"
                                    placeholder="Masukkan sesuai nama kelompok yang tertuang dalam Anggaran Dasar">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nomor dan Tanggal Surat Permohonan :</label>
                            <div class="col-sm-10">

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nomor</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_surat_permohonan" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tgl_surat_permohonan" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hal_surat_permohonan" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nomor dan Tanggal Surat Dinas Terkait:</label>
                            <div class="col-sm-10">

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nomor</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_surat_dinas" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tgl_surat_dinas" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hal_surat_dinas" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Bidang Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="bidang_kegiatan" class="form-control"
                                    placeholder="Masukkan sesuai dengan bidang yang dijalankan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Program Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" name="program_kerja" class="form-control"
                                    placeholder="Masukkan sesuai dengan bidang yang dijalankan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat Kantor/Sekretariat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat_kantor" class="form-control" rows="2"
                                    placeholder="Masukkan sesuai surat Keterangan Domisili dari Desa"></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tempat dan Waktu Pendirian</label>
                            <div class="col-sm-5">
                                <input type="text" name="tempat_pendirian" class="form-control" placeholder="Tempat">
                            </div>
                            <div class="col-sm-4">
                                <input type="date" name="waktu_pendirian" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Asas Ciri Kelompok</label>
                            <div class="col-sm-10">
                                <input type="text" name="asas" class="form-control"
                                    placeholder="Masukkan sesuai yang tidak bertentangan dengan Pancasila">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tujuan Kelompok</label>
                            <div class="col-sm-10">
                                <input type="text" name="tujuan_kelompok" class="form-control"
                                    placeholder="Masukkan tujuan kelompok">
                            </div>
                        </div>

                        {{-- Data Pendiri --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Pendiri</label>
                            <div class="col-sm-10">

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_pendiri" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nik_pendiri" class="form-control" maxlength="16"
                                            pattern="[0-9]*" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select name="agama_pendiri" class="form-control">
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jk_pendiri" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="tl_pendiri" class="form-control"
                                            placeholder="Tempat">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgll_pendiri" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-9">
                                        <select name="status_kawin_pendiri" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="1">Belum Kawin</option>
                                            <option value="2">Kawin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat_pendiri" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nomor HP <span
                                            class="text-danger">(WAJIB)</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hp_pendiri" class="form-control" maxlength="16"
                                            pattern="[0-9]*" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pekerjaan_pendiri" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Pembina</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pembina" class="form-control"
                                    placeholder="Jika ada dibuktikan dengan surat pernyataan kesediaan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Penasehat</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_penasehat" class="form-control"
                                    placeholder="Jika ada dibuktikan dengan surat pernyataan kesediaan">
                            </div>
                        </div>

                        {{-- Biodata Pengurus --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Biodata Pengurus</label>
                        </div>

                        {{-- Biodata Ketua Pengurus --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ketua/Sebutan Lain</label>
                            <div class="col-sm-10">

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_ketua_pengurus" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nik_ketua_pengurus" class="form-control"
                                            maxlength="16" pattern="[0-9]*"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select name="agama_ketua_pengurus" class="form-control">
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jk_ketua_pengurus" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="tl_ketua_pengurus" class="form-control"
                                            placeholder="Tempat">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgll_ketua_pengurus" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-9">
                                        <select name="status_kawin_ketua_pengurus" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="1">Belum Kawin</option>
                                            <option value="2">Kawin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat_ketua_pengurus" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nomor HP <span
                                            class="text-danger">(WAJIB)</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hp_ketua_pengurus" class="form-control"
                                            maxlength="16" pattern="[0-9]*"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pekerjaan_ketua_pengurus" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Biodata Sekretaris Pengurus --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Sekretaris/Sebutan Lain</label>
                            <div class="col-sm-10">

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_sekretaris_pengurus" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nik_sekretaris_pengurus" class="form-control"
                                            maxlength="16" pattern="[0-9]*"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select name="agama_sekretaris_pengurus" class="form-control">
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jk_sekretaris_pengurus" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="tl_sekretaris_pengurus" class="form-control"
                                            placeholder="Tempat">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgll_sekretaris_pengurus" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-9">
                                        <select name="status_kawin_sekretaris_pengurus" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="1">Belum Kawin</option>
                                            <option value="2">Kawin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat_sekretaris_pengurus" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nomor HP <span
                                            class="text-danger">(WAJIB)</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hp_sekretaris_pengurus" class="form-control"
                                            maxlength="16" pattern="[0-9]*"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pekerjaan_sekretaris_pengurus" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Biodata Bendahara Pengurus --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Bendahara/Sebutan Lain</label>
                            <div class="col-sm-10">

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_bendahara_pengurus" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nik_bendahara_pengurus" class="form-control"
                                            maxlength="16" pattern="[0-9]*"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select name="agama_bendahara_pengurus" class="form-control">
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jk_bendahara_pengurus" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="tl_bendahara_pengurus" class="form-control"
                                            placeholder="Tempat">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgll_bendahara_pengurus" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-9">
                                        <select name="status_kawin_bendahara_pengurus" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="1">Belum Kawin</option>
                                            <option value="2">Kawin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat_bendahara_pengurus" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Nomor HP <span
                                            class="text-danger">(WAJIB)</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hp_bendahara_pengurus" class="form-control"
                                            maxlength="16" pattern="[0-9]*"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pekerjaan_bendahara_pengurus" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Kecamatan --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <select id="kecamatan" name="id_kecamatan" class="form-select">
                                    <option value="">-- Pilih Kecamatan --</option>
                                    @foreach ($kecamatan as $u)
                                        <option value="{{ $u->id }}">{{ $u->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Desa</label>
                            <div class="col-sm-10">
                                <select id="desa" name="id_desa" class="form-select">
                                    <option value="">-- Pilih Desa --</option>
                                    @foreach ($desa as $u)
                                        <option value="{{ $u->id }}">{{ $u->nama_desa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelompok Tani</label>
                            <div class="col-sm-10">
                                <select id="jenis" name="id_jenis" class="form-select">
                                    <option value="">-- Pilih Jenis Kelompok --</option>
                                    @foreach ($jenisKelompok as $u)
                                        <option value="{{ $u->id }}">{{ $u->nama_jenis_kelompok }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Masa Bakti Kepengurusan</label>
                            <div class="col-sm-10">
                                <input type="text" name="masa_kepengurusan" class="form-control"
                                    placeholder="Masukkan sesuai dengan surat keputusan Kelompok">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Keputusan Tertinggi Kelompok</label>
                            <div class="col-sm-10">
                                <input type="text" name="keputusan_kelompok" class="form-control"
                                    placeholder="Masukkan sesuai dengan Aggaran Dasar">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Sumber Keuangan</label>
                            <div class="col-sm-10">
                                <input type="text" name="sumber_keuangan" class="form-control"
                                    placeholder="Masukkan sesuai Dalam Negeri/Luar Negeri ">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lambang/Logo Kelompok</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo_kelompok" class="form-control" accept="image/*">
                                <small class="text-muted">*Foto dilampirkan berwarna</small>
                            </div>
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send"></i> Submit Form
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#form-pendaftaran').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('form-pendaftaran.store') }}",
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data',
                    success: function(response) {
                        // Reset semua input, tapi jangan hapus nomor registrasi
                        $('#form-pendaftaran').find('input, textarea, select').not(
                            '#nomor-registrasi').val('');

                        Swal.fire('Berhasil', response.message, 'success');

                        // ✅ tampilkan nomor registrasi
                        if (response.nomor_registrasi) {
                            $('#nomor-registrasi').text(response.nomor_registrasi);
                        }
                    },

                    error: function(e) {
                        let response = e.responseJSON;
                        let message = "Terjadi kesalahan";

                        // kalau error validasi
                        if (response.errors) {
                            message = Object.values(response.errors).flat().join('<br>');
                        } else if (response.message) {
                            message = response.message;
                        }

                        Swal.fire('Error', message, 'error');
                    }
                });
            });

        });

        $('#kecamatan').on('change', function() {
            var kecamatan_id = $(this).val();

            if (kecamatan_id) {
                $.ajax({
                    url: "{{ url('get-desa') }}/" + kecamatan_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#desa').empty();
                        $('#desa').append('<option value="">-- Pilih Desa --</option>');
                        $.each(data, function(key, desa) {
                            $('#desa').append('<option value="' + desa.id + '">' + desa
                                .nama_desa + '</option>');
                        });
                    }
                });
            } else {
                $('#desa').empty();
                $('#desa').append('<option value="">-- Pilih Desa --</option>');
            }
        });
    </script>
@endsection
