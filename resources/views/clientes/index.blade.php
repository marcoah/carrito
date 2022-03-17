@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
        <a href="{{ route('clientes.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-plus fa-sm text-white-50"></i> Agregar Cliente</a>
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
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Pais</th>
                            <th scope="col">Telefono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nombres}} {{$cliente->apellidos}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->ciudad}}</td>
                            <td>{{$cliente->pais}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td style="width: 140px;">
                                @can('Eliminar clientes')
                                <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalEliminar{{$cliente->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                @endcan
                                <a class="btn btn-primary btn-sm" href="{{ route('clientes.show',$cliente->id) }}" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-success btn-sm" href="{{ route('clientes.edit',$cliente->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>

                        <!-- modalEliminar se muestra al hacer click en boton de borrar ------>
                        <div class="modal fade" id="modalEliminar{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-center">
                                        <h4>Eliminar Registro</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">Está seguro(a) de eliminar el cliente {{$cliente->razon_social}} {{$cliente->nombres}} {{$cliente->apellidos}}/ ID: {{$cliente->id}}?</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                        <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
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
            {{ $clientes->links() }}
        <div>
    </div>
</div>
@endsection
