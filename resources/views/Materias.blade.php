@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Materias</div>
                
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <form action="{{ route('Controller.AddMateria') }}" method="POST">
    @csrf
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Materia:</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Digite el nombre de la materia">
                <strong>Creditos:</strong>
                <input type="text" name="Creditos" class="form-control" placeholder="Digite los creditos de la materia">
              </div>
        </div>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">GUARDAR MATERIA</button>
        </div>
        <br><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Nombre Materia </th>
                <th> Creditos </th>
                <th> Acciones </th>

            </tr>
            @foreach($Materias as $dato)
                <tr>
                    <td>{{$dato->nombre_materia}}</td>
                    <td>{{$dato->creditos}}</td>
                    <td> <a class="btn btn-danger"  href= "{{ route('Controller.DeleteMateria') }}/{{$dato->id}}"> Eliminar</a>
                    
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
    <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
