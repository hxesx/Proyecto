@extends('layouts.app')
@section('content')
<?php $total = 0; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 bg-light">
                @if (count(Cart::getContent()))
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>CANTIDAD</th>
                        <th>TOTAL</th>
                        </thead>
                        <tbody>
                        @foreach (Cart::getContent() as $item)
                            <tr>
                                <?php $cont = 0; ?>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <?php $cont += $item->price * $item->quantity;
                                $total +=$cont;
                                ?>
                                <td>{{$cont}}</td>
                                <td>
                                    <form action="{{route('cart.removeitem')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-link btn-sm text-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <thead>
                        <th>TOTAL A PAGAR: {{$total}}</th>
                        </thead>
                    </table>
                    <a href="{{ route('venta') }}" class="btn btn-success mt-4 ml-3">  Regresar</a>
                    <a href="{{ route('venta') }}" class="btn btn-success mt-4 ml-3">  Realizar Compra</a>
                @else
                    <p>Carrito vacio</p>
                @endif

            </div>

        </div>
    </div>
@endsection
