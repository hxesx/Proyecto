@extends('layouts.app')
@section('content')
    <?php $total = 0; ?>
    <div class="container">
        <h1>Ticket de compra</h1>
        <div class="row">
            <div class="col-sm-12 bg-light">
                @if (count(Cart::getContent()))
                    <table class="table table-striped">
                        <thead>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>TOTAL</th>
                        </thead>
                        <tbody>
                        @foreach (Cart::getContent() as $item)
                            <tr>
                                <?php $cont = 0; ?>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <?php $cont += $item->price * $item->quantity;
                                $total +=$cont;
                                ?>
                                <td>{{$cont}}</td>

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
                @else
                    <p>Carrito vacio</p>
                @endif

            </div>

        </div>
    </div>
@endsection

