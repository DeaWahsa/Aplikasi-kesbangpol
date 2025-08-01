<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\M_daftarpendaftaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DaftarPendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $menu = "pendaftaran";
        $submenu = "daftar-pendaftaran";


        if ($request->ajax()) {
            $data = M_daftarpendaftaran::query()->latest('id');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn  = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editPendaftaran"><i class="ri-edit-2-line"></i></a>';
                    $btn .= ' <a href="' . route('file-persyaratan.show', $row->id) . '" class="btn btn-info btn-sm"><i class="ri-file-3-fill"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletePendaftaran"><i class="ri-delete-bin-5-line"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('pendaftaran.daftar-pendaftaran', compact('menu', 'submenu'));
    }

    public function edit($id)
    {
        $daftar = M_daftarpendaftaran::find($id);
        return response()->json($daftar);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required'
        ]);

        $daftar = M_daftarpendaftaran::findOrFail($id);
        $daftar->update($validated);

        return response()->json(['success' => 'Data berhasil diperbarui.']);
    }

    // ✅ Untuk hapus
    public function destroy($id)
    {
        $data = M_daftarpendaftaran::findOrFail($id);
        $data->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function show($id)
    {
        // dd($id);
        $data = M_daftarpendaftaran::findOrFail($id);
        // Kalau mau JSON:
        return response()->json($data);

        // Atau kalau mau ke view detail:
        return view('pendaftaran.show', compact('data'));
    }

    public function filepersyaratan($id)
    {
        $menu = "pendaftaran";
        $submenu = "file-persyaratan";

        return view('pendaftaran.file-persyaratan', compact('menu', 'submenu'));
    }
}
