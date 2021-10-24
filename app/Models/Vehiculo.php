<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'placa'
    ];

    public function personal(){
        return $this->belongsToMany(Personal::class);
    }
}
