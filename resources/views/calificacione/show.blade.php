@extends('layouts.app')

@section('template_title')
    {{ $calificacione->name ?? "{{ __('Show') Calificacione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Calificaciones</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('calificaciones.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Calificacion:</strong>
                            {{ $calificacione->calificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Materia:</strong>
                            {{ $calificacione->materia->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Clave alumno:</strong>
                            {{ $calificacione->alumno->clave }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
