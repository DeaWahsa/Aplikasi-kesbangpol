<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\M_persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class PersyaratanController extends Controller
{
    public function index(Request $request)
    {
        $menu = "masterdata";
        $submenu = "persyaratan";
        if ($request->ajax()) {
            $data = M_persyaratan::latest()->get();
            return DataTablesDataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPersyaratan">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePersyaratan">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('masterdata.persyaratan', compact('menu', 'submenu'));
    }

    public function create()
    {
        return view('masterdata.persyaratan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_persyaratan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $persyaratan = M_persyaratan::updateOrCreate(
            ['id' => $request->persyaratan_id],
            ['nama_persyaratan' => $request->nama_persyaratan]
        );

        return response()->json(['success' => 'Data berhasil disimpan.', 'data' => $persyaratan]);
    }

    public function edit($id)
    {
        $persyaratan = M_persyaratan::find($id);
        return response()->json($persyaratan);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_persyaratan' => 'required'
        ]);

        $persyaratan = M_persyaratan::findOrFail($id);
        $persyaratan->update($request->all());

        return redirect()->route('persyaratan.index')
            ->with('success', 'Persyaratan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        M_persyaratan::find($id)->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }

    public function getAll(Request $request)
    {
        $data = M_persyaratan::query();

        // Jika ada input pencarian nama_persyaratan
        if ($request->has('nama_persyaratan') && $request->nama_persyaratan != '') {
            $data->where('nama_persyaratan', 'like', '%' . $request->nama_persyaratan . '%');
        } else {
            // Jika kosong, jangan tampilkan data
            $data->whereRaw('1 = 0');
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        dd($data);
    }
}
