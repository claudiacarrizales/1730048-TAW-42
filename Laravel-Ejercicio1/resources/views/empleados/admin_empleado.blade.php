@extends('layout.patron')
@section('titulo', 'Administración de empleados')
@section('contenido')
    <!--Código HTML puro para mostrar el listado de empeados-->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Administración de empleados</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Listado de empleados</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id ="datatable-keytable" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Cedula</th>
                                            <th>Email</th>
                                            <th>Sexo</th>
                                            <th>Estado civil</th>
                                            <th>Telefono</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($empleados as $empleado)
                                            <tr>
                                            
                                                <td>{{$empleado->nombres}}</td>
                                                <td>{{$empleado->apellidos}}</td>
                                                <td>{{$empleado->cedula}}</td>
                                                <td>{{$empleado->email}}</td>
                                                <td>{{$empleado->sexo}}</td>
                                                <td>{{$empleado->estado_civil}}</td>
                                                <td>{{$empleado->telefono}}</td>
                                                <!--Agregar columna para editar y eliminar registro-->
                                                <td>
                                                    <div style="display: flex;">
                                                        <a href="{{url('empleados/'.$empleado->id.'/edit')}}" class="btn btn-secondary" method="POST"><i class="fas fa-edit"></i></a>
                                                        <form action="{{url('empleados/'.$empleado->id)}}" method="POST">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn_danger"><i class="fas fa-trash"></i></button>

                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection