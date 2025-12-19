<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activos = Estudiante::where('estado','activo')->get();
        $historial = Estudiante::whereIn('estado',['pausado','graduado','retirado'])->get();

        return view('estudiantes.index', compact('activos','historial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:estudiantes',
            'idioma' => 'required',
            'nivel' => 'required',
            'estado' => 'required|in:activo,pausado,graduado,retirado',
        ]);

        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('success','Estudiante registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:estudiantes,email,'.$id,
            'idioma' => 'required',
            'nivel' => 'required',
            'estado' => 'required|in:activo,pausado,graduado,retirado',
        ], [
            'email.unique' => 'Este correo ya está registrado.',
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success','Estudiante actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update(['estado'=>'retirado']);
        return redirect()->route('estudiantes.index')->with('success','Estudiante marcado como retirado');
    }
}
