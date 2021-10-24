<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoTransporte extends Model
{
    use HasFactory;

    protected $fillable = ['Fecha','Codigo', 'Placa', 'Caja'];

}
