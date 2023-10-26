<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::paginate();

        return view('alumno.index', compact('alumnos'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();
        return view('alumno.create', compact('alumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alumno::$rules);
        $nombre = $request->file('imagen')->getClientOriginalName();
        $image = $request->file('imagen')->storeAs("public", $nombre);
        $alumno = new Alumno();
        $alumno->nombre = $request->input('nombre');
        $alumno->apellido_p = $request->input('apellido_p');
        $alumno->apellido_m = $request->input('apellido_m');
        $alumno->clave = $request->input('clave');
        $alumno->imagen = $nombre;
        $alumno->save();


        return redirect()->route('alumnos.index', compact('alumno'))
            ->with('success', 'Alumno guardado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        request()->validate(Alumno::$rules);
        
        if ($request->hasFile('imagen')) {
            
            $nombre = $request->file('imagen')->getClientOriginalName();
            $image = $request->file('imagen')->storeAs("public", $nombre);
            // dd($image);
        } else {
            $nombre = $alumno->imagen;
        }
        $alumno->nombre = $request->input('nombre');
        $alumno->apellido_p = $request->input('apellido_p');
        $alumno->apellido_m = $request->input('apellido_m');
        $alumno->clave = $request->input('clave');
        $alumno->imagen = $nombre;
        $alumno->update();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id)->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente');
    }
}
