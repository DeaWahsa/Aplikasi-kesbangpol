<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_formpendaftaran extends Model
{
    use HasFactory;
    protected $table = 'm_formpendaftaran';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama_kelompok',
        'no_surat_permohonan',
        'tgl_surat_permohonan',
        'hal_surat_permohonan',
        'no_surat_dinas',
        'tgl_surat_dinas',
        'hal_surat_dinas',
        'bidang_kegiatan',
        'program_kerja',
        'alamat_kantor',
        'tempat_pendirian',
        'waktu_pendirian',
        'asas',
        'tujuan_kelompok',
        'nama_pendiri',
        'nik_pendiri',
        'agama_pendiri',
        'jk_pendiri',
        'tl_pendiri',
        'tgll_pendiri',
        'status_kawin_pendiri',
        'alamat_pendiri',
        'hp_pendiri',
        'pekerjaan_pendiri',
        'nama_pembina',
        'nama_penasehat',
        'nama_ketua_pengurus',
        'nik_ketua_pengurus',
        'agama_ketua_pengurus',
        'jk_ketua_pengurus',
        'tl_ketua_pengurus',
        'tgll_ketua_pengurus',
        'status_kawin_ketua_pengurus',
        'alamat_ketua_pengurus',
        'hp_ketua_pengurus',
        'pekerjaan_ketua_pengurus',
        'nama_sekretaris_pengurus',
        'nik_sekretaris_pengurus',
        'agama_sekretaris_pengurus',
        'jk_sekretaris_pengurus',
        'tl_sekretaris_pengurus',
        'tgll_sekretaris_pengurus',
        'status_kawin_sekretaris_pengurus',
        'alamat_sekretaris_pengurus',
        'hp_sekretaris_pengurus',
        'pekerjaan_sekretaris_pengurus',
        'nama_bendahara_pengurus',
        'nik_bendahara_pengurus',
        'agama_bendahara_pengurus',
        'jk_bendahara_pengurus',
        'tl_bendahara_pengurus',
        'tgll_bendahara_pengurus',
        'status_kawin_bendahara_pengurus',
        'alamat_bendahara_pengurus',
        'hp_bendahara_pengurus',
        'pekerjaan_bendahara_pengurus',
        'id_jenis',
        'masa_kepengurusan',
        'keputusan_kelompok',
        'sumber_keuangan',
        'logo_kelompok',
    ];
}
