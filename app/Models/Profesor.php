<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table = "profesor";

    public function getNumeroAttribute($value)
    {
        return decrypt($value);
    }
    public function getNombreAttribute($value)
    {
        return decrypt($value);
    }

    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
}
