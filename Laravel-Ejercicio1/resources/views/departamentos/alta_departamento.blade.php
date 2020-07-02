@extends('layout.patron')
@section('titulo', 'Agregar departamento')
@section('contenido')
    <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3> Agregar departamento</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>  
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos de departamento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form action="{{ url('/departamentos')}}" enctype="multipart/form-data" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre"> Nombre<spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="nombre" name="nombre" required="required" class="form-control">
                        </div>
                    </div>
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