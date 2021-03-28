@extends('master')
@section('title', 'Clientes')
@section('active-clientes', 'active')
@section('active-clientes-socios', 'active')
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
            <li><a href="{{url('socios')}}">Clientes</a></li>
            <li class="active">Editar Ciente</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Formulario para editar cliente</h3>

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
                            <input type="hidden" name="id" value="{{$socios->id}}">
                            <div class="box-body">
                            <div class="form-group">
                                  <label class="col-sm-2 control-label">Nombre</label>
                                  <div class="col-sm-10">
                                    <input value="{{$socios->nombre}}" type="text" name="nombre" class="form-control" placeholder="Nombre del Cliente">
                                  </div>
                                  <label class="col-sm-2 control-label">Documento</label>
                                  <div class="col-sm-10">
                                    <input value="{{$socios->documento}}" type="text" name="documento" class="form-control" placeholder="Documento del Cliente">
                                  </div>
                                  <label class="col-sm-2 control-label">Correo (opcional)</label>
                                  <div class="col-sm-10">
                                    <input type="text" value="{{$socios->correo}}" name="correo" class="form-control" placeholder="Correo del Cliente">
                                  </div>
                                  <label class="col-sm-2 control-label">Tel&eacute;fono (opcional)</label>
                                  <div class="col-sm-10">
                                    <input type="text" value="{{$socios->telefono}}" name="telefono" class="form-control" placeholder="Telefono del Cliente">
                                  </div>
                            </div>
                            
                         </div>
                                  <!-- /.box-body -->
                          <div class="box-footer">
                            <a href="{{url('show_socio',$socios->id)}}" type="submit" class="btn btn-default"><< Volver</a>
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
    <script>
        $(document).ready(function(){
            $('.informe').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                select: true,
                buttons: [
                    {extend: 'csv', title: 'Lista negra de guardias'},
                    {extend: 'excel', title: 'Lista negra de guardias'},
                    {extend: 'pdf', title: 'Lista negra de guardias'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                        }
                    }
                ],
            });
        });

    </script>
@endsection
