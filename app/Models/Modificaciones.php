<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modificaciones extends Model
{
    use HasFactory; 
    protected $table = 'modificaciones';
    protected $fillable = [
        'id_usuario',
        "movimiento",
        "tipo",
        "ip_address",
    ];
}
