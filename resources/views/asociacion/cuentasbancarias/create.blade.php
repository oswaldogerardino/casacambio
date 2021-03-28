@extends('master')
@section('title', 'Cuentas Bancarias')
@section('active-clientes', 'active')
@section('active-clientes-cuentas', 'active')
@section('content')

  <div class="content-wrapper">

      <section class="content-header">
          <h1>
            Registro de Cuentas Bancarias
            <small>Secci&oacute;n para el registro de Cuentas</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('/socios')}}">Clientes</a></li>
            <li class="active">Nueva Cuenta</li>
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
                     <h3 class="box-title">Formulario para el registro de cuentas bancarias</h3>
                  </div>
                   <form  method="POST">
                          <div class="box-body">
                            <div class="form-group">

                              <label class="col-sm-2 control-label">Banco</label>
                              <div class="col-sm-10">
                               <select name="banco" class="form-control">
                                <option value="">Seleccione una opci&oacute;n</option>
                                @foreach($bancos as $b)
                                  <option value="{{$b->id}}">{{$b->nombre}}</option>
                                @endforeach
                               </select>
                              </div>

                              <label class="col-sm-2 control-label">Cliente</label>
                              <div class="col-sm-10">
                               <select name="socio" class="form-control">
                                @if(isset($continuidad))
                                @else
                                <option value="">Seleccione una opci&oacute;n</option>
                                @endif
                                @foreach($socios as $c)
                                  <option value="{{$c->id}}">{{$c->nombre}}</option>
                                @endforeach
                               </select>
                              </div>
                              
                               <label class="col-sm-2 control-label">Tipo de Cuenta</label>
                              <div class="col-sm-10">
                               <select name="tipo_cuenta" class="form-control">
                                <option value="">Seleccione una opci&oacute;n</option>
                                  <option value="AHORRO">AHORRO</option>
                                  <option value="CORRIENTE">CORRIENTE</option>
                               </select>
                              </div>

                              <label class="col-sm-2 control-label">N&uacute;mero de cuenta</label>
                              <div class="col-sm-10">
                                <input type="text" name="n_cuenta" class="form-control" placeholder="N&uacute;mero de cuenta bancaria">
                              </div>
                            </div>
                        </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          </div>
                          <!-- /.box-body -->
                        <div class="box-footer">
                          <a href="{{url('/cuentasbancarias')}}" type="submit" class="btn btn-default"><< Volver</a>
                          <button type="submit" class="btn btn-info"><i class="fa fa-upload"></i> Registrar</button>
                        </div>
                        <!-- /.box-footer -->
                        </form>
                </div>
        </div>
      </div>
      </section>

 

@endsection