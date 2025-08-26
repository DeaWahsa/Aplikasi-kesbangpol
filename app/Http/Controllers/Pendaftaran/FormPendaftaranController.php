<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
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
        $jenisKelompok = M_jeniskelompok::all();

        $data = [
            'menu' => $menu,
            'submenu' => $submenu,
            'kecamatan' => $kecamatan,
            'jenisKelompok' => $jenisKelompok,
        ];

        return view('pendaftaran.form-pendaftaran', $data);
    }
    public function getJenisKelompok($jeniskelompok_id)
    {
        $jenisKelompok = M_jeniskelompok::where('id', $jeniskelompok_id)->get();
        return response()->json($jenisKelompok);
    }


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
        $form->nomor_registrasi = $nomorReg; // langsung isi otomatis
        $form->save();

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'nomor_registrasi' => $nomorReg
        ]);
    }
}
