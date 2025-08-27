<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_daftarpendaftaran extends Model
{
    use HasFactory;
    protected $table = 'm_formpendaftaran';
   protected $primaryKey = 'id';

    public function kecamatan()
    {
        return $this->belongsTo(M_kecamatan::class, 'id_kecamatan');
    }
}
