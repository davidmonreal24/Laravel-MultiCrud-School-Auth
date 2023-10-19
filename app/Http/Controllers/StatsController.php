<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\Materia;
use Barryvdh\DomPDF\Facade\Pdf;

class StatsController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::paginate();
        $materias = Materia::select(
            'materias.id',
            'materias.nombre',
            'materias.maestro',
            DB::raw('COUNT(calificaciones.id_alumno) as cantidad_alumnos')
        )
            ->leftJoin('calificaciones', 'materias.id', '=', 'calificaciones.id_materia')
            ->groupBy('materias.id', 'materias.nombre', 'materias.maestro')
            ->orderBy('cantidad_alumnos', 'desc')
            ->paginate();
        $alumnosConMaterias = Alumno::select(
            'alumnos.id',
            'alumnos.nombre',
            'alumnos.apellido_p',
            'alumnos.apellido_m',
            'alumnos.clave',
            DB::raw('COUNT(calificaciones.id_materia) as cantidad_materias')
        )
            ->leftJoin('calificaciones', 'alumnos.id', '=', 'calificaciones.id_alumno')
            ->groupBy('alumnos.id', 'alumnos.nombre', 'alumnos.apellido_p', 'alumnos.apellido_m', 'alumnos.clave')
            ->orderBy('cantidad_materias', 'desc')
            ->paginate();

        return view('stats.index', compact('alumnos', 'materias', 'alumnosConMaterias'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage())
            ->with('j', (request()->input('page', 1) - 1) * $materias->perPage());
        // $dompdf = new Dompdf();
        // $dompdf->loadDOM()
        // $dompdf->stream();
    }
    public function generatePDF()
    {
        $alumnos = Alumno::all();
        $materias = Materia::all();
        $alumnosConMaterias = Alumno::select(
            'alumnos.id',
            'alumnos.nombre',
            'alumnos.apellido_p',
            'alumnos.apellido_m',
            'alumnos.clave',
            DB::raw('COUNT(calificaciones.id_materia) as cantidad_materias')
        )
            ->leftJoin('calificaciones', 'alumnos.id', '=', 'calificaciones.id_alumno')
            ->groupBy('alumnos.id', 'alumnos.nombre', 'alumnos.apellido_p', 'alumnos.apellido_m', 'alumnos.clave')
            ->orderBy('cantidad_materias', 'desc')
            ->get();

        $pdf = Pdf::loadView('stats.generatePDF', compact('alumnos','alumnosConMaterias','materias'));
        return $pdf->stream();
        // $pdf = Pdf::loadView('stats.generatePDF', compact('alumnos', 'alumnosConMaterias'));
        // return $pdf->download('reporte.pdf');
        

        // $pdf = new Dompdf();
        // $pdf->loadDOM()
        // return $pdf->download('reporte.pdf');
        // $pdf = Pdf::loadView('stats.generatePDF', compact('alumnos', 'materias', 'alumnosConMaterias'));
        // return $pdf->stream('invoice.pdf');
    }
}
