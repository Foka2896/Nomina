<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    /**
     * Display a listing of
     * the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $personales = DB::table('personals')->select('id', 'Nombre', 'Apellido', 'Cargo','cd')
            ->where('Cargo', 'LIKE', '%' . $texto . '%')
            ->orwhere('Nombre', 'LIKE', '%' . $texto . '%')
            ->orwhere('Apellido', 'LIKE', '%' . $texto . '%')
            ->orwhere('cd', 'LIKE', '%' . $texto . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);
        //$totalc=$personales->total();
        $totalc = DB::table('personals')->select('id', 'Nombre', 'Apellido', 'Cargo','cd')
            ->where('Cargo', '=', 'Conductor')
            ->orderBy('id', 'asc')
            ->count('id');
        $totalv = DB::table('personals')->select('id', 'Nombre', 'Apellido', 'Cargo','cd')
            ->where('Cargo', '=', 'Vendedor')
            ->orderBy('id', 'asc')
            ->count('id');
        $totala = DB::table('personals')->select('id', 'Nombre', 'Apellido', 'Cargo','cd')
            ->where('Cargo', '=', 'Auxiliar')
            ->orderBy('id', 'asc')
            ->count('id');
        return view('personal.index', compact('personales', 'texto', 'totalc', 'totalv','totala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Personal $id)
    {

        $personal = new personal;
        $personal->nombre = $request->input('nombre');
        $personal->apellido = $request->input('apellido');
        $personal->cargo = $request->input('cargo');
        $personal->cd = $request->input('cd');
        $personal->save();

        //$totalvendedor=$cargo->vendedor->total();
        //$totalauxiliar=$cargo->auxiliar->total();
        return redirect()->route('personal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal = Personal::findOrFail($id);
        return view('personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $personal = Personal::FindOrFail($id);
        $personal->nombre = $request->input('Nombre');
        $personal->apellido = $request->input('apellido');
        $personal->cargo = $request->input('cargo');
        $personal->cd = $request->input('cd');
        $personal->save();

        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal = Personal::FindOrFail($id);
        $personal->delete();
        return redirect()->route('personal.index');
    }
}
