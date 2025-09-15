<?php

namespace App\Http\Controllers;

use App\Models\M_filepersyaratan;
use App\Models\M_formpendaftaran;
use App\Models\M_kecamatan;
use App\Models\M_jeniskelompok;
use App\Models\M_desa;
use App\Models\M_persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranMandiriController extends Controller
{
    public function index()
    {

        $persyaratan = M_persyaratan::where('is_delete', 0)->get();
        $kecamatan = M_kecamatan::all();
        $desa = M_desa::all();
        $jenisKelompok = M_jeniskelompok::all();

        $data = [
            'persyaratan' => $persyaratan,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'jenisKelompok' => $jenisKelompok,
        ];
        return view('pendaftaran.pendaftaran-mandiri', $data);
    }

    public function getJenisKelompok($jeniskelompok_id)
    {
        $jenisKelompok = M_jeniskelompok::where('id', $jeniskelompok_id)->get();
        return response()->json($jenisKelompok);
    }


    public function getKecamatan($kecamatan_id)
    {
        $kecamatan = M_desa::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($kecamatan);
    }

    public function getDesa($desa_id)
    {
        $desa = M_desa::where('desa_id', $desa_id)->get();
        return response()->json($desa);
    }

    private function generateNomorRegistrasi()
    {
        // contoh format: REG202508260001
        $last = \App\Models\M_formpendaftaran::orderBy('id', 'desc')->first();
        $nextId = $last ? $last->id + 1 : 1;

        return 'REG' . date('Ymd') . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $nomorReg = $this->generateNomorRegistrasi();

            $validated = $request->validate([
                'nama_kelompok'                 => 'required|string|max:255',
                'no_surat_permohonan'           => 'nullable|string|max:255',
                'tgl_surat_permohonan'          => 'nullable|date',
                'hal_surat_permohonan'          => 'nullable|string|max:255',
                'no_surat_dinas'                => 'nullable|string|max:255',
                'tgl_surat_dinas'               => 'nullable|date',
                'hal_surat_dinas'               => 'nullable|string|max:255',
                'bidang_kegiatan'               => 'nullable|string|max:255',
                'program_kerja'                 => 'nullable|string|max:255',
                'alamat_kantor'                 => 'nullable|string|max:255',
                'tempat_pendirian'              => 'nullable|string|max:255',
                'waktu_pendirian'               => 'nullable|date',
                'asas'                          => 'nullable|string|max:255',
                'tujuan_kelompok'               => 'nullable|string|max:255',

                // Pendiri
                'nama_pendiri'                  => 'nullable|string|max:255',
                'nik_pendiri'                   => 'nullable|string|max:50',
                'agama_pendiri'                 => 'nullable|string|max:50',
                'jk_pendiri'                    => 'nullable|string|max:20',
                'tl_pendiri'                    => 'nullable|string|max:255',
                'tgll_pendiri'                  => 'nullable|date',
                'status_kawin_pendiri'          => 'nullable|string|max:50',
                'alamat_pendiri'                => 'nullable|string|max:255',
                'hp_pendiri'                    => 'nullable|string|max:20',
                'pekerjaan_pendiri'             => 'nullable|string|max:100',

                // Pembina & Penasehat
                'nama_pembina'                  => 'nullable|string|max:255',
                'nama_penasehat'                => 'nullable|string|max:255',

                // Ketua
                'nama_ketua_pengurus'           => 'nullable|string|max:255',
                'nik_ketua_pengurus'            => 'nullable|string|max:50',
                'agama_ketua_pengurus'          => 'nullable|string|max:50',
                'jk_ketua_pengurus'             => 'nullable|string|max:20',
                'tl_ketua_pengurus'             => 'nullable|string|max:255',
                'tgll_ketua_pengurus'           => 'nullable|date',
                'status_kawin_ketua_pengurus'   => 'nullable|string|max:50',
                'alamat_ketua_pengurus'         => 'nullable|string|max:255',
                'hp_ketua_pengurus'             => 'nullable|string|max:20',
                'pekerjaan_ketua_pengurus'      => 'nullable|string|max:100',

                // Sekretaris
                'nama_sekretaris_pengurus'      => 'nullable|string|max:255',
                'nik_sekretaris_pengurus'       => 'nullable|string|max:50',
                'agama_sekretaris_pengurus'     => 'nullable|string|max:50',
                'jk_sekretaris_pengurus'        => 'nullable|string|max:20',
                'tl_sekretaris_pengurus'        => 'nullable|string|max:255',
                'tgll_sekretaris_pengurus'      => 'nullable|date',
                'status_kawin_sekretaris_pengurus' => 'nullable|string|max:50',
                'alamat_sekretaris_pengurus'    => 'nullable|string|max:255',
                'hp_sekretaris_pengurus'        => 'nullable|string|max:20',
                'pekerjaan_sekretaris_pengurus' => 'nullable|string|max:100',

                // Bendahara
                'nama_bendahara_pengurus'       => 'nullable|string|max:255',
                'nik_bendahara_pengurus'        => 'nullable|string|max:50',
                'agama_bendahara_pengurus'      => 'nullable|string|max:50',
                'jk_bendahara_pengurus'         => 'nullable|string|max:20',
                'tl_bendahara_pengurus'         => 'nullable|string|max:255',
                'tgll_bendahara_pengurus'       => 'nullable|date',
                'status_kawin_bendahara_pengurus' => 'nullable|string|max:50',
                'alamat_bendahara_pengurus'     => 'nullable|string|max:255',
                'hp_bendahara_pengurus'         => 'nullable|string|max:20',
                'pekerjaan_bendahara_pengurus'  => 'nullable|string|max:100',

                // Administrasi
                'id_jenis'                      => 'nullable|integer',
                'masa_kepengurusan'             => 'nullable|string|max:100',
                'keputusan_kelompok'            => 'nullable|string|max:255',
                'sumber_keuangan'               => 'nullable|string|max:255',
                'logo_kelompok'                 => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'persyaratan.*'       => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            $validated['nomor_registrasi'] = $nomorReg;

            $pendaftaran = M_formpendaftaran::create($validated);

            // simpan persyaratan upload
            if ($request->hasFile('persyaratan')) {
                foreach ($request->file('persyaratan') as $idPersyaratan => $file) {
                    if ($file) {
                        $path = $file->store('persyaratan', 'public');
                        M_filepersyaratan::create([
                            'id_pendaftaran' => $pendaftaran->id,
                            'id_persyaratan' => $idPersyaratan,
                            'nama_media'     => $path,
                            'status'         => 0,
                            'type'           => $file->getMimeType(),
                            'ext'            => $file->getClientOriginalExtension(),
                            'original_file_name' => $file->getClientOriginalName(),
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Pendaftaran berhasil disimpan!',
                'data' => $pendaftaran
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
