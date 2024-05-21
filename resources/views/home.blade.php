@extends('adminlte::page')

@section('title', 'Gimnasio')

@section('content_header')

@stop

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">¡Bienvenido a nuestro Gimnasio!</h1>
        <p class="lead">Estamos comprometidos en ayudarte a alcanzar tus metas de fitness.</p>
        <hr class="my-4">
        <p>Descubre nuestras clases, entrenamientos personalizados y más.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Explorar Clases</a>
    </div>

    <div class="row">
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

    <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>



@stop
