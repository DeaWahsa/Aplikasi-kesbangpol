<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\M_filepersyaratan;
use App\Models\M_persyaratan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Pendaftaran\PersyaratanController;

class FilePersyaratanController extends Controller
{
    /**
     * Tampilkan halaman daftar persyaratan dengan datatable.
     */
    public function index(Request $request, $id)
    {
        $menu = "pendaftaran";
        $submenu = "file-persyaratan";
        $id_pendaftaran = $id;
        // dd($id_pendaftaran);

        if ($request->ajax()) {
            // Jika ingin hanya data yang berelasi dengan $id, gunakan where:
            // $data = M_persyaratan::where('id_daftar', $id)->get();
            $data = M_persyaratan::leftJoin('m_filepersyaratan', 'm_filepersyaratan.id_persyaratan', '=', 'tabel_persyaratan.id')
                ->select('tabel_persyaratan.*', 'm_filepersyaratan.id as file_id', 'm_filepersyaratan.original_file_name', 'm_filepersyaratan.nama_media', 'm_filepersyaratan.status')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn  = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm modalUpload"><i class="ri-upload-2-line"></i></a>';
                    // Tombol verifikasi sekarang menggunakan file_id (id dari m_filepersyaratan)
                    $verifBtn = '';
                    if ($row->original_file_name) {
                        $verifBtn = ' <a href="javascript:void(0)" data-id="' . $row->file_id . '" data-status="' . $row->status . '" class="btn btn-warning btn-sm btnVerifikasi" title="Ubah Status Verifikasi"><i class="ri-check-fill"></i></a>';
                    }

                    return $btn . $verifBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pendaftaran.file-persyaratan', compact('menu', 'submenu', 'id_pendaftaran'));
    }
    // ini
    /**
     * Simpan atau update file persyaratan berdasarkan ID persyaratan.
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:500',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/persyaratan', $fileName, 'public');

            M_filepersyaratan::updateOrCreate(
                ['id_persyaratan' => $id],
                ['file_path' => $filePath]
            );

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'File tidak ditemukan'], 400);
    }


    /**
     * Tampilkan form pembuatan baru (jika dibutuhkan).
     */
    public function create()
    {
        //
    }

    /**
     * Simpan data baru (tidak digunakan dalam kasus ini).
     */
    public function store(Request $request, $id)
    {
        // dd($request->id_pendaftaran);

        $request->validate([
            'file' => 'required|file|mimes:pdf,png,jpg,jpeg|max:2048',
            'id_pendaftaran' => 'required|integer',
            'id_persyaratan' => 'required|integer',
        ]);

        $uploadedFile = $request->file('file');
        $fileName = time() . '_' . $uploadedFile->getClientOriginalName();

        $path = $uploadedFile->storeAs('uploads', $fileName, 'public');

        // Cari berdasarkan id_pendaftaran dan id_persyaratan
        M_filepersyaratan::updateOrCreate(
            [
                'id_pendaftaran' => $request->id_pendaftaran,
                'id_persyaratan' => $request->id_persyaratan
            ],
            [
                'nama_media' => $fileName,
                'type' => $uploadedFile->getMimeType(),
                'ext' => $uploadedFile->getClientOriginalExtension(),
                'original_file_name' => $uploadedFile->getClientOriginalName(),
                'created_at' => now(),
                'updated_at' => now(), // perbaikan: update**d**_at
            ]
        );

        return response()->json([
            'message' => 'File berhasil disimpan atau diperbarui!',
        ]);
    }

    /**
     * Tampilkan detail file persyaratan tertentu.
     */
    public function show($id)
    {
        $data = DB::table('m_filepersyaratan')
            ->where('id', $id)
            ->first();

        if (!$data) {
            abort(404, 'File tidak ditemukan');
        }

        return view('filepersyaratan.show', [
            'nama_media' => $data->original_file_name,
            'data' => $data // jika kamu butuh semua datanya
        ]);
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:Terverifikasi,Ditolak',
        ]);

        $persyaratan = M_filepersyaratan::find($id);

        if (!$persyaratan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $persyaratan->status = $request->status_verifikasi;
        $persyaratan->save();

        return response()->json(['message' => 'Status berhasil diperbarui.']);
    }



    /**
     * Tampilkan form edit file persyaratan (tidak digunakan di frontend).
     */
    public function edit(M_filepersyaratan $m_filepersyaratan)
    {
        //
    }

    /**
     * Hapus file persyaratan (jika diperlukan).
     */
    public function destroy(M_filepersyaratan $m_filepersyaratan)
    {
        //jakjdksjdak
    }
}
