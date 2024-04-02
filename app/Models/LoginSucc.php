<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSucc extends Model
{
    use HasFactory;
    protected $table = "inicio_ses";
    protected $fillable = [
        'user_id',
        'fecha',
        'ip_address',
        'tipo',
    ];
}
