<?php

namespace App\Http\Controllers;

use App\Models\CodigoTransporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CodigoTransporteImport;

class CodigoTransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $codigoTransporte = DB::table('codigo_transportes')->select('id', 'Fecha', 'Codigo', 'Placa', 'Caja')
            ->where('Caja', 'LIKE', '%' . $texto . '%')
            ->orwhere('Fecha', 'LIKE', '%' . $texto . '%')
            ->orwhere('Placa', 'LIKE', '%' . $texto . '%')
            ->orwhere('Codigo', 'LIKE', '%' . $texto . "%")
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('camov.index', compact('texto', 'codigoTransporte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodigoTransporte  $codigoTransporte
     * @return \Illuminate\Http\Response
     */
    public function show(CodigoTransporte $codigoTransporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CodigoTransporte  $codigoTransporte
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $camov = CodigoTransporte::where("id", "=", $codigo)->first();

        return view('camov.edit', compact('camov'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodigoTransporte  $codigoTransporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $camov = CodigoTransporte::FindOrFail($id);
        $camov->codigo = $request->input('codigo');
        $camov->placa = $request->input('placa');
        $camov->caja = $request->input('caja');
        $camov->save();

        return redirect()->route('camov.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodigoTransporte  $codigoTransporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodigoTransporte $codigoTransporte)
    {
        //
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new CodigoTransporteImport, $file);
        return redirect()->route('camov.index')->with('status', 'Se cargo correctamente');
    }

    public function importdata(Request $request)
    {
        dd($request);
    }
}
