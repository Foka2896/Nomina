<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\CodigoTransporte;
use App\Models\Personal;
use App\Models\personalxvehiculo;
use App\Models\Vehiculo;
use CreatePersonalsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalxvehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $vehiculos = DB::table('vehiculos')->select('id', 'placa')
            ->where('Placa', 'LIKE', '%' . $texto . '%')
            ->orwhere('Placa', 'LIKE', '%' . $texto . '%')
            ->orderBy('id', 'asc');
        $personalxvehiculos = personalxvehiculo::Select('personalxvehiculos.transportes_Id As id', 'personalxvehiculos.fecha_diaria', 'codigo_transportes.Codigo', 'codigo_transportes.Placa', 'codigo_transportes.Caja', 'personalxvehiculos.transportes_Id')
            ->Join('codigo_transportes', 'personalxvehiculos.transportes_Id', '=', 'codigo_transportes.id')
            ->groupBy('Placa')
            ->paginate(10);
        $total = $personalxvehiculos->total();

        return view('personalxvehiculo.index', compact('texto', 'personalxvehiculos', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conductor = Personal::all();
        $vendedor = Personal::all();
        $auxiliar = Personal::all();
        $vehiculo = Vehiculo::get();

        $cantidad = Caja::get();
        $transporte = DB::select('SELECT codigo_transportes.id, codigo_transportes.Codigo, codigo_transportes.Caja, vehiculos.placa as Placa FROM codigo_transportes INNER JOIN vehiculos ON codigo_transportes.Placa = vehiculos.placa WHERE codigo_transportes.id NOT IN (SELECT personalxvehiculos.transportes_Id FROM personalxvehiculos)');
        return view('personalxvehiculo.create', compact('conductor', 'vendedor', 'auxiliar', 'vehiculo', 'cantidad', 'transporte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request["nombreconductor"] > "0") {
            $personalxvehiculo = new personalxvehiculo();
            $personalxvehiculo->fecha_diaria = $request["fecha"];
            $personalxvehiculo->personal_Id = $request["nombreconductor"];
            $personalxvehiculo->transportes_Id = $request["vehiculo"];
            $personalxvehiculo->save();
        }

        if ($request["nombreconductor2"] > "0") {
            $personalxvehiculo = new personalxvehiculo();
            $personalxvehiculo->fecha_diaria = $request["fecha"];
            $personalxvehiculo->personal_Id = $request["nombreconductor2"];
            $personalxvehiculo->transportes_Id = $request["vehiculo"];
            $personalxvehiculo->save();
        }

        if ($request["nombrevendedor"] > "0") {
            $personalxvehiculo = new personalxvehiculo();
            $personalxvehiculo->fecha_diaria = $request["fecha"];
            $personalxvehiculo->personal_Id = $request["nombrevendedor"];
            $personalxvehiculo->transportes_Id = $request["vehiculo"];
            $personalxvehiculo->save();
        }

        if ($request["nombreauxiliar"] > "0") {
            $personalxvehiculo = new personalxvehiculo();
            $personalxvehiculo->fecha_diaria = $request["fecha"];
            $personalxvehiculo->personal_Id = $request["nombreauxiliar"];
            $personalxvehiculo->transportes_Id = $request["vehiculo"];
            $personalxvehiculo->save();
        }

        if ($request["nombreauxiliar2"] > "0") {
            $personalxvehiculo = new personalxvehiculo();
            $personalxvehiculo->fecha_diaria = $request["fecha"];
            $personalxvehiculo->personal_Id = $request["nombreauxiliar2"];
            $personalxvehiculo->transportes_Id = $request["vehiculo"];
            $personalxvehiculo->save();
        }

        if ($request["nombreauxiliar3"] > "0") {
            $personalxvehiculo = new personalxvehiculo();
            $personalxvehiculo->fecha_diaria = $request["fecha"];
            $personalxvehiculo->personal_Id = $request["nombreauxiliar3"];
            $personalxvehiculo->transportes_Id = $request["vehiculo"];
            $personalxvehiculo->save();
        }

        return redirect()->route('personalxvehiculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\personalxvehiculo  $personalxvehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personalxvehiculo = personalxvehiculo::where('transportes_Id', '=', $id)->get();
        //Trae las personas que estan relacionadas al codigo transporte en personalxvehiculo para luego mostrar en la vista la informacion
        $fecha = $personalxvehiculo[0]->fecha_diaria;
        $transporteId = $personalxvehiculo[0]->transportes_Id;
        $personalitem = array();

        foreach ($personalxvehiculo as $personal) {
            $item = Personal::where('id', '=', $personal['personal_Id'])->get();
            if ($item->count() == 1) {
                array_push($personalitem, $item[0]->id);
            }else{
                array_push($personalitem, 0);
            }
        }
        //dd($personalitem);
        $transporte = CodigoTransporte::all();
        $personal = Personal::all();        
        return view('personalxvehiculo.show', compact('fecha', 'transporteId', 'personalitem', 'transporte', 'personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personalxvehiculo  $personalxvehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personalxvehiculo = personalxvehiculo::where('transportes_Id', '=', $id)->get();
        //Trae las personas que estan relacionadas al codigo transporte en personalxvehiculo para luego mostrar en la vista la informacion
        $fecha = $personalxvehiculo[0]->fecha_diaria;
        $transporteId = $personalxvehiculo[0]->transportes_Id;
        $personalitem = array();

        foreach ($personalxvehiculo as $personal) {
            $item = Personal::where('id', '=', $personal['personal_Id'])->get();
            if ($item->count() == 1) {
                array_push($personalitem, $item[0]->id);
            }else{
                array_push($personalitem, 0);
            }
        }

        $transporte = CodigoTransporte::all();
        $personal = Personal::all();

        return view('personalxvehiculo.edit', compact('fecha', 'transporteId', 'personalitem', 'transporte', 'personal', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int  $personalxvehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $personalxvehiculo = personalxvehiculo::where('transportes_Id', '=', $id)->get();
        foreach ($personalxvehiculo as $personal) {
            if ($request["nomper1"] >= 0) {
                $personal->update([
                    'personal_Id' => $request["nomper1"],
                    'transportes_Id' => $request["vehiculo"],
                    'fecha_diaria' => $request["fecha"]
                ]);
            } else if ($request["nomper2"] > 0) {
                $personal->update([
                    'personal_Id' => $request["nomper2"],
                    'transportes_Id' => $request["vehiculo"],
                    'fecha_diaria' => $request["fecha"]
                ]);
            } else if ($request["nomper3"] > 0) {
                $personal->update([
                    'personal_Id' => $request["nomper3"],
                    'transportes_Id' => $request["vehiculo"],
                    'fecha_diaria' => $request["fecha"]
                ]);
            } else if ($request["nomper4"] > 0) {
                $personal->update([
                    'personal_Id' => $request["nomper4"],
                    'transportes_Id' => $request["vehiculo"],
                    'fecha_diaria' => $request["fecha"]
                ]);
            } else if ($request["nomper5"] > 0) {
                $personal->update([
                    'personal_Id' => $request["nomper6"],
                    'transportes_Id' => $request["vehiculo"],
                    'fecha_diaria' => $request["fecha"]
                ]);
            }
        }

        return redirect()->route('personalxvehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personalxvehiculo  $personalxvehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personalxvehiculo = personalxvehiculo::where('transportes_Id', '=', $id)->get();
        foreach ($personalxvehiculo as $personal) {
            $personal->delete();
        }
        return redirect()->route('personalxvehiculo.index');
    }
    /*{
        $personalxvehiculo=Personalxvehiculo::FindOrFail($id);
        $personalxvehiculo->delete();
        return redirect()->route('personalxvehiculo.index');

    }*/
    public function listvehiculos()
    {
        $total = Vehiculo::all();
    }

    public function temp(Request $resquest)
    {
        CodigoTransporte::create([
            'Codigo' => "Temporal",
            'Caja' => $resquest->get('caja'),
            'Placa' => Vehiculo::find($resquest->get('vehiculo'))->placa
        ]);
        return redirect()->route('personalxvehiculo.create');
    }
}
