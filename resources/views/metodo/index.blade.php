@extends('adminlte::page')

@section('title', 'Gimnasio - Métodos de pago')

@section('content_header')
    <h1>Métodos de pago</h1>
@stop

@section('content')

    <div class="">
        <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo método de pago</a>
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
                @foreach ($metodos as $metodo)
                    <tr>
                        <td>{{ $metodo->id }}</td>
                        <td>{{ $metodo->nombre }}</td>
                        <td>{{ $metodo->descripcion }}</td>
                        <td class="text-center">
                            @if ($metodo->estado == 1)
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
        <p>Mostrando {{ $metodos->firstItem() }} - {{ $metodos->lastItem() }} de {{ $metodos->total() }} registros</p>
        {{ $metodos->links('pagination::bootstrap-4', ['only' => ['paginator']]) }}
    </div>
    
@stop   
