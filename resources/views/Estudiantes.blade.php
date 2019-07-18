@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estudiantes</div>
                
                @if(session()->has('msjeliminado'))
                <div class="alert alert-success" role="alert">
                Empresa Eliminado Correctamente.!
                </div>
                @endif
                @if(session()->has('msjcreado'))
                <div class="alert alert-primary" role="alert">
                Empresa Creada Correctamente.!
                </div>
                @endif
                
                
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <form action="{{ route('Controller.AddEstudiantes') }}" method="POST">
    @csrf
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre :</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Digite el nombre del estudiante">
                <strong>Edad:</strong>
                <input type="text" name="Edad" class="form-control" placeholder="Digite la edad del estudiante">
                <strong>Curso Al Que Pertenece:</strong>
                <br><br>
                <select name="Curso">
                @foreach($Cursos as $curso)
                
                <option value="{{$curso->id}}">{{$curso->nombre_curso}}</option>
  
                @endforeach
                </select>
           
            </div>
        </div>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">GUARDAR ESTUDIANTE</button>
        </div>
        <br><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Nombre </th>
                <th> Curso</th>
                <th> Salón</th>
                <th> Acciones </th>

            </tr>
            @foreach($Estudiantes as $dato)
                <tr>
                    <td>{{$dato->names}}</td>
                    <td>{{$dato->nombre_curso}}</td>
                    <td>{{$dato->salon}}</td>
                    <td> <a class="btn btn-primary" href= "{{ route('Controller.EditarEstudiante') }}/{{$dato->id}}"> Editar</a> <a class="btn btn-danger" href= "{{ route('Controller.DeleteEstudiante') }}/{{$dato->id}}"> Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
    </form>
    <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
