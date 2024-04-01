<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorEnc extends Model
{
    use HasFactory;
    protected $table = "profesor";

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = encrypt($value);
    }
    
    public function setNumeroAttribute($value)
    {
        $this->attributes['numero'] = encrypt($value);
    }
    
    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    
}
