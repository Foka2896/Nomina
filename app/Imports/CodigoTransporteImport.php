<?php

namespace App\Imports;

use App\Models\CodigoTransporte;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class CodigoTransporteImport implements ToModel
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        if ($row[0] != "Codigo") {
            return new CodigoTransporte([
                'Fecha'    => $row[0],
                'Codigo'    => $row[1],
                'Placa'     => $row[2],
                'Caja'      => $row[3],
            ]);
        } else {
            return null;
        }
    }
}
