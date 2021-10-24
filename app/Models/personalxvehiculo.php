<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personalxvehiculo extends Model
{
    protected $fillable = [
        'personal_Id',
        'transportes_Id',
        'fecha_diaria'
    ];
}
