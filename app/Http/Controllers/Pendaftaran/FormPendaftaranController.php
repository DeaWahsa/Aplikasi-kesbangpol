<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pendaftaran\FormPendaftaran;
use App\Models\M_desa;
use App\Models\M_formpendaftaran;
use App\Models\M_kecamatan;
use App\Models\M_jeniskelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormPendaftaranController extends Controller
{
    public function index()
    {
        $menu = "pendaftaran";
        $submenu = "form-pendaftaran";
        $kecamatan = M_kecamatan::all();
        $desa = M_desa::all();
        $jenisKelompok = M_jeniskelompok::all();

        $data = [
            'menu' => $menu,
            'submenu' => $submenu,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'jenisKelompok' => $jenisKelompok,
        ];

        return view('pendaftaran.form-pendaftaran', $data);
    }
    public function getJenisKelompok($jeniskelompok_id)
    {
        $jenisKelompok = M_jeniskelompok::where('id', $jeniskelompok_id)->get();
        return response()->json($jenisKelompok);
    }


    // public function getKecamatan($kecamatan_id)
    // {
    //     $kecamatan = M_desa::where('kecamatan_id', $kecamatan_id)->get();
    //     return response()->json($kecamatan);
    // }

    public function getDesa($kecamatan_id)
    {
        $desa = M_desa::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($desa);
    }

    private function generateNomorRegistrasi()
    {
        // contoh format: REG202508260001
        $last = \App\Models\M_formpendaftaran::orderBy('id', 'desc')->first();
        $nextId = $last ? $last->id + 1 : 1;

        return 'REG' . date('Ymd') . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public function edit($id)
    {
        $data = M_formpendaftaran::findOrFail($id);
        return view('pendaftaran.edit-formpendaftaran', compact('data'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelompok' => 'required|string|max:255',
            // 'bidang_kegiatan' => 'required|string|max:255',
            // 'program_kerja' => 'required|string|max:255',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // generate nomor registrasi otomatis
        $nomorReg = $this->generateNomorRegistrasi();

        $form = new M_formpendaftaran();
        $form->nama_kelompok = $request->nama_kelompok;
        $form->bidang_kegiatan = $request->bidang_kegiatan;
        $form->program_kerja = $request->program_kerja;
        $form->id_jenis = $request->id_jenis;
        $form->no_surat_permohonan = $request->no_surat_permohonan;
        $form->tgl_surat_permohonan = $request->tgl_surat_permohonan;
        $form->hal_surat_permohonan = $request->hal_surat_permohonan;
        $form->hal_surat_dinas = $request->hal_surat_dinas;
        $form->no_surat_dinas = $request->no_surat_dinas;
        $form->tgl_surat_dinas = $request->tgl_surat_dinas;
        $form->alamat_kantor = $request->alamat_kantor;
        $form->tempat_pendirian = $request->tempat_pendirian;
        $form->waktu_pendirian = $request->waktu_pendirian;
        $form->tl_ketua_pengurus = $request->tl_ketua_pengurus;
        $form->tgll_ketua_pengurus = $request->tgll_ketua_pengurus;
        $form->status_kawin_ketua_pengurus = $request->status_kawin_ketua_pengurus;
        $form->alamat_ketua_pengurus = $request->alamat_ketua_pengurus;
        $form->hp_ketua_pengurus = $request->hp_ketua_pengurus;
        $form->nama_sekretaris_pengurus = $request->nama_sekretaris_pengurus;
        $form->nik_sekretaris_pengurus = $request->nik_sekretaris_pengurus;
        $form->agama_sekretaris_pengurus = $request->agama_sekretaris_pengurus;
        $form->jk_sekretaris_pengurus = $request->jk_sekretaris_pengurus;
        $form->tl_sekretaris_pengurus = $request->tl_sekretaris_pengurus;
        $form->jk_bendahara_pengurus = $request->jk_bendahara_pengurus;
        $form->asas = $request->asas;
        $form->tujuan_kelompok = $request->tujuan_kelompok;
        $form->nama_pendiri = $request->nama_pendiri;
        $form->nik_pendiri = $request->nik_pendiri;
        $form->agama_pendiri = $request->agama_pendiri;
        $form->jk_pendiri = $request->jk_pendiri;
        $form->tl_pendiri = $request->tl_pendiri;
        $form->tgll_pendiri = $request->tgll_pendiri;
        $form->status_kawin_pendiri = $request->status_kawin_pendiri;
        $form->alamat_pendiri = $request->alamat_pendiri;
        $form->hp_pendiri = $request->hp_pendiri;
        $form->pekerjaan_pendiri = $request->pekerjaan_pendiri;
        $form->nama_pembina = $request->nama_pembina;
        $form->nama_penasehat = $request->nama_penasehat;
        $form->nama_ketua_pengurus = $request->nama_ketua_pengurus;
        $form->nik_ketua_pengurus = $request->nik_ketua_pengurus;
        $form->agama_ketua_pengurus = $request->agama_ketua_pengurus;
        $form->jk_ketua_pengurus = $request->jk_ketua_pengurus;
        $form->tl_sekretaris_pengurus = $request->tl_sekretaris_pengurus;
        $form->tgll_sekretaris_pengurus = $request->tgll_sekretaris_pengurus;
        $form->status_kawin_sekretaris_pengurus = $request->status_kawin_sekretaris_pengurus;
        $form->alamat_sekretaris_pengurus = $request->alamat_sekretaris_pengurus;
        $form->hp_sekretaris_pengurus = $request->hp_sekretaris_pengurus;
        $form->pekerjaan_sekretaris_pengurus = $request->pekerjaan_sekretaris_pengurus;
        $form->nama_bendahara_pengurus = $request->nama_bendahara_pengurus;
        $form->nik_bendahara_pengurus = $request->nik_bendahara_pengurus;
        $form->agama_bendahara_pengurus = $request->agama_bendahara_pengurus;
        $form->tl_bendahara_pengurus = $request->tl_bendahara_pengurus;
        $form->tgll_bendahara_pengurus = $request->tgll_bendahara_pengurus;
        $form->status_kawin_bendahara_pengurus = $request->status_kawin_bendahara_pengurus;
        $form->alamat_bendahara_pengurus = $request->alamat_bendahara_pengurus;
        $form->hp_bendahara_pengurus = $request->hp_bendahara_pengurus;
        $form->pekerjaan_bendahara_pengurus = $request->pekerjaan_bendahara_pengurus;
        $form->masa_kepengurusan = $request->masa_kepengurusan;
        $form->keputusan_kelompok = $request->keputusan_kelompok;
        $form->sumber_keuangan = $request->sumber_keuangan;
        $form->pekerjaan_ketua_pengurus = $request->pekerjaan_ketua_pengurus;
        $form->status_kawin_sekretaris_pengurus = $request->status_kawin_sekretaris_pengurus;
        $form->status_kawin_bendahara_pengurus = $request->status_kawin_bendahara_pengurus;
        $form->id_desa = $request->id_desa;
        $form->id_kecamatan = $request->id_kecamatan;
        $form->nomor_registrasi = $nomorReg; // langsung isi otomatis
        if ($request->hasFile('logo_kelompok')) {
            $file = $request->file('logo_kelompok');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logo_kelompok'), $filename);
            $form->logo_kelompok = $filename;
        }
        $form->save();

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'nomor_registrasi' => $nomorReg
        ]);
    }
}
