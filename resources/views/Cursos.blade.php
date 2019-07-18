@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cursos</div>
                
                @if(session()->has('msjeliminado'))
                <div class="alert alert-success" role="alert">
                Empresa Eliminado Correctamente.!
                </div>
                @endif
                @if(session()->has('msjcreado'))
                <div class="alert alert-primary" role="alert">
                Curso Creado Correctamente.!
                </div>
                @endif
                
                
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <form action="{{ route('Controller.AddCurso') }}" method="POST">
    @csrf
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Curso:</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Digite el nombre del curso">
                <strong>Salón Curso:</strong>
                <input type="text" name="Salon" class="form-control" placeholder="Digite el salón del curso">
              </div>
        </div>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">GUARDAR CURSO</button>
        </div>
        <br><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Nombre Curso </th>
                <th> Salón </th>
                <th> Acciones </th>

            </tr>
            @foreach($Cursos as $dato)
                <tr>
                    <td>{{$dato->nombre_curso}}</td>
                    <td>{{$dato->salon}}</td>
                    <td> <a class="btn btn-primary" href= "{{ route('Controller.EditarCurso') }}/{{$dato->id}}"> Editar</a> <a class="btn btn-danger" href= "{{ route('Controller.DeleteCurso') }}/{{$dato->id}}"> Eliminar</a> <a class="btn btn-success" href= "{{ route('Controller.MateriasEstudiantes') }}/{{$dato->id}}"> Estudiantes Del Curso</a> <a class="btn btn-success" href= "{{ route('Controller.MateriasCurso') }}/{{$dato->id}}"> Materias Del Curso</a>
                    
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
