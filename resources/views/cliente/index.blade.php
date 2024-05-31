@extends('adminlte::page')

@section('title', 'Gimnasio - Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

    <div class="">
        <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo cliente</a>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Dni</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->dni }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->ap_paterno }}</td>
                        <td>{{ $cliente->ap_materno }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->direccion }}</td>
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
        <p>Mostrando {{ $clientes->firstItem() }} - {{ $clientes->lastItem() }} de {{ $clientes->total() }} registros</p>
        {{ $clientes->links('pagination::bootstrap-4', ['only' => ['paginator']]) }}
    </div>
    
@stop   
