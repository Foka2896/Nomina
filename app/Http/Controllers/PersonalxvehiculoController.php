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
            ->groupBy('Codigo')
            ->paginate(10);
        return view('personalxvehiculo.index', compact('texto', 'personalxvehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conductor = Personal::where("Cargo", "Conductor")->get();
        $vendedor = Personal::where("Cargo", "Vendedor")->get();
        $auxiliar = Personal::where("Cargo", "Auxiliar")->get();
        $vehiculo = Vehiculo::get();

        $cantidad = Caja::get();
        $transporte = DB::select('SELECT codigo_transportes.id, codigo_transportes.Codigo, codigo_transportes.Caja, vehiculos.placa as Placa FROM codigo_transportes INNER JOIN vehiculos ON codigo_transportes.Placa = vehiculos.placa WHERE codigo_transportes.id NOT IN (SELECT personalxvehiculos.transportes_Id FROM personalxvehiculos)');
        return view('personalxvehiculo.create', compact('conductor', 'vendedor', 'auxiliar', 'vehiculo','cantidad', 'transporte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        personalxvehiculo::create([
            'fecha_diaria' => $request->get('fecha'),
            'personal_Id' => $request->get('nombreconductor'),
            'transportes_Id' => $request->get('vehiculo')
        ]);

        if ($request->get('nombreconductor2') != "Selecione un conductor") {
            personalxvehiculo::create([
                'fecha_diaria' => $request->get('fecha'),
                'personal_Id' => $request->get('nombreconductor2'),
                'transportes_Id' => $request->get('vehiculo')
            ]);
        }

        personalxvehiculo::create([
            'fecha_diaria' => $request->get('fecha'),
            'personal_Id' => $request->get('nombrevendedor'),
            'transportes_Id' => $request->get('vehiculo')
        ]);

        personalxvehiculo::create([
            'fecha_diaria' => $request->get('fecha'),
            'personal_Id' => $request->get('nombreauxiliar'),
            'transportes_Id' => $request->get('vehiculo')
        ]);

        if ($request->get("nombreauxiliar2") != "Selecione un auxiliar") {
            personalxvehiculo::create([
                'fecha_diaria' => $request->get('fecha'),
                'personal_Id' => $request->get('nombreauxiliar'),
                'transportes_Id' => $request->get('vehiculo')
            ]);
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
        $conductorId = 0;
        $conductorId2 = 0;
        $auxiliarId = 0;
        $auxiliarId2 = 0;
        $vendedorId = 0;
        $transporteId = 0;
        $fecha = $personalxvehiculo[0]["fecha_diaria"];
        foreach ($personalxvehiculo as $personal) {
            $conductor = Personal::where('id', '=', $personal['personal_Id'])->where('Cargo', '=', 'Conductor')->get();
            $auxiliar = Personal::where('id', '=', $personal['personal_Id'])->where('Cargo', '=', 'Auxiliar')->get();
            $vendedor = Personal::where('id', '=', $personal['personal_Id'])->where('Cargo', '=', 'Vendedor')->get();
            if ($conductor->count() == 1) {
                if ($conductorId == 0) {
                    $conductorId = $conductor[0]->id;
                } else {
                    $conductorId2 = $conductor[0]->id;
                }
            } else if ($auxiliar->count() == 1) {
                if ($auxiliarId == 0) {
                    $auxiliarId = $auxiliar[0]->id;
                } else {
                    $auxiliarId2 = $auxiliar[0]->id;
                }
            } else if ($vendedor->count() == 1) {
                $vendedorId = $vendedor[0]->{'id'};
            }
        }
        $transporte = CodigoTransporte::find($personalxvehiculo[0]['transportes_Id']);
        $conductor = Personal::where("Cargo", "Conductor")->get();
        $vendedor = Personal::where("Cargo", "Vendedor")->get();
        $auxiliar = Personal::where("Cargo", "Auxiliar")->get();
        $cantidad = Caja::get();

        return view('personalxvehiculo.show', compact('fecha', 'conductor', 'vendedor', 'auxiliar', 'transporte', 'conductorId', 'conductorId2', 'auxiliarId', 'auxiliarId2', 'vendedorId','cantidad'));
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
        $conductorId = 0;
        $conductorId2 = 0;
        $auxiliarId = 0;
        $auxiliarId2 = 0;
        $vendedorId = 0;
        $transporteId = CodigoTransporte::Select('id')->where('id', '=', $personalxvehiculo[0]['transportes_Id'])->first();
        $transporteId = $transporteId->id;
        $fecha = $personalxvehiculo[0]["fecha_diaria"];
        foreach ($personalxvehiculo as $personal) {
            $conductor = Personal::where('id', '=', $personal['personal_Id'])->where('Cargo', '=', 'Conductor')->get();
            $auxiliar = Personal::where('id', '=', $personal['personal_Id'])->where('Cargo', '=', 'Auxiliar')->get();
            $vendedor = Personal::where('id', '=', $personal['personal_Id'])->where('Cargo', '=', 'Vendedor')->get();
            if ($conductor->count() == 1) {
                if ($conductorId == 0) {
                    $conductorId = $conductor[0]->id;
                } else {
                    $conductorId2 = $conductor[0]->id;
                }
            } else if ($auxiliar->count() == 1) {
                if ($auxiliarId == 0) {
                    $auxiliarId = $auxiliar[0]->id;
                } else {
                    $auxiliarId2 = $auxiliar[0]->id;
                }
            } else if ($vendedor->count() == 1) {
                $vendedorId = $vendedor[0]->{'id'};
            }
        }
        $transporte = DB::select('SELECT codigo_transportes.id, codigo_transportes.Codigo, codigo_transportes.Caja, vehiculos.placa as Placa FROM codigo_transportes INNER JOIN vehiculos ON codigo_transportes.Placa = vehiculos.placa WHERE codigo_transportes.id NOT IN (SELECT personalxvehiculos.transportes_Id FROM personalxvehiculos where codigo_transportes.id <> ?)', [$id]);
        $conductor = Personal::where("Cargo", "Conductor")->get();
        $vendedor = Personal::where("Cargo", "Vendedor")->get();
        $auxiliar = Personal::where("Cargo", "Auxiliar")->get();
        $cantidad = Caja::where("cantidad")->get();

        return view('personalxvehiculo.edit', compact('id', 'fecha', 'conductor', 'vendedor', 'auxiliar', 'transporte', 'cantidad', 'conductorId', 'conductorId2', 'auxiliarId', 'auxiliarId2', 'vendedorId', 'transporteId','cantidad'));
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
        $conductorId = $request->get('nombreconductor') ?? 0;
        $conductorId2 = $request->get('nombreconductor2') ?? 0;
        $vendedorId = $request->get('nombrevendedor') ?? 0;
        $auxiliarId = $request->get('nombreauxiliar') ?? 0;
        $auxiliarId2 = $request->get('nombreauxiliar2') ?? 0;
        $transporte = $request->get('vehiculo') ?? 0;
        $caja = $request->get('cantidad') ?? 0;
        $fecha = $request->get('fecha');
        foreach ($personalxvehiculo as $personal) {
            if ($conductorId > 0) {
                $personal->update([
                    'personal_Id' => $conductorId,
                    'transportes_Id' => $transporte,
                    'fecha_diaria' => $fecha
                ]);
                $conductorId = 0;
            } else if ($conductorId2 > 0) {
                $personal->update([
                    'personal_Id' => $conductorId2,
                    'transportes_Id' => $transporte,
                    'fecha_diaria' => $fecha
                ]);
                $conductorId2 = 0;
            } else if ($vendedorId > 0) {
                $personal->update([
                    'personal_Id' => $vendedorId,
                    'transportes_Id' => $transporte,
                    'fecha_diaria' => $fecha
                ]);
                $vendedorId = 0;
            } else if ($auxiliarId > 0) {
                $personal->update([
                    'personal_Id' => $auxiliarId,
                    'transportes_Id' => $transporte,
                    'fecha_diaria' => $fecha
                ]);
                $auxiliarId = 0;
            } else if ($auxiliarId2 > 0) {
                $personal->update([
                    'personal_Id' => $auxiliarId2,
                    'transportes_Id' => $transporte,
                    'fecha_diaria' => $fecha
                ]);
                $auxiliarId2 = 0;
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
    public function listvehiculos ()
    {
        $total = Vehiculo::all();
    }
}
