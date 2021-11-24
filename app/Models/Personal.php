<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = [
        'Nombre',
        'Apellido',
        'Cargo',
        'cd'
    ];

    public function vehiculo(){
        return $this->belongsToMany(Vehiculo::class);
    }
}
