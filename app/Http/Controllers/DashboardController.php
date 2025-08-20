<?php

namespace App\Http\Controllers;

use App\Models\M_daftarpendaftaran;
use Illuminate\Http\Request;

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
            'terverifikasi' =>$terverifikasi,
            'menunggu' => $menunggu,
            'belum_lengkap' => $belum_lengkap,
            'ditolak' => $ditolak,
            'total' => $total
        ];
        return view('dashboard' , $data);
    }
}
