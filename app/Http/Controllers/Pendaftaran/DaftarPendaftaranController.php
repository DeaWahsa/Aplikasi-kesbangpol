<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\M_daftarpendaftaran;
use Carbon\Carbon;
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
                $btn  = '<div class="btn-group" role="group">';
                $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary btn-sm editPendaftaran"><i class="ri-edit-2-line"></i></a>';
                $btn .= '<a href="' . route('file-persyaratan.show', $row->id) . '" class="btn btn-info btn-sm"><i class="ri-file-3-fill"></i></a>';
                $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletePendaftaran"><i class="ri-delete-bin-5-line"></i></a>';
                $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-warning btn-sm cetak"><i class="ri-file-word-line"></i></a>';
                $btn .= '</div>';


                    return $btn;
                })
                ->editColumn('status', function ($row) {
                    switch ($row->status) {
                        case 0:
                            return '<span class="badge bg-warning">Belum Lengkap</span>';
                        case 1:
                            return '<span class="badge bg-success">Terverifikasi</span>';
                        case 2:
                            return '<span class="badge bg-danger">Ditolak</span>';
                        default:
                            return '-';
                    }
                })
                ->rawColumns(['action', 'status'])
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

     public function cetak_pemohon($id)
    {
            $pemohon = M_daftarpendaftaran::where('id', $id)->first();
            $templatePath = public_path('pemohon.docx');
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);

    // Isi nilai
    $templateProcessor->setValue('nama', $pemohon->nama);
    $templateProcessor->setValue('nik', $pemohon->nik);
    $templateProcessor->setValue('alamat', $pemohon->alamat);

    // Tentukan nama file sementara untuk download
    $fileName = $pemohon->nama . '.docx';
    $savePath = storage_path('app/public/' . $fileName);

    // Simpan file sementara
    $templateProcessor->saveAs($savePath);

    // Download & hapus setelah terkirim
    return response()->download($savePath)->deleteFileAfterSend(true);

    }
}