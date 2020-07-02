<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departamentos;
//use BD; no existe
use Alert;
class departamentosController extends Controller
{
    //
    public function index(){
        //obtener todos los empleados de latabla de la bd
        $Departamentos=departamentos::all();
        //MOstrar vista de la consulta de empleados
        return view('departamentos.admin_departamento',compact('Departamentos'));
    }

    //Controaldor para crear nuevo empleado
    public function create(){
        //Mostrar el formulario para crear empleado
        return view('departamentos.alta_departamento');
    }

    public function store(Request $request){
        //Retirar los datos del request
        //$datosEmpleados=request()->except('empleado');
        $departamento = new departamentos;
        $departamento->nombre = $request->nombre;
        $departamento->save();
        //instertar en la tabla empleado los datos para la creación de un nuevo registro
        //$id=DB::table('empleados')->insertGetId($datosEmpleado);
        Alert::success('Datos guardados con exito');
        return redirect('departamentos');
    }

    //Controlador para editar 
    public function edit($idD){
        $Departamentos=departamentos::findOrFail($idD);
        //Mostrar la vista
        return view('departamentos.editar_departamento',compact('Departamentos'));
    }

    //Controlador para eliminar empleado
    public function destroy($idD){
        $departamento=departamentos::findOrFail($idD);
        $departamento->delete();
        Alert::success('Datos eliminados de la base de datos');
        return redirect('departamentos');
    }

    public function update(Request $request){
        //BUsca el regustro en la bd si no esta manda error
        $departamento = departamentos::findOrFail($request->idD);
        $departamento->nombre = $request->nombre;
        $departamento->save();

        Alert::success('Datos actualizados con exito');
        return redirect('departamentos');
    }
}

