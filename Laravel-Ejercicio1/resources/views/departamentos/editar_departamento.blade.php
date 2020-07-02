@extends('layout.patron')
@section('titulo', 'Editar Departamento')
@section('contenido')
    <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3> Editar Departamento</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>  
            <div class="x_panel">
                <div class="x_title">Departamento
                    <h2>Datos de departamento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form action="{{ url('departamentos/'.$Departamentos->idD) }}" enctype="multipart/form-data" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <input type="text" id="idD" name="idD" value="{{$Departamentos->idD}}" required="required" class="form-control" hidden>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre"> Nombre(s) <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="nombre" name="nombre" value="{{$Departamentos->nombre}}" required="required" class="form-control">
                        </div>
                    </div>

                    <!--<div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lugar_nacimiento"> Lugar de nacimiento <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required="required" class="form-control">
                        </div>
                    </div>-->
                    <div class="In_solid"></div>
                    <div class="Item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="{{url('departamentos')}}" class="btn btn-primary" type="button">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection