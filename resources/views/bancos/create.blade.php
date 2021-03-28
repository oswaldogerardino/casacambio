@extends('master')
@section('title', 'Bancos')
@section('active-bancos', 'active')
@section('active-asociacion-bancos', 'active')
@section('content')

  <div class="content-wrapper">

      <section class="content-header">
          <h1>
            Registro de Bancos
            <small>Secci&oacute;n para el registro de Bancos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('/bancos')}}">Bancos</a></li>
            <li class="active">Nuevo Banco</li>
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
                     <h3 class="box-title">Formulario para el registro de Bancos</h3>
                  </div>
                   <form  method="POST">
                          <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Banco">
                              </div>
                            </div>
                        </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          </div>
                          <!-- /.box-body -->
                        <div class="box-footer">
                          <a href="{{url('/bancos')}}" type="submit" class="btn btn-default"><< Volver</a>
                          <button type="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> Registrar</button>
                        </div>
                        <!-- /.box-footer -->
                        </form>
                </div>
        </div>
      </div>
      </section>

 

@endsection