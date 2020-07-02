<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\departamentos;
//use BD; no existe
use Alert;
class empleadosController extends Controller{
    //
    public function index(){
        //obtener todos los empleados de latabla de la bd
        $empleados= Empleado::join('departamentos', 'departamentos.idD', '=', 'empleados.Fk_Departamento')->get();
        //MOstrar vista de la consulta de empleados
        return view('empleados.admin_empleado',compact('empleados'));
    }

    //Controaldor para crear nuevo empleado
    public function create(){
        $Departamentos=departamentos::all();
        //Mostrar el formulario para crear empleado
        return view('empleados.alta_empleado',compact('Departamentos'));
    }

    public function store(Request $request){
        //Retirar los datos del request
        //$datosEmpleados=request()->except('empleado');
        $empleado = new Empleado;
        $empleado->nombres = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->cedula = $request->cedula;
        $empleado->email = $request->email;
        $empleado->sexo = $request->sexo;
        $empleado->estado_civil = $request->estado_civil;
        $empleado->telefono = $request->telefono;
        $empleado->Fk_Departamento = $request->departamento;
        $empleado->save();
        //instertar en la tabla empleado los datos para la creación de un nuevo registro
        //$id=DB::table('empleados')->insertGetId($datosEmpleado);
        Alert::success('Datos guardados con exito');
        return redirect('empleados');
    }

    //Controlador para editar 
    public function edit($id){
        $empleado=Empleado::findOrFail($id);
        $Departamentos=departamentos::all();
        //Mostrar la vista
        return view('empleados.editar_empleado',compact('empleado','Departamentos'));
    }

    //Controlador para eliminar empleado
    public function destroy($id){
        $empleado=Empleado::findOrFail($id);
        $empleado->delete();
        Alert::success('Datos eliminados de la base de datos');
        return redirect('empleados');
    }
    public function update(Request $request){
        //BUsca el regustro en la bd si no esta manda error
        $empleado = Empleado::findOrFail($request->id);
        $empleado->nombres = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->cedula = $request->cedula;
        $empleado->email = $request->email;
        $empleado->sexo = $request->sexo;
        $empleado->estado_civil = $request->estado_civil;
        $empleado->telefono = $request->telefono;
        $empleado->Fk_Departamento = $request->departamento;
        $empleado->save();

        Alert::success('Datos actualizados con exito');
        return redirect('empleados');
    }
}
