<?php

namespace App\Http\Controllers;

use App\Models\Infracciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfraccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $texto = trim($request->get('texto'));
        $registros = DB::table('infracciones')
            ->select('id', 'dni', 'fecha', 'placa', 'infraccion', 'descripcion')
            ->where('id', 'LIKE', '%' . $texto . '%')
            ->orWhere('dni', 'LIKE', '%' . $texto . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('infracciones.index', compact(['registros', 'texto']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $infracciones = new Infracciones();
        return view('infracciones.action', ['infracciones' => new Infracciones()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $registro = new Infracciones();
            $registro->dni = $request->input('dni');
            $registro->fecha = $request->input('fecha');
            $registro->placa = $request->input('placa');
            $registro->infraccion = $request->input('infraccion');
            $registro->descripcion = $request->input('descripcion');
            $registro->save();
            return redirect()->route('infracciones.index')->with('mensaje', 'Registro ' . $registro->dni . ' creado safistactoriamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('infracciones.index')->with('error', 'No se puede crear el registro');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Infracciones $infracciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $infracciones = Infracciones::findOrFail($id);
        return view('infracciones.action', compact('infracciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $registro = Infracciones::findOrFail(id: $id);
            $registro->dni = $request->input('dni');
            $registro->fecha = $request->input('fecha');
            $registro->placa = $request->input('placa');
            $registro->infraccion = $request->input('infraccion');
            $registro->descripcion = $request->input('descripcion');
            $registro->save();
            return redirect()->route('infracciones.index')->with('mensaje', 'Registro ' . $registro->dni . ' actualizado safistactoriamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('infracciones.index')->with('error', 'No se puede actualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro = Infracciones::findOrFail($id);
        try {
            $registro->delete();
            return redirect()->route('infracciones.index')->with('mensaje', 'Registro ' . $registro->dni . ' eliminado correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('infracciones.index')->with('error', 'No se puede eliminar el registro ' . $registro->dni . ' porque esta siendo usado.');
        }
    }
}
