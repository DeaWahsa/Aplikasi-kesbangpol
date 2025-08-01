<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\M_formpendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormPendaftaranController extends Controller
{
    public function index()
    {
        $menu = "pendaftaran";
        $submenu = "form-pendaftaran";

        return view('pendaftaran.form-pendaftaran', compact('menu', 'submenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(M_formpendaftaran $m_formpendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(M_formpendaftaran $m_formpendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, M_formpendaftaran $m_formpendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(M_formpendaftaran $m_formpendaftaran)
    {
        //
    }
}
