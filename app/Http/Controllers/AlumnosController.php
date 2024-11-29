<?php

namespace App\Http\Controller;

use App\Models\Alumnos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumno = Alumnos::withTrashed()->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:alumnos,email',
            'age' => 'required|integer|min:1|max:120'
        ]);

        Alumnos::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'age' => $request->age
        ]);

        return redirect()->route('alumnos.index')
                         ->with('success', 'Alumno creado exitosamente.');
    }

    public function show(Alumnos $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumnos $alumno)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:alumnos,email,' . $alumno->id,
            'age' => 'required|integer|min:1|max:120'
        ]);

        $alumno->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'age' => $request->age
        ]);

        return redirect()->route('alumnos.index')
                         ->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy(Alumnos $alumno)
    {
        $alumno->forceDelete();
        return redirect()->route('alumnos.index')
                         ->with('success', 'Alumno eliminado correctamente.');
    }
}
