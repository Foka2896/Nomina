<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CodigoTransporte extends Model
{

    protected $fillable = ['Fecha', 'Codigo', 'Placa', 'Caja'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y', // Change your format
        'updated_at' => 'datetime:d/m/Y',
    ];

    protected $dateFormat = 'Y-m-d';

}
