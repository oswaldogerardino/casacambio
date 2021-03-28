@extends('master')
@section('title', 'Bancos')
@section('active-bancos', 'active')
@section('active-asociacion-bancos', 'active')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edici&oacute;n de Clientes
            <small>Secci&oacute;n para editar de Clientes</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('/bancos')}}">Bancos</a></li>
            <li class="active">Editar Bancos</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Formulario para editar banco</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                          <!-- Horizontal Form -->
                   @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                     @endif
                        <!-- /.box-header -->
                        <!-- form start -->
                            <form  method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" value="{{$bancos->id}}">
                            <div class="box-body">
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                <input value="{{$bancos->nombre}}" type="text" name="nombre" class="form-control" placeholder="Nombre del Banco">
                              </div>
                            </div>
                            
                         </div>
                                  <!-- /.box-body -->
                          <div class="box-footer">
                            <a href="{{url('/show_banco',$bancos->id)}}" type="submit" class="btn btn-default"><< Volver</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
                          </div>
                  <!-- /.box-footer -->
                      </form>
                </div>
                <!-- /.box -->
              </div>
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.content -->
@endsection
