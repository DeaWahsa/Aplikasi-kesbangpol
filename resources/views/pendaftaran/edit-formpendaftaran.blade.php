<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">General Form Elements</h5>


                <!-- General Form Elements -->
                <form id="edit-formpendaftaran">
                    @csrf
                    <input type="hidden" name="id" id="biodata_id" value="{{ $biodata->id }}">

                    {{-- Nama Kelompok Tani --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Kelompok</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_kelompok" value="{{ $biodata->nama_kelompok }}"
                                class="form-control"
                                placeholder="Masukkan sesuai nama kelompok yang tertuang dalam Anggaran Dasar">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nomor dan Tanggal Surat Permohonan :</label>
                        <div class="col-sm-10">

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Nomor</label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_surat_permohonan"
                                        value="{{ $biodata->no_surat_permohonan }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl_surat_permohonan"
                                        value="{{ $biodata->tgl_surat_permohonan }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="hal_surat_permohonan"
                                        value="{{ $biodata->hal_surat_permohonan }}" class="form-control">
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
                                    <input type="text" name="no_surat_dinas" value="{{ $biodata->no_surat_dinas }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl_surat_dinas" value="{{ $biodata->tgl_surat_dinas }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="hal_surat_dinas" value="{{ $biodata->hal_surat_dinas }}"
                                        class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Bidang Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" name="bidang_kegiatan" value="{{ $biodata->bidang_kegiatan }}"
                                class="form-control" placeholder="Masukkan sesuai dengan bidang yang dijalankan">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Program Kerja</label>
                        <div class="col-sm-10">
                            <input type="text" name="program_kerja" value="{{ $biodata->program_kerja }}"
                                class="form-control" placeholder="Masukkan sesuai dengan bidang yang dijalankan">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat Kantor/Sekretariat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat_kantor" class="form-control" rows="2"
                                placeholder="Masukkan sesuai surat Keterangan Domisili dari Desa">{{ $biodata->alamat_kantor }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tempat dan Waktu Pendirian</label>
                        <div class="col-sm-5">
                            <input type="text" name="tempat_pendirian" value="{{ $biodata->tempat_pendirian }}"
                                class="form-control" placeholder="Tempat">
                        </div>
                        <div class="col-sm-4">
                            <input type="date" name="waktu_pendirian" value="{{ $biodata->waktu_pendirian }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Asas Ciri Kelompok</label>
                        <div class="col-sm-10">
                            <input type="text" name="asas" value="{{ $biodata->asas }}" class="form-control"
                                placeholder="Masukkan sesuai yang tidak bertentangan dengan Pancasila">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tujuan Kelompok</label>
                        <div class="col-sm-10">
                            <input type="text" name="tujuan_kelompok" value="{{ $biodata->tujuan_kelompok }}"
                                class="form-control" placeholder="Masukkan tujuan kelompok">
                        </div>
                    </div>

                    {{-- Data Pendiri --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Pendiri</label>
                        <div class="col-sm-10">

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_pendiri" value="{{ $biodata->nama_pendiri }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nik_pendiri" value="{{ $biodata->nik_pendiri }}"
                                        class="form-control" maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select name="agama_pendiri" class="form-control">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="1" {{ $biodata->agama_pendiri == 1 ? 'selected' : '' }}>
                                            Islam</option>
                                        <option value="2" {{ $biodata->agama_pendiri == 2 ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="3" {{ $biodata->agama_pendiri == 3 ? 'selected' : '' }}>
                                            Katolik</option>
                                        <option value="4" {{ $biodata->agama_pendiri == 4 ? 'selected' : '' }}>
                                            Hindu</option>
                                        <option value="5" {{ $biodata->agama_pendiri == 5 ? 'selected' : '' }}>
                                            Buddha</option>
                                        <option value="6" {{ $biodata->agama_pendiri == 6 ? 'selected' : '' }}>
                                            Konghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jk_pendiri" value="{{ $biodata->jk_pendiri }}"
                                        class="form-control">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="1" {{ $biodata->jk_pendiri == 1 ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="2" {{ $biodata->jk_pendiri == 2 ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" name="tl_pendiri" value="{{ $biodata->tl_pendiri }}"
                                        class="form-control" placeholder="Tempat">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="tgll_pendiri" value="{{ $biodata->tgll_pendiri }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-9">
                                    <select name="status_kawin_pendiri" class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1"
                                            {{ $biodata->status_kawin_pendiri == 1 ? 'selected' : '' }}>Belum Kawin
                                        </option>
                                        <option value="2"
                                            {{ $biodata->status_kawin_pendiri == 2 ? 'selected' : '' }}>Kawin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat_pendiri" class="form-control" rows="2">{{ $biodata->alamat_pendiri }}</textarea>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Nomor HP <span
                                        class="text-danger">(WAJIB)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="hp_pendiri" value="{{ $biodata->hp_pendiri }}"
                                        class="form-control" maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pekerjaan_pendiri"
                                        value="{{ $biodata->pekerjaan_pendiri }}" class="form-control">

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Pembina</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pembina" value="{{ $biodata->nama_pembina }}"
                                class="form-control"
                                placeholder="Jika ada dibuktikan dengan surat pernyataan kesediaan">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Penasehat</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_penasehat" value="{{ $biodata->nama_penasehat }}"
                                class="form-control"
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
                                    <input type="text" name="nama_ketua_pengurus"
                                        value="{{ $biodata->nama_ketua_pengurus }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nik_ketua_pengurus"
                                        value="{{ $biodata->nik_ketua_pengurus }}" class="form-control"
                                        maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select name="agama_ketua_pengurus" value="{{ $biodata->agama_ketua_pengurus }}"
                                        class="form-control">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="1"
                                            {{ $biodata->agama_ketua_pengurus == 1 ? 'selected' : '' }}>Islam</option>
                                        <option value="2"
                                            {{ $biodata->agama_ketua_pengurus == 2 ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="3"
                                            {{ $biodata->agama_ketua_pengurus == 3 ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="4"
                                            {{ $biodata->agama_ketua_pengurus == 4 ? 'selected' : '' }}>Hindu</option>
                                        <option value="5"
                                            {{ $biodata->agama_ketua_pengurus == 5 ? 'selected' : '' }}>Buddha</option>
                                        <option value="6"
                                            {{ $biodata->agama_ketua_pengurus == 6 ? 'selected' : '' }}>Konghucu
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jk_ketua_pengurus" value="{{ $biodata->jk_ketua_pengurus }}"
                                        class="form-control">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="1"
                                            {{ $biodata->jk_ketua_pengurus == 1 ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="2"
                                            {{ $biodata->jk_ketua_pengurus == 2 ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" name="tl_ketua_pengurus"
                                        value="{{ $biodata->tl_ketua_pengurus }}" class="form-control"
                                        placeholder="Tempat">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="tgll_ketua_pengurus"
                                        value="{{ $biodata->tgll_ketua_pengurus }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-9">
                                    <select name="status_kawin_ketua_pengurus"
                                        value="{{ $biodata->status_kawin_ketua_pengurus }}" class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1"
                                            {{ $biodata->status_kawin_ketua_pengurus == 1 ? 'selected' : '' }}>Belum
                                            Kawin</option>
                                        <option value="2"
                                            {{ $biodata->status_kawin_ketua_pengurus == 2 ? 'selected' : '' }}>Kawin
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat_ketua_pengurus" class="form-control" rows="2">{{ $biodata->alamat_ketua_pengurus }}</textarea>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Nomor HP <span
                                        class="text-danger">(WAJIB)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="hp_ketua_pengurus"
                                        value="{{ $biodata->hp_ketua_pengurus }}" class="form-control"
                                        maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pekerjaan_ketua_pengurus"
                                        value="{{ $biodata->pekerjaan_ketua_pengurus }}" class="form-control">
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
                                    <input type="text" name="nama_sekretaris_pengurus"
                                        value="{{ $biodata->nama_sekretaris_pengurus }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nik_sekretaris_pengurus"
                                        value="{{ $biodata->nik_sekretaris_pengurus }}" class="form-control"
                                        maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select name="agama_sekretaris_pengurus"
                                        value="{{ $biodata->agama_sekretaris_pengurus }}" class="form-control">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="1"
                                            {{ $biodata->agama_sekretaris_pengurus == 1 ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="2"
                                            {{ $biodata->agama_sekretaris_pengurus == 2 ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="3"
                                            {{ $biodata->agama_sekretaris_pengurus == 3 ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="4"
                                            {{ $biodata->agama_sekretaris_pengurus == 4 ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="5"
                                            {{ $biodata->agama_sekretaris_pengurus == 5 ? 'selected' : '' }}>Buddha
                                        </option>
                                        <option value="6"
                                            {{ $biodata->agama_sekretaris_pengurus == 6 ? 'selected' : '' }}>Konghucu
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jk_sekretaris_pengurus"
                                        value="{{ $biodata->jk_sekretaris_pengurus }}" class="form-control">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="1"
                                            {{ $biodata->jk_sekretaris_pengurus == 1 ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="2"
                                            {{ $biodata->jk_sekretaris_pengurus == 2 ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" name="tl_sekretaris_pengurus"
                                        value="{{ $biodata->tl_sekretaris_pengurus }}" class="form-control"
                                        placeholder="Tempat">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="tgll_sekretaris_pengurus"
                                        value="{{ $biodata->tgll_sekretaris_pengurus }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-9">
                                    <select name="status_kawin_sekretaris_pengurus"
                                        value="{{ $biodata->status_kawin_sekretaris_pengurus }}"
                                        class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1"
                                            {{ $biodata->status_kawin_sekretaris_pengurus == 1 ? 'selected' : '' }}>
                                            Belum Kawin</option>
                                        <option value="2"
                                            {{ $biodata->status_kawin_sekretaris_pengurus == 2 ? 'selected' : '' }}>
                                            Kawin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat_sekretaris_pengurus" class="form-control" rows="2">{{ $biodata->alamat_sekretaris_pengurus }}</textarea>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Nomor HP <span
                                        class="text-danger">(WAJIB)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="hp_sekretaris_pengurus"
                                        value="{{ $biodata->hp_sekretaris_pengurus }}" class="form-control"
                                        maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pekerjaan_sekretaris_pengurus"
                                        value="{{ $biodata->pekerjaan_sekretaris_pengurus }}" class="form-control">
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
                                    <input type="text" name="nama_bendahara_pengurus"
                                        value="{{ $biodata->nama_bendahara_pengurus }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nik_bendahara_pengurus"
                                        value="{{ $biodata->nik_bendahara_pengurus }}" class="form-control"
                                        maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select name="agama_bendahara_pengurus"
                                        value="{{ $biodata->agama_bendahara_pengurus }}" class="form-control">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="1"
                                            {{ $biodata->agama_bendahara_pengurus == 1 ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="2"
                                            {{ $biodata->agama_bendahara_pengurus == 2 ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="3"
                                            {{ $biodata->agama_bendahara_pengurus == 3 ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="4"
                                            {{ $biodata->agama_bendahara_pengurus == 4 ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="5"
                                            {{ $biodata->agama_bendahara_pengurus == 5 ? 'selected' : '' }}>Buddha
                                        </option>
                                        <option value="6"
                                            {{ $biodata->agama_bendahara_pengurus == 6 ? 'selected' : '' }}>Konghucu
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jk_bendahara_pengurus"
                                        value="{{ $biodata->jk_bendahara_pengurus }}" class="form-control">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="1"
                                            {{ $biodata->jk_bendahara_pengurus == 1 ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="2"
                                            {{ $biodata->jk_bendahara_pengurus == 2 ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Tempat, Tgl Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" name="tl_bendahara_pengurus"
                                        value="{{ $biodata->tl_bendahara_pengurus }}" class="form-control"
                                        placeholder="Tempat">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="tgll_bendahara_pengurus"
                                        value="{{ $biodata->tgll_bendahara_pengurus }}" class="form-control">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-9">
                                    <select name="status_kawin_bendahara_pengurus"
                                        value="{{ $biodata->status_kawin_bendahara_pengurus }}" class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1"
                                            {{ $biodata->status_kawin_bendahara_pengurus == 1 ? 'selected' : '' }}>
                                            Belum Kawin</option>
                                        <option value="2"
                                            {{ $biodata->status_kawin_bendahara_pengurus == 2 ? 'selected' : '' }}>
                                            Kawin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat_bendahara_pengurus" class="form-control" rows="2">{{ $biodata->alamat_bendahara_pengurus }}</textarea>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Nomor HP <span
                                        class="text-danger">(WAJIB)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="hp_bendahara_pengurus"
                                        value="{{ $biodata->hp_bendahara_pengurus }}" class="form-control"
                                        maxlength="16" pattern="[0-9]*"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pekerjaan_bendahara_pengurus"
                                        value="{{ $biodata->pekerjaan_bendahara_pengurus }}" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Kecamatan --}}
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <select id="kecamatan" name="id_kecamatan" class="form-select">
                                <option value="">-- Pilih Kecamatan --</option>
                                @foreach ($kecamatan as $u)
                                <option value="{{$u->id}}">{{$u->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <!--  -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Desa</label>
                        <div class="col-sm-10">
                            <select id="desa" name="id_desa" value="{{ $biodata->id_desa }}"
                                class="form-select">
                                <option value="">-- Pilih Desa --</option>
                                {{-- @foreach ($desa as $u)
                                    <option value="{{ $u->id }}">{{ $u->nama_desa }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>



                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Masa Bakti Kepengurusan</label>
                        <div class="col-sm-10">
                            <input type="text" name="masa_kepengurusan" value="{{ $biodata->masa_kepengurusan }}"
                                class="form-control" placeholder="Masukkan sesuai dengan surat keputusan Kelompok">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Keputusan Tertinggi Kelompok</label>
                        <div class="col-sm-10">
                            <input type="text" name="keputusan_kelompok"
                                value="{{ $biodata->keputusan_kelompok }}" class="form-control"
                                placeholder="Masukkan sesuai dengan Aggaran Dasar">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Sumber Keuangan</label>
                        <div class="col-sm-10">
                            <input type="text" name="sumber_keuangan" value="{{ $biodata->sumber_keuangan }}"
                                class="form-control" placeholder="Masukkan sesuai Dalam Negeri/Luar Negeri ">
                        </div>
                    </div>

                    {{-- Logo Kelompok --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Logo Kelompok</label>
                        <div class="col-sm-10">
                            <input type="file" name="logo_kelompok" class="form-control" accept="image/*"
                                onchange="previewLogo(event)">
                            @if ($biodata->logo_kelompok)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/logo_kelompok/' . $biodata->logo_kelompok) }}"
                                        alt="Logo Kelompok" class="img-thumbnail"
                                        style="max-width: 120px; max-height: 120px; object-fit: cover;">
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Tombol Edit --}}
                    <div class="row mb-3">
                        <div class="col-sm-9 offset-sm-3">
                            <input type="submit" id="btnEdit" class="btn btn-primary">
                            </input>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
ffff

<script>
    $(document).ready(function() {

        // Submit form
        $('#edit-formpendaftaran').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            const id = $('#biodata_id').val();

            // kalau route update pakai PUT
            formData.append('_method', 'POST');

            $.ajax({
                url: `/file-persyaratan/${id}/updateBiodata`,
                type: 'POST', // tetap POST karena kita spoof PUT dengan _method
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                beforeSend: function() {
                    myLoader('body',
                        'Sedang memuat... <br> Mohon menunggu beberapa saat...');
                },
                complete: function() {
                    $('body').waitMe('hide');
                },
                success: function(response) {
                    console.log("success", response);

                    var data = response.data;

                    $.each(data, function(key, value) {
                        let input = $('#edit-formpendaftaran').find('[name="' +
                            key + '"]');

                        // kalau input type file, jangan set value
                        if (input.attr('type') === 'file') {
                            return; // skip
                        }

                        input.val(value);
                    });

                    // kalau ada logo lama, tampilkan
                    if (data.logo_url) {
                        $('#preview').attr('src', data.logo_url).show();
                    }

                    Swal.fire('Berhasil', response.message, 'success');
                },
                error: function(e) {
                    console.log(e);
                    let response = e.responseJSON;
                    Swal.fire('Error', response.message, 'error');
                }

            });
        });
    });

    function previewLogo(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
