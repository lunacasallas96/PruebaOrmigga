<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Estudiantes(){

        $Estudiantes = DB::select("EXEC SP_SHOW_STUDENTS");
        $Cursos = DB::select("EXEC SP_SHOW_CURSOS");

        return view('Estudiantes',
        [
            'Estudiantes'=>$Estudiantes,
            'Cursos'=>$Cursos

        ]);
    }
    public function Cursos(){

        $Cursos = DB::select("EXEC SP_SHOW_CURSOS");

        return view('Cursos',
        [
            'Cursos'=>$Cursos
        ]);
    }
    public function Materias(){

        $Materias = DB::select("EXEC SP_SHOW_MATERIAS");

        return view('Materias',
        [
            'Materias'=>$Materias
        ]);
    }

    public function MateriasCurso($id){

        $Curso = DB::select("EXEC SP_EDITAR_CURSO ?",[$id]);
        $Materias = DB::select("EXEC SP_SHOW_MATERIAS");
        $MateriasCurso= DB::select("EXEC SP_SHOW_MATERIASCURSO ?",[$id]);
        return view('MateriasCurso',
        [
            'Curso'=>$Curso,
            'Materias'=>$Materias,
            'MateriasCurso'=>$MateriasCurso
        ]);
    }
    public function MateriasEstudiantes($id){
        $Curso = DB::select("EXEC SP_EDITAR_CURSO ?",[$id]);
        $MateriasEstudiante= DB::select("EXEC SP_SHOW_MATERIAESTUDIANTE ?",[$id]);
        return view('MateriasEstudiante',
        [
            'Curso'=>$Curso,
            'MateriasEstudiante'=>$MateriasEstudiante
        ]);
    }
    public function AddMateriaCurso(Request $request){

        DB::insert("EXEC SP_ADD_MATERIACURSO ?,?",[$request['Id_Curso'], $request['Id_Materia']]);
        return back()->with('msj','msjcreado'); 
     }
    
    public function AddEstudiantes(Request $request){

        DB::insert("EXEC SP_ADD_ESTUDIANTE ?,?,?",[$request['Nombre'], $request['Edad'],$request['Curso']]);
        return back()->with('msj','msjcreado'); 
     }
    public function AddCurso(Request $request){

        DB::insert("EXEC SP_ADD_CURSO ?,?",[$request['Nombre'], $request['Salon']]);
        return back()->with('msj','msjcreado'); 
    }
  
    public function AddMateria(Request $request){

        DB::insert("EXEC SP_ADD_MATERIA ?,?",[$request['Nombre'], $request['Creditos']]);
        return back()->with('msj','msjcreado'); 
    }
    
    
    public function DeleteMateria(Request $request,$id){

        DB::delete("EXEC SP_DELETE_MATERIA ?",[$id]);
        return back()->with('msj','msjeliminado'); 
    }

    public function DeleteCurso(Request $request,$id){

        DB::delete("EXEC SP_DELETE_CURSO ?",[$id]);
        return back()->with('msj','msjeliminado'); 
    }
    
    public function DeleteEstudiante(Request $request,$id){

        DB::delete("EXEC SP_DELETE_ESTUDIANTE ?",[$id]);
        return back()->with('msj','msjeliminado'); 
    }
    
    public function DeleteMateriaCurso(Request $request,$id){

        DB::delete("EXEC SP_DELETE_MATERIACURSO ?",[$id]);
        return back()->with('msj','msjeliminado'); 
    }

    public function EditarEstudiante($id){

        
        $Cursos = DB::select("EXEC SP_SHOW_CURSOS");
        $Estudiante = DB::select("EXEC SP_EDITAR_ESTUDIANTE ?",[$id]);

        return view('EditarEstudiante',
        [
            'Estudiante'=>$Estudiante,
            'Cursos'=>$Cursos
        ]);
      }

      public function EditarCurso($id){

        
        $Curso = DB::select("EXEC SP_EDITAR_CURSO ?",[$id]);

        return view('EditarCurso',
        [
            'Curso'=>$Curso
        ]);
      }

    public function UpdateCurso(Request $request){

        DB::update("EXEC SP_UPDATE_CURSO ?,?,?",[$request['Id'], $request['Nombre'],$request['Salon']]);
        return back()->with('msj','msjeliminado'); 
    }
    public function UpdateEstudiante(Request $request){

        DB::update("EXEC SP_UPDATE_ESTUDIANTE ?,?,?,?",[$request['Id'], $request['Nombre'],$request['Edad'], $request['Curso']]);
        return back()->with('msj','msjeliminado'); 
    }
    
    
}
