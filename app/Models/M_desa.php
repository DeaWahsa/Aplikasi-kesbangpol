<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_desa extends Model
{
    use HasFactory;
    protected $table = 'm_desa';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
