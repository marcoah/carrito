@extends('layouts.app')

@section('content')
<div id="app"></div>
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Carrito</h1>

        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('carrito.vaciar', Auth::user()->username)}}" class="btn btn-danger"> Vaciar Carrito</a>
            <a href="{{ route('catalogo') }}" class="btn btn-primary"> Catalogo</a>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            @if(session()->get('message'))
                <div class="alert alert-info">
                {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 mb-4">

            @if(isset($items))
                @php
                $i=1;
                $subtotal = 0;
                $impuesto_total = 0;

                @endphp
                <div class="table-responsive-sm">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:3%">#</th>
                                <th>Nombre</th>
                                <th style="width:5%">ID</th>
                                <th style="width:3%">Cantidad</th>
                                <th class="text-center" style="width:12%">Precio</th>
                                <th class="text-center" style="width:12%">Subtotal</th>
                                <th class="text-center" style="width:12%">IVA</th>
                                <th class="text-center" style="width:12%">Total</th>
                                <th style="width:5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            @php
                                $impuesto = $item->getPriceSumWithConditions() - $item->getPriceSum()
                            @endphp
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->id }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-right">{{ number_format($item->price, 2, ',', '.') }}</td>
                                <td class="text-right">{{ number_format($item->getPriceSum(), 2, ',', '.') }}</td>
                                <td class="text-right">{{ number_format($impuesto, 2, ',', '.') }}</td>
                                <td class="text-right">{{ number_format($item->getPriceSumWithConditions(), 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalEliminar{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>

                            <!-- modalEliminar se muestra al hacer click en boton de borrar ------>
                            <div class="modal fade" id="modalEliminar{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Eliminar item</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Está seguro(a) de eliminar el producto {{$item->name}} / ID: {{$item->id}}?</p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('carrito.removeitem', $item->id)}}" method="post">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="fas fa-trash-alt"></i> Borrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--fin modal-->

                            @php
                            $subtotal += $item->getPriceSum();
                            $impuesto_total += $impuesto;
                            $i +=1;

                            @endphp
                            @endforeach
                        </tbody>
                    </table>

                    @php
                        $userID = Auth::user()->username;

                        $cartCount = $items->count();
                        $cartTotalQuantity = Cart::session($userID)->getTotalQuantity();
                        $cartSubTotal = Cart::session($userID)->getSubTotal(); // for a specific user's cart
                        $cartTotal = Cart::session($userID)->getTotal(); // for a specific user's cart
                    @endphp



                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td colspan="6" rowspan="4">
                                    <p>cartTotalQuantity: {{ $cartTotalQuantity }} </p>
                                    <p>cartCount: {{ $cartCount }} </p>
                                </td>
                                <td style="width:20%">Subtotal</td>
                                <td class="text-right" style="width:12%">{{ number_format($subtotal, 2, ',', '.') }}</td>
                                <td style="width:5%"></td>
                            </tr>
                            <tr>
                                <td>Descuentos</td>
                                <td class="text-right">0,00</td>
                            </tr>
                            <tr>
                                <td>IVA</td>
                                <td class="text-right">{{ number_format($impuesto_total, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-right">{{ number_format($cartTotal, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <p> Carrito esta vacio. ir al <a href="{{ route('catalogo') }}">catalogo</a></p>
            @endif
        </div>
    </div>

</div>
@endsection
