{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-3 bg-light">--}}
{{--                @if (count(Cart::getContent()))--}}
{{--                    <a href="{{route('cart.checkout')}}"> VER CARRITO <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>--}}
{{--                @endif--}}

{{--            </div>--}}
{{--            <div class="col-sm-9">--}}
{{--                <div class="row  justify-content-center">--}}
{{--                    @forelse ($productos as $item)--}}
{{--                        <div class="col-4 border p-5 mt-5 text-center">--}}
{{--                            <h1>{{$item->nombre}}</h1>--}}
{{--                            <P>$ {{$item->precio}}</P>--}}
{{--                            <form action="{{route('cart.add')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="producto_id" value="{{$item->id}}">--}}
{{--                                <input type="submit" name="btn"  class="btn btn-success" value="ADD TO CART">--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    @empty--}}

{{--                    @endforelse--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}



{{--<section class="example mt-4">--}}

{{--    <div class="table-responsive">--}}

{{--        <table class="table table-striped table-bordered table-hover">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Nombre</th>--}}
{{--                <th>Precio</th>--}}
{{--                <th>Stock</th>--}}
{{--                <th>Imagen</th>--}}
{{--                <th>Acciones</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($productos as $bic)--}}
{{--                <tr>--}}
{{--                    <td class="v-align-middle">{{$bic->nombre}}</td>--}}
{{--                    <td class="v-align-middle">{{$bic->precio}}</td>--}}
{{--                    <td class="v-align-middle">{{$bic->stock}}</td>--}}
{{--                    <td class="v-align-middle">--}}
{{--                        <img src="../uploads/{{$bic->imagenesarticulos()->first()->nombre}}" width="30" class="img-responsive">--}}
{{--                    </td>--}}
{{--                    <td class="v-align-middle">--}}

{{--                        <form action="{{route('cart.add')}}" method="post">--}}
{{--                                                        @csrf--}}
{{--                                                        <input type="hidden" name="producto_id" value="{{$bic->id}}">--}}
{{--                                                        <input type="submit" name="btn"  class="btn btn-success" value="ADD TO CART">--}}
{{--                                                    </form>--}}

{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--    </div>--}}
{{--</section>--}}


    <!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nube Colectiva">
    <link rel="shortcut icon" href="https://nubecolectiva.com/favicon.ico" />

    <meta name="theme-color" content="#000000" />

    <title>Ventas</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">

</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://nubecolectiva.com"><img src="https://nubecolectiva.com/img/logo.png" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://nubecolectiva.com">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://blog.nubecolectiva.com" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <form name="bencc" method="get" action="https://www.google.com/search" id="bencc" class="form-inline mt-2 mt-md-0" target="_blank">
                    <input type="hidden" name="domains" value="blog.nubecolectiva.com">
                    <input type="hidden" name="sitesearch" value="blog.nubecolectiva.com">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar..." aria-label="Buscar...">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="document.getElementById('bencc').submit()">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
</header>



<div class="container mb-5">

    <div class="row">

        <div class="col-md-12">

            <h1 style="font-size: 28px;" class=" text-center">CRUD Ventas</h1>

            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- Logo -->
                            <div class="logo">
                                <h1><a href="{{ route('venta') }}">Venta</a></h1>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group form">
                                        <!--
                                        <input type="text" class="form-control" placeholder="Buscar...">
                                        <span class="input-group-btn">
                                          <button class="btn btn-primary" type="button">Buscar</button>
                                        </span>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="navbar navbar-inverse" role="banner">
                                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                                    <ul class="nav navbar-nav">
                                        <li><a href="{{ route('admin/dashboard') }}">Administrador</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <div class="row">

                    <div class="col-md-2">
                        <div class="sidebar content-box" style="display: block;">

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('admin/dashboard') }}"> Dashboard</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('admin/articulos') }}"> Articulos</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('venta') }}"> Venta</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-10">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('venta') }}">Venta</a></li>
                            </ol>
                        </nav>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="content-box-large">

                                    <div class="panel-heading">
                                        <div class="panel-title"><h2>Ventas</h2></div>

                                    </div>

                                    <div class="panel-body">

                                        @if(Session::has('message'))
                                            <div class="alert alert-primary" role="alert">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif


                                                            @if (count(Cart::getContent()))
                                                                <a href="{{route('cart.checkout')}}"> <span class="btn btn-success mt-4 ml-3"> Ver Carrito [{{count(Cart::getContent())}}]</span></a>
                                                            @endif

                                            <section class="example mt-4">

                                                <div class="table-responsive">

                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Precio</th>
                                                            <th>Stock</th>
                                                            <th>Imagen</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($productos as $bic)
                                                            <tr>
                                                                <td class="v-align-middle">{{$bic->nombre}}</td>
                                                                <td class="v-align-middle">{{$bic->precio}}</td>
                                                                <td class="v-align-middle">{{$bic->stock}}</td>
                                                                <td class="v-align-middle">
                                                                    <img src="../uploads/{{$bic->imagenesarticulos()->first()->nombre}}" width="30" class="img-responsive">
                                                                </td>
                                                                <td class="v-align-middle">

                                                                    <form action="{{route('cart.add')}}" method="post">
                                                                                                    @csrf
                                                                                                    <input type="hidden" name="producto_id" value="{{$bic->id}}">
                                                                                                    <input type="submit" name="btn"  class="btn btn-success" value="Agregar al carrito">
                                                                                                </form>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </section>



                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <hr>



<!-- Bootstrap JS -->
<!-- <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script> -->

<script type="text/javascript">
    function confirmarEliminar()
    {
        var x = confirm("Estas seguro de Eliminar?");
        if (x)
            return true;
        else
            return false;
    }
</script>

</body>
</html>


