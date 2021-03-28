@extends('master')
@section('title', 'Bancos')
@section('active-bancos', 'active')
@section('active-asociacion-bancos', 'active')
@section('content')

  <div class="content-wrapper">

      <section class="content-header">
          <h1>
            Datos del Banco
            <small>Secci&oacute;n para visualizar los datos del banco</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('/bancos')}}">Bancos</a></li>
            <li class="active">Ver banco</li>
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
                                <input readonly="readonly" value="{{$bancos->nombre}}" type="text" name="nombre" class="form-control" placeholder="Nombre del Banco">
                              </div>
                            </div>
                         </div>
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                             </div>
                                    <!-- /.box-body -->
                            <div class="box-footer col-sm-12 text-center">
                              <a href="{{url('/bancos')}}"  class="btn btn-default"><< Volver</a>
                              @if(Session::get('banco_editar') == 1)
                                <a href="{{url('/edit_banco',$bancos->id)}}"  class="btn btn-success"><i class="fa fa-edit"></i> Editar</a>
                              @endif

                              @if(Session::get('banco_borrar') == 1)
                                <a href="{{url('/destroy_banco',$bancos->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
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
