@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Curso</div>
                <div class="card-body">
                <form action="{{ route('Controller.UpdateCurso') }}" method="POST">
                @csrf

                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                @foreach($Curso as $dato)
                    <div class="form-group">
                        <input type="hidden" name="Id" value="{{$dato->id}}">
                        <strong>Editar Nombre Del Curso:</strong>
                        <input type="text" name="Nombre" class="form-control" placeholder="{{$dato->nombre_curso}}" required=true>
                        <strong>Salón Del Curso:</strong>
                        <input type="text" name="Salon" class="form-control" placeholder="{{$dato->salon}}" required=true>
                @endforeach                    
                    </div>
                </div>
                <br><br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">EDITAR CURSO</button>
                </div>
                </form>
                <a class="btn btn-danger" href="{{ route('Controller.Cursos') }}"> Volver</a>                   
                    
                                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
