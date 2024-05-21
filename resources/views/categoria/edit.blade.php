@extends('adminlte::page')

@section('title', 'Gimnasio - Editar Categoría')

@section('content_header')
    {{--  <h1>Crear nueva categoría</h1> --}}
@stop

@section('content')

    {{-- CONTENEDOR DEL FORMULARIO DE REGISTRAR CATEGORIA --}}
    <div class="row mt-3">
        <div class="col-md-6">

            {{-- BOTON DE REGRESAR A LA VISTA PRINCIPAL DE CATEGORIAS --}}
            <a href="{{ route('categorias.index') }}" class="btn btn-warning mt-3"><i class="fas fa-reply"></i> Volver</a>

            <div class="title mt-3">
                <h3 class="tile-title">Editar categoría</h3>
                <div class="tile-body">
                    {{-- INICIO DEL FORMULARIO --}}
                    <form action="{{ route('categorias.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- CAMPO NOMBRE --}}
                        <input type="hidden" name="cid" value="{{ $categoria->id }}">
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input class="form-control" type="text" name="txtNombre"
                                placeholder="Ingresa el nombre de la categoria" required value="{{ $categoria->nombre }}">
                            <div class="invalid-feedback">Por favor ingresa un nombre.</div>
                        </div>
                        {{-- CAMPO DESCRIPCION --}}
                        <div class="mb-3">
                            <label class="form-label">Descripción:</label>
                            <textarea class="form-control" name="txtDescripcion" rows="4" placeholder="Ingresa la descripción de la categoría"
                                required>{{ $categoria->descripcion }}</textarea>
                            <div class="invalid-feedback">Por favor ingresa una descripción.</div>
                        </div>
                        {{-- CAMPO DE ESTADO --}}
                        <div class="mb-3">
                            <label class="form-label">Estado:</label>
                            <select class="form-select custom-select" name="cmbEstado" required>
                                <option value="1" @if ($categoria->estado == 1) selected @endif>Activo</option>
                                <option value="0" @if ($categoria->estado == 0) selected @endif>Inactivo</option>
                            </select>
                            <div class="invalid-feedback">Por favor selecciona un estado.</div>
                        </div>


                        {{-- BOTON DE GUARDAR INFO --}}
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                Actualizar</button>&nbsp;&nbsp;&nbsp;
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
