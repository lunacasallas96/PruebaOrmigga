@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                @foreach($Curso as $dato)
                    <strong>{{$dato->nombre_curso}}</strong>
                @endforeach                    
                </div>
                @if(session()->has('msjeditado'))
                <div class="alert alert-success" role="alert">
                Empresa Editada Carrectamente.!
                </div>
                @endif
                <div class="card-body">
               
                <strong>Estudiantes Del Curso</strong>
                <br><br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Nombre </th>
                            
                        </tr>
                        @foreach($MateriasEstudiante as $dato)
                            <tr>
                                <td>{{$dato->names}}</td>
                                
                                </td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            
                <a class="btn btn-danger" href="{{ route('Controller.Cursos') }}"> Volver</a>                   
                    
                                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
