<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_kecamatan extends Model
{
    use HasFactory;
    protected $table = 'm_kecamatan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
