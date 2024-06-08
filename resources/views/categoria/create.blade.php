@extends('adminlte::page')

@section('title', 'Nueva Categoría')

@section('content_header')
    {{--  <h1>Crear nueva categoría</h1> --}}
@stop

@section('content')

    {{-- CONTENEDOR DEL FORMULARIO DE REGISTRAR CATEGORIA --}}
    <div class="row mt-3">
        <div class="col-md-6">
            {{-- BOTON DE REGRESAR A LA VISTA PRINCIPAL DE CATEGORIAS --}}
            <a href="{{ route('categorias.index') }}" class="btn btn-warning mt-3"><i class="fas fa-reply"></i> Volver</a>

            {{-- Mensaje de error en caso falle el agregado --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="title mt-3">
                <h3 class="tile-title">Nueva categoría</h3>
                <div class="tile-body">
                    {{-- INICIO DEL FORMULARIO --}}
                    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        {{-- CAMPO NOMBRE --}}
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input class="form-control" type="text" name="txtNombre"
                                placeholder="Ingresa el nombre de la categoria" required autocomplete="off">
                        </div>
                        {{-- CAMPO DESCRIPCION --}}
                        <div class="mb-3">
                            <label class="form-label">Descripción:</label>
                            <textarea class="form-control" name="txtDescripcion" rows="4" placeholder="Ingresa la descripción de la categoría"
                                required autocomplete="off"></textarea>
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
