<?php

namespace App\Models;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $fillable = [
        'Cantidad'
    ];
    
}
