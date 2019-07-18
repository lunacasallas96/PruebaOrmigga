<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('Estudiantes/', [
    'uses' =>'Controller@Estudiantes',
    'as' => 'Controller.Estudiantes'
]);

Route::get('Cursos/', [
    'uses' =>'Controller@Cursos',
    'as' => 'Controller.Cursos'
]);

Route::get('Materias/', [
    'uses' =>'Controller@Materias',
    'as' => 'Controller.Materias'
]);

Route::post('AddEstudiantes/', [
    'uses' =>'Controller@AddEstudiantes',
    'as' => 'Controller.AddEstudiantes'
]);

Route::post('AddCurso/', [
    'uses' =>'Controller@AddCurso',
    'as' => 'Controller.AddCurso'
]);

Route::post('AddMateria/', [
    'uses' =>'Controller@AddMateria',
    'as' => 'Controller.AddMateria'
]);

Route::post('UpdateEstudiante/', [
    'uses' =>'Controller@UpdateEstudiante',
    'as' => 'Controller.UpdateEstudiante'
]);

Route::post('AddMateriaCurso/', [
    'uses' =>'Controller@AddMateriaCurso',
    'as' => 'Controller.AddMateriaCurso'
]);

Route::post('UpdateCurso/', [
    'uses' =>'Controller@UpdateCurso',
    'as' => 'Controller.UpdateCurso'
]);

Route::get('EditarEstudiante/{id?}', [
    'uses' =>'Controller@EditarEstudiante',
    'as' => 'Controller.EditarEstudiante'
]);

Route::get('MateriasCurso/{id?}', [
    'uses' =>'Controller@MateriasCurso',
    'as' => 'Controller.MateriasCurso'
]);

Route::get('MateriasEstudiantes/{id?}', [
    'uses' =>'Controller@MateriasEstudiantes',
    'as' => 'Controller.MateriasEstudiantes'
]);

Route::get('EditarCurso/{id?}', [
    'uses' =>'Controller@EditarCurso',
    'as' => 'Controller.EditarCurso'
]);

Route::get('DeleteCurso/{id?}', [
    'uses' =>'Controller@DeleteCurso',
    'as' => 'Controller.DeleteCurso'
]);

Route::get('DeleteMateria/{id?}', [
    'uses' =>'Controller@DeleteMateria',
    'as' => 'Controller.DeleteMateria'
]);


Route::get('DeleteMateriaCurso/{id?}', [
    'uses' =>'Controller@DeleteMateriaCurso',
    'as' => 'Controller.DeleteMateriaCurso'
]);

Route::get('DeleteEstudiante/{id?}', [
    'uses' =>'Controller@DeleteEstudiante',
    'as' => 'Controller.DeleteEstudiante'
]);
