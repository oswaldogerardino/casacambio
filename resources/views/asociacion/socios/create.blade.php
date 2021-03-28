@extends('master')
@section('title', 'Clientes')
@section('active-clientes', 'active')
@section('active-clientes-socios', 'active')
@section('content')

  <div class="content-wrapper">

      <section class="content-header">
          <h1>
            Registro de Clientes
            <small>Secci&oacute;n para el registro de Clientes</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('socios')}}">Clientes</a></li>
            <li class="active">Nuevo Cliente</li>
          </ol>
        </section>

     

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
          <div class="box box-info">
            
             @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach

            @if (session('status'))
              <div class="alert alert-success">
                {{session('status')}}
              </div>
            @elseif (session('error'))
              <div class="alert alert-error">
                {{session('error')}}
              </div>
            @endif

                  <div class="box-header with-border">
                     <h3 class="box-title">Formulario para el registro de Clientes</h3>
                  </div>
                  @if(isset($continuidad))
                   <form  method="POST" action="{{url('/create_socio')}}">
                  @else
                  <form  method="POST">
                  @endif
                          <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Cliente">
                              </div>
                              <label class="col-sm-2 control-label">Documento</label>
                              <div class="col-sm-10">
                                <input type="text" name="documento" class="form-control" placeholder="Documento del Cliente">
                              </div>
                              <label class="col-sm-2 control-label">Correo (opcional)</label>
                              <div class="col-sm-10">
                                <input type="text" name="correo" class="form-control" placeholder="Correo del Cliente">
                              </div>
                              <label class="col-sm-2 control-label">Tel&eacute;fono (opcional)</label>
                              <div class="col-sm-10">
                                <input type="text" name="telefono" class="form-control" placeholder="Tel&eacute;fono del Cliente">
                              </div>
                            </div>
                        </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            
                          </div>
                          <!-- /.box-body -->
                        <div class="box-footer">
                           <a href="{{url('/socios')}}" type="submit" class="btn btn-default"><< Volver</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> Registrar</button>
                        </div>
                        <!-- /.box-footer -->
                        </form>
                </div>
        </div>
      </div>
      </section>

 

@endsection