@extends('layouts.app')

@section('template_title')
Stats
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('') }}
            </span>
            <div class="float-right">
              <a href="{{route('stats.generatePDF')}}" class="btn btn-primary btn-sm float-right" data-placement="left">
                {{ __('Generar pdf') }}
              </a>
            </div>
          </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card-body">
          <div class="table-responsive">
            <h2>Materias con más alumnos</h2>
            <table class="table table-striped table-hover">
              <!-- Encabezado de la tabla de materias con más alumnos -->
              <thead class="thead">
                <tr>
                  <th>No</th>
                  <th>Nombre materia</th>
                  <th>Maestro</th>
                  <th>Cantidad de Alumnos</th> <!-- Añadimos esta columna -->
                </tr>
              </thead>
              <tbody>
                @foreach ($materias as $materia)
                <tr>
                  <td>{{ ++$j }}</td>
                  <td>{{ $materia->nombre }}</td>
                  <td>{{ $materia->maestro }}</td>
                  <td>{{ $materia->cantidad_alumnos }}</td> <!-- Mostramos la cantidad de alumnos -->
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {!! $materias->links() !!}
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('') }}
            </span>
          </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card-body">
          <div class="table-responsive">
            <h2>Alumnos con más materias inscritas</h2>
            <table class="table table-striped table-hover">
              <!-- Encabezado de la tabla de alumnos con más Materias inscritas -->
              <thead class="thead">
                <tr>
                  <th>No</th>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Clave</th>
                  <th>Cantidad de Materias</th> <!-- Añadimos esta columna -->
                </tr>
              </thead>
              <tbody>
                @foreach ($alumnosConMaterias as $alumno)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $alumno->nombre }}</td>
                  <td>{{ $alumno->apellido_p }}</td>
                  <td>{{ $alumno->apellido_m }}</td>
                  <td>{{ $alumno->clave }}</td>
                  <td>{{ $alumno->cantidad_materias }}</td> <!-- Mostramos la cantidad de materias inscritas -->
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- Paginación de la tabla de alumnos con más Materias inscritas -->
          {!! $alumnosConMaterias->links() !!}
        </div>
      </div>
      <!-- {!! $materias->links() !!} -->
    </div>
  </div>
</div>
@endsection