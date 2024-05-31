@extends('adminlte::page')

{{-- @section('title', 'Home') --}}

@section('content_header')

    <div class="py-3">
        <h1 class="display-5">¡Estás en FitFusion!</h1>
        <p class="lead">El mejor sistema para llevar a la cima tu negocio fitness.</p>
    </div>


@stop

@section('content')

    
    <div class="row mb-5">
        {{-- Total de categorias --}}
        <div class="col-md-4">
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h3>{{$totalCategoriasActivas}}</h3>
                    <p>Categorias disponibles</p>
                </div>
                <div class="icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <a href="{{route('categorias.index')}}" class="small-box-footer">
                    Ver todas <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            {{-- Total de promociones --}}
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{$totalPromocionesActivas}}</h3>
                    <p>Promociones activas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tag"></i>
                </div>
                <a href="{{route('promociones.index')}}" class="small-box-footer">
                    Ver todas <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            {{-- Total de clientes --}}
            <div class="small-box bg-gradient-primary">
                <div class="inner">
                    <h3>{{$totalClientes}}</h3>
                    <p>Clientes registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('clientes.index')}}" class="small-box-footer">
                    Ver todos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            {{-- Total de metodos de pago --}}
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3>{{$totalMetodos}}</h3>
                    <p>Metodos de pago establecidos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <a href="{{route('metodos.index')}}" class="small-box-footer">
                    Ver todos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            {{-- Total de inscripciones (que no vencen aún) --}}
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>999</h3>
                    <p>Inscripciones vigentes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ver todas <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card">
                <img src="https://thumbs.dreamstime.com/b/man-weight-training-equipment-sport-gym-22843139.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Entrenamiento Personalizado</h5>
                    <p class="card-text">Obtén un plan de entrenamiento personalizado según tus objetivos.</p>
                    <a href="#" class="btn btn-primary">Más información</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://www.eatthis.com/wp-content/uploads/sites/4/2020/01/man-weight-lifting-training-workout-gym.jpg?quality=82&strip=1"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Clases en Grupo</h5>
                    <p class="card-text">Disfruta de nuestras clases en grupo dirigidas por expertos.</p>
                    <a href="#" class="btn btn-primary">Más información</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://img.freepik.com/free-photo/handsome-black-man-is-engaged-gym_1157-32161.jpg?size=626&ext=jpg&ga=GA1.1.1826414947.1698883200&semt=ais"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nutrición y Dietética</h5>
                    <p class="card-text">Recibe asesoramiento personalizado sobre nutrición y dietética.</p>
                    <a href="#" class="btn btn-primary">Más información</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Bookmarks</span>
                    <span class="info-box-number">410</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Uploads</span>
                    <span class="info-box-number">13,648</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">93,139</span>
                </div>

            </div>
        </div>
    </div>

@stop
