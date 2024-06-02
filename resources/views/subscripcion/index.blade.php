@extends('adminlte::page')

@section('title', 'Subscripciones')

@section('content_header')
    <h1>Subscripciones</h1>
@stop

@section('content')

    <div class="">
        <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nueva subscripción</a>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Boleta</th>
                    <th>Cliente</th>
                    <th>Categoria</th>
                    <th>Promocion</th>
                    <th>Emision</th>
                    <th>Caducidad</th>
                    <th>Metodo</th>
                    <th>Costo</th>
                    <th>Pago</th>
                    <th>Deuda</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscripciones as $subscripcion)
                    <tr>
                        <td>{{ $subscripcion->id }}</td>
                        <td>{{ $subscripcion->numero_boleta }}</td> 
                        {{-- Usamos la función cliente de nuestro modelo para hacer referencia al cliente que es llave foranea --}}
                        <td>{{ $subscripcion->cliente->nombre }} {{$subscripcion->cliente->ap_paterno}} {{$subscripcion->cliente->ap_materno}}</td>
                        {{-- Usamos la función categoria de nuestro modelo para hacer referencia a la categoria que es llave foranea --}}
                        <td>{{ $subscripcion->categoria->nombre }}</td>
                        {{-- Usamos la función promocion de nuestro modelo para hacer referencia a la promocion que es llave foranea --}}
                        <td>{{ $subscripcion->promocion->nombre }}</td>
                        <td>{{ $subscripcion->fecha_inicio }}</td>
                        <td>{{ $subscripcion->fecha_fin }}</td>
                        {{-- Usamos la función metodo de nuestro modelo para hacer referencia al metodo que es llave foranea --}}
                        <td>{{ $subscripcion->metodo->nombre }}</td>
                        <td>{{ $subscripcion->monto_costo }}</td>
                        <td>{{ $subscripcion->monto_pagado }}</td>
                        <td>{{ $subscripcion->monto_deuda }}</td>
                        <td class="text-center">
                            @if ($subscripcion->estado == 1)
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

    <div class="d-flex justify-content-center">
        <div class="text-center">
            <p>Mostrando {{ $subscripciones->firstItem() }} - {{ $subscripciones->lastItem() }} de
                {{ $subscripciones->total() }} registros</p>
            {{ $subscripciones->links('pagination::bootstrap-4', ['only' => ['paginator']]) }}
        </div>
    </div>

@stop
