<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_jenis_kelompok extends Model
{
    protected $table = 'm_jenis_kelompok';
    protected $primaryKey = 'id';

    public function pendaftar()
    {
        return $this->hasMany(M_daftarpendaftaran::class, 'id_jenis');
    }
}
