<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\M_desa;
use App\Models\M_formpendaftaran;
use App\Models\M_kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormPendaftaranController extends Controller
{
    public function index()
    {
        $menu = "pendaftaran";
        $submenu = "form-pendaftaran";
        $kecamatan = M_kecamatan::all();

        $data = [
            'menu' => $menu,
            'submenu' => $submenu,
            'kecamatan' => $kecamatan
        ];

        return view('pendaftaran.form-pendaftaran', $data);
    }
    public function getDesa($kecamatan_id)
    {
        $desa = M_desa::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($desa);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required|numeric',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $formpendaftaran = M_formpendaftaran::updateOrCreate(
            ['id' => $request->formpendaftaran_id],
            [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'alamat' => $request->alamat
            ]
        );

        return response()->json(['success' => 'Data berhasil disimpan.', 'data' => $formpendaftaran]);
    }
}
