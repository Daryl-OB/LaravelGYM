@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')

    <div class="">
        <a href="{{ route('categorias.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nueva
            categoria</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i>
            {{ session('success') }}
        </div>
    @endif


    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr id="reg_categoria">
                        <td id="cat_id">{{ $categoria->id }}</td>
                        <td id="cat_nom">{{ $categoria->nombre }}</td>
                        <td id="cat_desc">{{ $categoria->descripcion }}</td>
                        <td id="cat_est" class="text-center">
                            @if ($categoria->estado == 1)
                                <span class="badge badge-success">Activo</span>
                            @else
                                <span class="badge badge-danger">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                        class="btn btn-warning mr-1 rounded"><i class="fas fa-edit"></i></a>
                                    <!-- Button abrit modal eliminar -->
                                    <button type="button" id="" class="btn btn-danger ml-1 rounded btnEliminar"
                                        data-toggle="modal" data-target="#modalEliminarCategoria"
                                        data-nombre="{{ $categoria->nombre }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>     
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        <div>
            <p>Mostrando {{ $categorias->firstItem() }} - {{ $categorias->lastItem() }} de {{ $categorias->total() }} registros
            </p>
            {{ $categorias->links('pagination::bootstrap-4', ['only' => ['paginator']]) }}
        </div>
    </div>

    <!-- Modal Eliminar Categoria -->
    <div class="modal fade" id="modalEliminarCategoria" tabindex="-1" role="dialog"
        aria-labelledby="modalEliminarCategoriaCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro que deseas eliminar la categoria? <br> <strong class="text-uppercase"
                            id="nombreCategoria">{{-- Nombre de la categoria --}}</strong></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {{-- FORMULARIO PARA MANDAR EL ID A ELIMNAR --}}
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Fin del modal eliminar --}}

@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var botonesEliminar = document.querySelectorAll('.btnEliminar');

            botonesEliminar.forEach(function(boton) {
                boton.addEventListener('click', function() {
                    var nombreCategoria = this.getAttribute('data-nombre');
                    document.getElementById('nombreCategoria').textContent = nombreCategoria;
                });
            });
        });
    </script>
@stop