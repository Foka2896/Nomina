<?php

namespace App\Exports;

use App\Models\CodigoTransporte;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReporteExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(string $inicial, string $final)
    {
        $this->inicial = $inicial;
        $this->final = $final;
    }

    public function headings(): array
    {
        return [
            'Fecha De Creacion',
            'Nombre Tripulacion',
            'Placa Vehiculo',
            'Codigo De Trasnporte',
            'Cajas'
        ];
    }

    public function query()
    {
        return CodigoTransporte::query()->SELECT('personalxvehiculos.fecha_diaria', DB::raw("concat(personals.Nombre, ' ', personals.Apellido) AS Tripulacion"), 'personals.Cargo', 'codigo_transportes.Codigo', 'codigo_transportes.Caja')
            ->JOIN('personalxvehiculos', 'personalxvehiculos.transportes_Id', '=', 'codigo_transportes.id')
            ->JOIN('personals', 'personalxvehiculos.personal_Id', '=', 'personals.id');
    }
}
