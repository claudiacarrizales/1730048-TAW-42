<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use DB;

class empleadosController extends Controller
{
    //metodo principal
    public function index(){
        //obtener todos los empleados de la tabla de la bd
        $empleados=Empleados::all();
        //mostrar vista de la consulta empleados
        return view('empleados.admin_empleados', compact('empleados'));
    }

    //controlador para crear nuevo empleado
    public function create(){
        //mostrar el formulario para crear el empleado
        return view('empleados.alta_empleado', compact('empleados'));
    }

    //cntrolador para almacenar los empleados 
    public function store(Request $request){
        //retirar los datos del request
        $datosEmpleado=request()->except('empleado');

        //insertar en la tabla empleado los datos para la creacion de un nuevo registro
        $id=DB::table('empleados')->insertGetId($datosEmpleado);
        alert::succes('Datos guardado con exito');
        return redirect('empleados');
    }

    //controlador para editar empleados
    public function edit($id){
        //editar empleados y mandar a la vista de informacion
        $empleados=Empleado::findOrFail($id);

        //mostrar la vista
        return view('empleados.editar_empleado', compact('empleado'));
    }


    //controlador para eliminar empleado
    public function destroy($id){
        Alert::success('Datos eliminados de la base de datos');
        return redirect('empleados');
    }
}
