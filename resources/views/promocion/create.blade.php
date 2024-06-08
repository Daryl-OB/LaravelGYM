@extends('adminlte::page')

@section('title', 'Nueva promoción')

@section('content_header')
    {{--  <h1>Crear nueva promoción</h1> --}}
@stop

@section('content')
    {{-- CONTENEDOR DEL FORMULARIO DE REGISTRAR PROMOCIONES --}}
    <div class="row mt-3">
        <div class="col-md-6">
            {{-- BOTON DE REGRESAR A LA VISTA PRINCIPAL DE PROMOCIONES --}}
            <a href="{{ route('promociones.index') }}" class="btn btn-warning mt-3"><i class="fas fa-reply"></i> Volver</a>

            {{-- Mensaje de error en caso falle el agregado --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="title mt-3">
                <h3 class="tile-title">Crear nueva promoción</h3>
                <div class="tile-body">
                    {{-- INICIO DEL FORMULARIO --}}
                    <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        {{-- CAMPO NOMBRE --}}
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input class="form-control" type="text" name="txtNombre"
                                autocomplete="off" required placeholder="Ingresa el nombre de la promoción" >             
                        </div>
                        {{-- CAMPO DESCRIPCION --}}
                        <div class="mb-3">
                            <label class="form-label">Descripción:</label>
                            <textarea class="form-control" name="txtDescripcion" rows="4" placeholder="Ingresa la descripción de la promoción"
                            autocomplete="off" required></textarea>
                            <div class="invalid-feedback">Por favor ingresa una descripción.</div>
                        </div>
                        {{-- BOTON DE GUARDAR INFO --}}
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                Guardar</button>&nbsp;&nbsp;&nbsp;
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
