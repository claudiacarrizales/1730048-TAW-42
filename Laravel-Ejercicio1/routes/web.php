<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('empleados', 'empleadosController');

Route::get('/', 'empleadosController@index');

Route::resource('departamentos', 'departamentosController');

Route::get('/', 'departamentosController@index');

Route::put('empleados/{id}', 'empleadosController@update');

/*Route::get('/productos', function(){
    return ('Listado de productos');
});

Route::post('/productos', function(){
    return ('Almacenando');
});

Route::put('/productos/{id}', function($id){
    return ('Actualizando producto: '.$id);
});


//Parametros
Route::get('saludo/{nombre}/{apodo?}', function($nombre, $apodo=null){
    //Poner la primera letra en mayuscula
    $nombre=ucfirst($nombre);
    //validar si tiene apodop
    if($apodo){
        return "Bienvenido {$nombre}, tu apodo es: {$apodo}";
    }else{
        return "Bienvenido {$nombre}";
    }
});

//Metodos para obtención y eliminacion de datos:
//get (listado u obtener), post(guardar), put(actualizar), delete*/