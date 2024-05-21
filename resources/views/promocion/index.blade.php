@extends('adminlte::page')

@section('title', 'Gimnasio - Promociones')

@section('content_header')
    <h1>Promociones</h1>
@stop

@section('content')

    <div class="">
        <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nueva promoción</a>
    </div>

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
                @foreach ($promociones as $promocion)
                    <tr>
                        <td>{{ $promocion->id }}</td>
                        <td>{{ $promocion->nombre }}</td>
                        <td>{{ $promocion->descripcion }}</td>
                        <td class="text-center">
                            @if ($promocion->estado == 1)
                                <span class="badge badge-success">Activo</span>
                            @else
                                <span class="badge badge-danger">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="#" class="btn btn-warning mr-1 rounded"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger ml-1 rounded"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center">
        <p>Mostrando {{ $promociones->firstItem() }} - {{ $promociones->lastItem() }} de {{ $promociones->total() }} registros</p>
        {{ $promociones->links('pagination::bootstrap-4', ['only' => ['paginator']]) }}
    </div>
    
@stop   
