<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\M_filepersyaratan;
use App\Models\M_persyaratan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FilePersyaratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $menu = "pendaftaran";
        $submenu = "file-persyaratan";
        if ($request->ajax()) {
            $data = M_persyaratan::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn  = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm modalUpload"><i class="ri-upload-2-line"></i></a>';
                    // $btn .= ' <a href="' . route('file-persyaratan.show', $row->id) . '" class="btn btn-info btn-sm"><i class="ri-file-3-fill"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-warning btn-sm deletePendaftaran"><i class="ri-check-fill"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pendaftaran.file-persyaratan', compact('menu', 'submenu'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(M_filepersyaratan $m_filepersyaratan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(M_filepersyaratan $m_filepersyaratan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, M_filepersyaratan $m_filepersyaratan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(M_filepersyaratan $m_filepersyaratan)
    {
        //
    }
}
