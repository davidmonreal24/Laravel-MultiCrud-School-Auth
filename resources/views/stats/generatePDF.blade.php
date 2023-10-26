<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Documento PDF</title>

  <!-- Estilos CSS en línea -->
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid black;
    }

    th, td {
      text-align: center;
      padding: 8px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
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
          <div class="card-body">
            <div class="table-responsive">
              <h2>Materias con más alumnos</h2>
              <table class="table table-striped table-hover">
                <!-- Encabezado de la tabla de materias con más alumnos -->
                <thead class="thead">
                  <tr>
                    <th>Nombre materia</th>
                    <th>Maestro</th>
                    <th>Cantidad de Alumnos</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($materias as $materia)
                  <tr>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->maestro }}</td>
                    <td>{{ $materia->cantidad_alumnos }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <div style="display: flex; justify-content: space between; align-items: center;">

              <span id="card_title">
                {{ __('') }}
              </span>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <h2>Alumnos con más materias inscritas</h2>
              <table class="table table-striped table-hover">
                <!-- Encabezado de la tabla de alumnos con más Materias inscritas -->
                <thead class="thead">
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Clave</th>
                    <th>Cantidad de Materias</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($alumnosConMaterias as $alumno)
                  <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido_p }}</td>
                    <td>{{ $alumno->apellido_m }}</td>
                    <td>{{ $alumno->clave }}</td>
                    <td>{{ $alumno->cantidad_materias }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
