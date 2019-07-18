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
                <form action="{{ route('Controller.AddMateriaCurso') }}" method="POST">
                @csrf

                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    </div>
                    <strong>Materias :</strong>
                    @foreach($Curso as $dato)
                            <input type="hidden" name="Id_Curso" value="{{$dato->id}}">
                    @endforeach                    
                    <select name="Id_Materia">
                        @foreach($Materias as $dato)
                        
                        <option value="{{$dato->id}}">{{$dato->nombre_materia}}</option>
        
                        @endforeach
                    </select>
                    </div>
                    <br><br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">AGREGAR MATERIA</button>
                    </div>
                </form>
                <strong>Materias Del Curso</strong>
                <br><br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Nombre </th>
                            <th> Creditos </th>
                            <th> Acciones </th>

                        </tr>
                        @foreach($MateriasCurso as $dato)
                            <tr>
                                <td>{{$dato->nombre_materia}}</td>
                                <td>{{$dato->creditos}}</td>
                                <td> <a class="btn btn-danger" href= "{{ route('Controller.DeleteMateriaCurso') }}/{{$dato->id}}"> Eliminar</a>
                                
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
