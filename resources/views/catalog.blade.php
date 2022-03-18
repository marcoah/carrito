@extends('layouts.app')

@section('content')
<div id="app"></div>
<!-- Begin Page Content -->
<div class="container">

    <div class="row justify-content-center">
        @foreach($productos as $producto)
        <div class="col-sm-4">
            <div class="card p-3" style="height: 32rem;">
                <img src="https://i.imgur.com/MGorDUi.png" width="200" class="card-img-top">
                <div class="card-body">
                    <h3 class="text-uppercase">{{$producto->nombre}}</h3>
                    <h4 class="text-uppercase mb-0">{{$producto->marca}}</h4>
                    <h5 class="main-heading mt-0">{{$producto->codigo}}</h5>

                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2"> <span>Precio</span>
                        <div class="precio"> <h4>$ {{$producto->precio}}</h4> </div>
                    </div>
                    <p>{{$producto->descripcion}}</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#modalAddCarrito{{$producto->id}}" data-toggle="tooltip" data-placement="top" title="Agregar"><i class="fa-solid fa-cart-shopping"></i> Add to cart</a>
                </div>
            </div>
        </div>
        <!-- modalEliminar se muestra al hacer click en boton de borrar ------>
        <div class="modal fade" id="modalAddCarrito{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h4>Agregar al carrito</h4>
                    </div>
                    <form action="{{ route('carrito.agregaritem', $producto->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="id">id</label>
                                    <input type="text" class="form-control" id="id" name="id" value="{{$producto->id}}" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="nombre">nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$producto->nombre}}" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cantidad">cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="fas fa-trash-alt"></i> Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--fin modal-->
        @endforeach
    </div>
</div>
@endsection
