@extends('layouts.app')

@section('content')
    <div id="app"></div>
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Productos</h1>
            <a href="{{ route('productos.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-plus fa-sm text-white-50"></i> Agregar producto</a>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12 mb-4">
                <div class="table-responsive-sm">
                    <table class="table table-striped" style="width=100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->codigo}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>{{$producto->precio}}</td>
                                <td style="width: 140px;">
                                    @can('Eliminar clientes')
                                    <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalEliminar{{$producto->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                    @endcan
                                    <a class="btn btn-primary btn-sm" href="{{ route('productos.show',$producto->id) }}" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-success btn-sm" href="{{ route('productos.edit',$producto->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>

                            <!-- modalEliminar se muestra al hacer click en boton de borrar ------>
                            <div class="modal fade" id="modalEliminar{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Eliminar Registro</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Está seguro(a) de eliminar el producto {{$producto->nombre}} / ID: {{$producto->id}}?</p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('productos.destroy', $producto->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="fas fa-trash-alt"></i> Borrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--fin modal-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $productos->links() }}
            <div>
        </div>
    </div>
@endsection
