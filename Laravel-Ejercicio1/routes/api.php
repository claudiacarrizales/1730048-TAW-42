<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleados;

//Listar Empleados
Route::get('empleados', function(){
    $empleados = Empleados::get();
    return $empleados;
});

//Crear empleados
Route::post('empleados', function(Request $request){
    //Verificamos que los datos enviados se reciban bien  para guardar en la bd, utilizando Request
    //Retirnar un solo parametro
    //return $requiset->input('estado_civil');
    //retornar todos los valores del array del form elaborado en postam

    //return $request->all();
    //Validar data de empleados:
    $request->validate([
        'nombres' => 'required|max=50',
        'apellidos' => 'required|max=50',
        'cedula' => 'required|max=20',
        'email' => 'required|max=50|email|unique:empleados',
        'lugar_nacimiento' => 'required|max=50',
        'estado_civil' => 'required|max=50',
        'telefono' => 'required|numeric'
        
    ]);

    //Llenar los parametros usando el Request
    $empleado = new Empleado;
    $empleado->nombres=$request->input('nombres');
    $empleado->apellidos=$request->input('apellidos');
    $empleado->cedula=$request->input('cedula');
    $empleado->email=$request->input('email');
    $empleado->lugar_nacimiento=$request->input('lugar_nacimiento');
    $empleado->sexo=$request->input('sexo');
    $empleado->estado_civil=$request->input('estado_civil');
    $empleado->telefono=$request->input('telefono');
    $empleado->save();

    return 'Usuario creado';

});

//Actualizar
//Ruta para actualizar empleados
Route::put('empleados/{id}', function(Request $request, $id){

    //Validación de los campos
    $request->validate([
        'nombres' => 'required|max=50',
        'apellidos' => 'required|max=50',
        'cedula' => 'required|max=20',
        'email' => 'required|max=50|email|unique:empleados,email,'.$id,
        'lugar_nacimiento' => 'required|max=50',
        'estado_civil' => 'required|max=50',
        'telefono' => 'required|numeric'
        
    ]);

    //Se busca el empleado en la bd, sino genera un error
    $empleado = Empleado::findOrFail($id);

    $empleado->nombres=$request->input('nombres');
    $empleado->apellidos=$request->input('apellidos');
    $empleado->cedula=$request->input('cedula');
    $empleado->email=$request->input('email');
    $empleado->lugar_nacimiento=$request->input('lugar_nacimiento');
    $empleado->sexo=$request->input('sexo');
    $empleado->estado_civil=$request->input('estado_civil');
    $empleado->telefono=$request->input('telefono');
    $empleado->save();
    return 'Empleado actualizado';
});

Route::delete('empleados/{id}', function($id){
    $empleado=Empleado::findOrFail($id);
    $empleado->delete();
    return 'Empleado eliminado';
});