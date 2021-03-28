@extends('master')
@section('title', 'Editar Socio')
{{-- @section('class_active_home', 'active') --}}
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edici&oacute;n de Reses
            <small>Secci&oacute;n para editar reses</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Asociaci&oacute;n</a></li>
            <li><a href="{{url('reses')}}">Reses</a></li>
            <li class="active">Editar Res</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Formulario para editar res</h3>

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
                          <div class="box-body">
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                <input value="{{$res->nombre}}" type="text" name="nombre" class="form-control" placeholder="Datos de la res">
                              </div>
                              <label class="col-sm-2 control-label">Socio</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="socio">
                                  <option value="{{$socios->id}}" style="background-color: green; color: white;">{{$socios->nombre}}</option>
                                  <option disabled>&nbsp;</option>
                                  @foreach($sociotodos as $st)
                                    <option value="{{$st->id}}">{{$st->nombre}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <label class="col-sm-2 control-label">Status</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    @if($res->status == 1)
                                      <option value="1" style="background-color: green; color: white;">Activo</option>
                                    @else
                                      <option value="2" style="background-color: green; color: white;">Inactivo</option>
                                    @endif
                                    <option></option>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                              </div>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="id" value="{{$res->id}}">
                     </div>
                          <!-- /.box-body -->
                    <div class="box-footer">
                      <a href="{{url('show_res',$res->id)}}" type="submit" class="btn btn-default"><< Volver</a>
                      <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
                <!-- /.box -->
              </div>



            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
</div>
@endsection
