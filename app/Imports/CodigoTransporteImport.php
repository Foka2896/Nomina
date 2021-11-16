<?php

namespace App\Imports;

use App\Models\CodigoTransporte;
use App\Models\Vehiculo;
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
        if ($row[1] != "Codigo") {

            $data = Vehiculo::firstOrNew(['placa' => $row[2]]);
            $data->save();

            $CodigoTransporte = CodigoTransporte::where(['codigo' => $row[1]])->get();
            if ($CodigoTransporte->isEmpty()) {
                $CodigoTransporte = CodigoTransporte::create([
                    'Fecha'    => $row[0],
                    'Codigo'    => $row[1],
                    'Placa'     => $row[2],
                    'Caja'      => $row[3],
                ]);
                $CodigoTransporte->save();
            }else{
                $CodigoTransporte = CodigoTransporte::Find($CodigoTransporte[0]->id);
                $CodigoTransporte->update([
                    'Fecha' => $row[0],
                    'Placa' => $row[2],
                    'Caja' => $row[3]
                ]);
                $CodigoTransporte->save();
            }

            return $CodigoTransporte;
        } else {
            return null;
        }
    }
}
