@extends('layouts.app')

@section('content')
    <div id="app"></div>
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h1 mb-0 text-gray-800">Agregar productos</h1>
            <div class="btn-group" role="group" aria-label="botones">
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('productos') }}"><i class="fas fa-arrow-alt-circle-left fa-sm text-white-50"></i> Volver</a>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">
                <form method="post" action="{{ route('productos.store') }}">
                    @csrf

                    <!-- Fila Datos Basicos -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">Datos</div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nombre">nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="codigo">codigo</label>
                                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="marca">marca</label>
                                            <input type="text" class="form-control" id="marca" name="marca">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="modelo">modelo</label>
                                            <input type="text" class="form-control" id="modelo" name="modelo">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="cantidad">cantidad</label>
                                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="precio">precio</label>
                                            <input type="text" class="form-control" id="precio" name="precio" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="descripcion">descripcion</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows=4></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fila Botones -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                <a class="btn btn-danger btn-lg" href="{{ url('productos') }}" role="button">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
