@extends('adminlte::page')

@section('title', 'Categorias')

@section('css')
    {{-- Incluye el CSS de los botones de DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">
@stop

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
        <table class="table table-hover w-100" id="tableCategoria">
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

            </tbody>
        </table>
    </div>
@stop

@section('js')

    {{-- Incluyendo los botones de DataTables --}}
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
    {{-- Incluyendo los botones específicos que desees utilizar --}}
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#tableCategoria').DataTable({
                //url para obtener los registros de la tabla categoria en formato json
                ajax: {
                    url: "{{ route('datatables.categoria') }}",
                    type: "GET",
                    dataSrc: ''
                },
                //claves de los datos del json
                columns: [
                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'descripcion'},
                    {
                        data: 'estado',
                        render: function(data) {
                            if(data === 1){
                                return `<span class="badge badge-success">Activo</span>`
                            }
                            else{
                                return `<span class="badge badge-danger">Inactivo</span>`
                            }
                        }
                    },
                    //columna extra para los botones de acción (editar y eliminar)
                    {
                        data: null,
                        className: 'text-center',
                        render: function(data) {
                            return `
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-warning rounded mr-1" href="{{ route('categorias.edit', '') }}/${data.id}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('categorias.destroy', '') }}/${data.id}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-1 rounded"><i class="fas fa-trash-alt"></i></button>
                                    </form>  
                                </div>
                            `;
                        },
                        //orderable: false
                    }
                ],
                //ordernar primera columna de forma descendente (mayor a menor)
                "order": [[0, "desc"]],
                //configuracion de la info predeterminada del datatable:
                //la pasamos a español
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                },
                //numero de registros por pagina
                pageLength: 10,
                //orden de los componentes (Buttons, filtering, processing, table, information, pagination)
                dom: 'Bfrtip',
                //botones integrados
                buttons: [
                    {
                        extend: 'copy',
                        text: '<span>Copiar <i class="fas fa-copy"></i></span>', // Icono para el botón "Copy"
                        className: 'btn btn-info', // Clase personalizada para el botón "Copy"
                    },
                    {
                        extend: 'excel',
                        text: '<span>Excel <i class="fas fa-file-excel"></i></span>', // Icono para el botón "Excel"
                        className: 'btn btn-success', // Clase personalizada para el botón "Excel"
                    },
                    {
                        extend: 'pdf',
                        text: '<span>PDF <i class="fas fa-file-pdf"></i></span>', // Icono para el botón "PDF"
                        className: 'btn btn-danger', // Clase personalizada para el botón "PDF"
                    },
                    {
                        extend: 'print',
                        text: '<span>Imprimir <i class="fas fa-print"></i></span>', // Icono para el botón "Print"
                    }
                ],
                //Mantiene la configuración de la tabla (como el orden y la página actual) 
                //después de actualizar la página.
                //stateSave: true,
            });
        });
    </script>
@stop
