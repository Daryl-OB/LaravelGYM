@extends('adminlte::page')

@section('title', 'Promociones')

@section('content_header')
    <h1>Promociones</h1>
@stop

@section('content')

    {{-- botón de crear nuevo --}}
    <div class="">
        <a href="{{ route('promociones.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nueva promoción</a>
    </div>

    {{-- alerta que aparece luego de realizar una accion (crear, editar, eliminar) --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- tabla donde se muestran los registros de la base de datos --}}
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
                                {{-- botón de editar --}}
                                <a href="{{ route('promociones.edit', $promocion->id) }}" class="btn btn-warning mr-1 rounded"><i class="fas fa-edit"></i></a>
                                
                                {{--botón de eliminar --}}
                                <form action="{{ route('promociones.destroy', $promocion->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ml-1 rounded"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- paginación de la tabla --}}
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                Mostrando 
                {{ $promociones->firstItem() }} - {{ $promociones->lastItem() }} de {{ $promociones->total() }} registros
            </div>
            <div class="col-12">
                {{ $promociones->links('pagination::bootstrap-4', ['only' => ['paginator']]) }}
            </div>    
        </div>
    </div>
    
    
@stop   
