<?php

namespace App\Http\Controllers;

use App\Models\M_daftarpendaftaran;
use App\Models\M_jenis_kelompok;
use App\Models\M_kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = "dashboard";
        $submenu = "";
        $terverifikasi   = M_daftarpendaftaran::where('status', 1)->count();
        $menunggu        = M_daftarpendaftaran::where('status', 3)->count();
        $belum_lengkap   = M_daftarpendaftaran::where('status', 0)->count();
        $ditolak         = M_daftarpendaftaran::where('status', 2)->count();
        $total           = M_daftarpendaftaran::count();

        $data = [
            'menu' => $menu,
            'submenu' => $submenu,
            'terverifikasi' => $terverifikasi,
            'menunggu' => $menunggu,
            'belum_lengkap' => $belum_lengkap,
            'ditolak' => $ditolak,
            'total' => $total
        ];
        return view('dashboard', $data);
    }

    public function pendaftaranPerKecamatan()
    {
        $rows = M_kecamatan::withCount('pendaftar')
            ->orderBy('nama_kecamatan')
            ->get();

        return response()->json([
            'labels' => $rows->pluck('nama_kecamatan'),
            'data'   => $rows->pluck('pendaftar_count')->map(fn($v) => (int) $v),
        ]);
    }

    public function pendaftaranPerJenisKelompok()
    {
        $rows = M_jenis_kelompok::withCount('pendaftar')
            ->orderBy('nama_jenis_kelompok')
            ->get();

        return response()->json([
            'labels' => $rows->pluck('nama_jenis_kelompok'),
            'data'   => $rows->pluck('pendaftar_count')->map(fn($v) => (int)$v),
        ]);
    }
}
