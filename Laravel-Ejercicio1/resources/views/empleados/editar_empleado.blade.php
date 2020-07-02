@extends('layout.patron')
@section('titulo', 'Editar empleado')
@section('contenido')
    <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3> Editar empleado</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>  
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos de empleados</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form action="{{ url('empleados/'.$empleado->id) }}" enctype="multipart/form-data" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <input type="text" id="id" name="id" value="{{$empleado->id}}" required="required" class="form-control" hidden>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre"> Nombre(s) <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="nombre" name="nombre" value="{{$empleado->nombres}}" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellidos"> Apellido(s) <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="apellidos" name="apellidos" value="{{$empleado->apellidos}}" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="cedula"> Cédula <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="cedula" name="cedula" value="{{$empleado->cedula}}" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email"> Correo electrónico <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="email" name="email" value="{{$empleado->email}}" required="required" class="form-control">
                        </div>
                    </div>
                    <!--<div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lugar_nacimiento"> Lugar de nacimiento <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required="required" class="form-control">
                        </div>
                    </div>-->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Sexo</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="sexo" class="btn-group" data-toggle="buttons">
                                    @if ($empleado->sexo =="masculino")
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="masculino" name="sexo" id="masculino" class="" checked> &nbsp; Masculino &nbsp;
                                        </label>
                                    @else
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="masculino" name="sexo" id="masculino" class=""> &nbsp; Masculino &nbsp;
                                        </label>
                                    @endif
                                    @if ($empleado->sexo =="femenino")
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="femenino" name="sexo" id="femenino" class="" checked> &nbsp; Femenino &nbsp;
                                        </label>
                                    @else
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="femenino" name="sexo" id="femenino" class=""> &nbsp; Femenino &nbsp;
                                        </label>
                                    @endif

                                    @if ($empleado->sexo =="no definido")
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="no definido" name="sexo" id="no-definido" class="" checked> &nbsp; No definido &nbsp;
                                        </label>
                                    @else
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="no definido" name="sexo" id="no definido" class=""> &nbsp; No definido &nbsp;
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Estado civil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="estado_civil" class="btn-group" data-toggle="buttons">
                                    @if ($empleado->estado_civil =="soltero")
                                        <label class="btn btn-secondary active" data-toggle-class="btn-primary" for="estado_civil" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="soltero" name="estado_civil" id="soltero" class="" checked> &nbsp; Soltero &nbsp;
                                        </label>
                                    @else
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="estado_civil" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="soltero" name="estado_civil" id="soltero" class=""> &nbsp; Soltero &nbsp;
                                        </label>
                                    @endif
                                    @if ($empleado->estado_civil =="casado")
                                        <label class="btn btn-secondary active" data-toggle-class="btn-primary" for="estado_civil" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="casado" name="estado_civil" id="soltero" class="" checked> &nbsp; Casado &nbsp;
                                        </label>
                                    @else
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="estado_civil" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="casado" name="estado_civil" id="casado" class=""> &nbsp; Casado &nbsp;
                                        </label>
                                    @endif
                                        <!--<label class="btn btn-primary" data-toggle-class="btn-primary" for="estado_civil" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="0" name="estado_civil" id="no-definido"  class=""> No definido
                                        </label>-->
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="telefono"> Teléfono <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="telefono" name="telefono" value="{{$empleado->telefono}}" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="Departamento">Departamento <spam class="required">*</spam>
                        </label>
						<div class="col-md-6 col-sm-6">
                        <select class="form-control col-md-6 col-sm-6" type="text" name="departamento" id="departamento" required>
							@foreach ($Departamentos as $departamento) 
							    <option value="{{$departamento->idD}}">{{$departamento->nombre}}</option>
                            @endforeach
                        </select>
                        </div>
					</div>
                    <div class="In_solid"></div>
                    <div class="Item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="{{url('empleados')}}" class="btn btn-primary" type="button">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection