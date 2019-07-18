@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Estudiante</div>
                @if(session()->has('msjeditado'))
                <div class="alert alert-success" role="alert">
                Empresa Editada Carrectamente.!
                </div>
                @endif
                <div class="card-body">
                <form action="{{ route('Controller.UpdateEstudiante') }}" method="POST">
                @csrf

                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                @foreach($Estudiante as $dato)
                    <div class="form-group">
                        <input type="hidden" name="Id" value="{{$dato->id}}">
                        <strong>Editar Nombre Del Estudiante:</strong>
                        <input type="text" name="Nombre" class="form-control" placeholder="{{$dato->names}}">
                        <strong>Editar Edad Del Estudiante:</strong>
                        <input type="text" name="Edad" class="form-control" placeholder="{{$dato->edad}}">
                        <strong>Curso Actual: {{$dato->nombre_curso}}</strong>
                        <br><br>
                        <strong>Salón Actual: {{$dato->salon}}</strong>
                        <br><br>
                @endforeach
                        <strong>Editar Curso Del Estudiante:</strong>
                        <select name="Curso">
                        @foreach($Cursos as $curso)
                        
                        <option value="{{$curso->id}}">{{$curso->nombre_curso}}</option>
        
                        @endforeach
                        </select>
                        
                    
                    </div>
                </div>
                <br><br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">EDITAR ESTUDIANTE</button>
                </div>
                </form>
                <a class="btn btn-danger" href="{{ route('Controller.Estudiantes') }}"> Volver</a>                   
                    
                                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
