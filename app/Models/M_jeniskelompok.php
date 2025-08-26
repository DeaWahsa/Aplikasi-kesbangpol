<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_jeniskelompok extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_kelompok';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
