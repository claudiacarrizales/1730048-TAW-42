<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;

//Listar empleados
Route::get('empleados',function(){
    $empleados = Empleado::get();
    return $empleados;
});


Route::post('empleados',function(Request $request){
    //Verificamos que los datos enviados se reciban bien para guardar en la bd,utilizamos Request
    //return "Guardando empleados";
    //Retornar solo un parametro
    //return $request->input('estado_civil');
    //Retornar todos los valores del array del form elaborado en postman
    //return $request->all();

    //Validar data de empleado:
    $request->validate([
        'nombres' => 'required|max:50',
        'apellidos' => 'required|max:50',
        'cedula' => 'required|max:50',
        'email' => 'required|max:50|email|unique:empleados',
        'lugar_nacimiento' => 'required|max:50',
        'estado_civil' => 'required|max:50',
        'telefono' => 'required|numeric|max:50'
    ]);

    //Llenar los parametros usando REquest y guardarla en la tabla de la base de datos:
    $empleado = new Empleado;
    $empleado->nombres = $request->input('nombres');
    $empleado->apellidos = $request->input('apellidos');
    $empleado->cedula = $request->input('cedula');
    $empleado->email = $request->input('email');
    $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
    $empleado->sexo = $request->input('sexo');
    $empleado->sexo = $request->input('estado_civil');
    $empleado->sexo = $request->input('telefono');

    $empleado->save();
    return "Usuario creado";
    



});
//Comandos
/*
1.-Crear migracion: php artisan make:migration Nombre
2.-Crear Modelo: php artisan make:model Nombre
3.-Correr servidor: php artisan serve

*/
?>