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
                'Codigo'    => $row[0],
                'Placa'     => $row[1],
                'Caja'      => $row[2],
            ]);
        } else {
            return null;
        }
    }
}
