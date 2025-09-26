<?php
// app/Models/RevaerToken.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevaerToken extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'token'];
}
