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
                               <select name="banco" class="form-control">
                                  <option style="background-color: green; color:white;" value="{{$banco->id}}">{{$banco->nombre}}</option>
                                  <option disabled="disabled"><hr></option>
                                  @foreach($bancos as $b)
                                    <option value="{{$b->id}}">{{$b->nombre}}</option>
                                  @endforeach
                                </select>
                              </div>

                              <label class="col-sm-2 control-label">Cliente</label>
                              <div class="col-sm-10">
                                <select name="socio" class="form-control">
                                  <option style="background-color: green; color:white;" value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                  <option disabled="disabled">&nbsp;</option>
                                  @foreach($clientes as $cl)
                                    <option value="{{$cl->id}}">{{$cl->nombre}}</option>
                                  @endforeach
                                </select>
                              </div>
                              
                              <label class="col-sm-2 control-label">Tipo de Cuenta</label>
                              <div class="col-sm-10">
                                <select name="tipo_cuenta" class="form-control">
                                  <option style="background-color: green; color:white;" value="{{$cliente->id}}">{{$cuentabancaria->tipo_cuenta}}</option>
                                  <option disabled="disabled">&nbsp;</option>
                                    <option value="CORRIENTE">CORRIENTE</option>
                                    <option value="AHORRO">AHORRO</option>
                                </select>
                              </div>


                              <label class="col-sm-2 control-label">N&uacute;mero de cuenta</label>
                              <div class="col-sm-10">
                                <input type="text" name="n_cuenta" value="{{$cuentabancaria->cuenta}}" class="form-control">
                              </div>
                            </div>
                        </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          </div>
                          <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{url('show_cuentasbancarias',$cuentabancaria->id)}}" type="submit" class="btn btn-default"><< Volver</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                        <!-- /.box-footer -->
                        </form>

                </div>
            </div>
          <div class="col-md-3"></div>
      </div>
      </section>

@endsection
