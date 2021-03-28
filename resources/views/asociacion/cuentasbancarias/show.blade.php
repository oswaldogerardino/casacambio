@extends('master')
@section('title', 'Cuentas Bancarias')
@section('active-clientes', 'active')
@section('active-clientes-cuentas', 'active')
@section('content')

  <div class="content-wrapper">

      <section class="content-header">
          <h1>
            Datos de la cuenta bancaria
            <small>Secci&oacute;n para visualizar los datos la cuenta bancaria</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('/socios')}}">Clientes</a></li>
            <li class="active">Ver cuenta bancaria</li>
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

                              <label class="col-sm-2 control-label">Banco</label>
                              <div class="col-sm-10">
                               <input  class="form-control" type="text" readonly="readonly" value="{{$banco->nombre}}">
                              </div>

                              <label class="col-sm-2 control-label">Cliente</label>
                              <div class="col-sm-10">
                                <input  class="form-control" type="text" readonly="readonly" value="{{$cliente->nombre}}">
                              </div>
                              
                              
                              <label class="col-sm-2 control-label">Tipo de Cuenta</label>
                              <div class="col-sm-10">
                                <input readonly="readonly" type="text" value="{{$cuentabancaria->tipo_cuenta}}" class="form-control">
                              </div>
                              

                              <label class="col-sm-2 control-label">N&uacute;mero de cuenta</label>
                              <div class="col-sm-10">
                                <input readonly="readonly" type="text" value="{{$cuentabancaria->cuenta}}" class="form-control">
                              </div>
                            </div>
                        </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          </div>
                          <!-- /.box-body -->
                        <div class="box-footer col-sm-12 text-center">
                              <a href="{{url('/cuentasbancarias')}}"  class="btn btn-default"><< Volver</a>
                              @if(Session::get('cuenta_editar') == 1)
                                <a href="{{url('/edit_cuentasbancarias',$cuentabancaria->id)}}"  class="btn btn-success"><i class="fa fa-edit"></i> Editar</a>
                              @endif

                              @if(Session::get('cuenta_borrar') == 1)
                                <a href="{{url('destroy_cuentasbancarias',$cuentabancaria->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
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
