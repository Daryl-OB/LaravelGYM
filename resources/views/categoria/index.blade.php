@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')

    {{-- boton de crear nuevo --}}
    <div class="">
        <a href="{{ route('categorias.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nueva
            categoria</a>
    </div>

    {{-- alerta que se muestra luego de realizar una acción (crear, editar, eliminar) --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- tabla donde de muestran los registros de la base de datos --}}
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

                                    {{-- boton de editar --}}
                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                        class="btn btn-warning mr-1 rounded"><i class="fas fa-edit"></i></a>
                                    
                                    {{-- boton de eliminar --}}
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger ml-1 rounded" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                
                                </div>
                            </div>     
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- paginacion de la tabla --}}
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                Mostrando 
                {{ $categorias->firstItem() }} - {{ $categorias->lastItem() }} de {{ $categorias->total() }} registros
            </div>
            <div class="col-12">
                {{ $categorias->links('pagination::bootstrap-4', ['only' => ['paginator']]) }}
            </div>    
        </div>
    </div>

@stop
