@extends('master')
@section('title', 'Clientes')
@section('active-clientes', 'active')
@section('active-clientes-socios', 'active')
@section('content')

  <div class="content-wrapper">

      <section class="content-header">
          <h1>
            Datos del cliente
            <small>Secci&oacute;n para visualizar los datos del cliente</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('socios')}}">Clientes</a></li>
            <li class="active">Ver Cliente</li>
          </ol>
        </section>

      @foreach($errors->all() as $error)
      <p class="alert alert-danger">{{$error}}</p>
    @endforeach

    @if (session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif

      <section class="content">
        <div class="row">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-12 box-body">
                <div class="box box-widget widget-user-2">
                   <form  method="POST">
                          <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                <input readonly="readonly" value="{{$socios->nombre}}" type="text" name="nombre" class="form-control" placeholder="Nombre del Socio">
                              </div>
                              <label class="col-sm-2 control-label">Documento</label>
                              <div class="col-sm-10">
                                <input readonly="readonly" value="{{$socios->documento}}" type="text" name="documento" class="form-control" placeholder="Correo del Socio">
                              </div>
                              <label class="col-sm-2 control-label">Correo (opcional)</label>
                              <div class="col-sm-10">
                                @if($socios->correo == "")
                                 <input readonly="readonly" type="text" name="correo" class="form-control" placeholder="SIN CORREO">
                                @else
                                 <input readonly="readonly" type="text" value="{{$socios->correo}}" name="correo" class="form-control" placeholder="Correo del Cliente">
                                @endif
                              </div>
                              <label class="col-sm-2 control-label">Tel&eacute;fono (opcional)</label>
                              <div class="col-sm-10">
                               @if($socios->telefono == "")
                                <input readonly="readonly" type="text" value="SIN TELEFONO" name="telefono" class="form-control" placeholder="Telefono del Cliente">
                              @else
                                <input readonly="readonly" type="text" value="{{$socios->telefono}}" name="telefono" class="form-control" placeholder="Telefono del Cliente">
                              @endif
                              </div>
                            </div>
                         </div>
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                             </div>
                                    <!-- /.box-body -->
                            <div class="box-footer col-sm-12 text-center">
                              <a href="{{url('/socios')}}"  class="btn btn-default"><< Volver</a>
                             @if(Session::get('cliente_editar') == 1)
                              <a href="{{url('edit_socio',$socios->id)}}"  class="btn btn-success"><i class="fa fa-edit"></i> Editar</a>
                             @endif

                             @if(Session::get('cliente_borrar') == 1)
                              <a href="{{url('/destroy_socio',$socios->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
                             @endif

                            </div>
                            <!-- /.box-footer -->
                        </form>
                 
                </div>
            </div>
          <div class="col-md-3"></div>
      </div>
      </section>

@endsection
