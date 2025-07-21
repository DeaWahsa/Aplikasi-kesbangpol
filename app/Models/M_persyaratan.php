<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_persyaratan extends Model
{
    use HasFactory;
    protected $table = 'tabel_persyaratan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
