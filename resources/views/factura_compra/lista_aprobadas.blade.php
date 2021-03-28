@extends('master')
@section('title', 'Facturas Pendientes')
@section('active-facturas', 'active')
@section('active-facturas-aprobadas', 'active')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Facturas Aprobadas
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ url('/dash') }}">
                    <i class="fa fa-dashboard">
                    </i>
                    Inicio
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Facturas Aprobadas</h3>             
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped informe">
                <thead>
                  <tr>
                    <th>N. Facuta</th>
                    <th>Socio</th>
                    <th>Fecha de Facturaci&oacute;n</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody id="tabla_datos">

                @foreach($factura as $f)
                    <?php
                       $socio = DB::table('socios')->where('id', $f->socio_id)->get();
                       $datos = json_decode($socio,true);?>
                  <tr>
                    <td>{{$f->n_factura}}</td>
                    <td>{{$datos[0]['nombre']}}</td>
                    <td>{{$f->fecha_facturacion}}</td>
                    <td>{{"Aprobada"}}</td>
                    <td>

                      @if(Session::get('factura_aprobada_procesos') == 1)
                        <a href="{{url('/show_facturacompra',$f->id)}}" title="Ver detalles" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="#" title="Ver pago" class="btn btn-success" data-toggle="modal" data-target="#imagen{{$f->id}}"><i class="fa fa-image"></i></a>
                      @endif

                        <!-- Modal -->
                        <div class="modal fade" id="imagen{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Capture de la factura <strong># {{$f->n_factura}}</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                @if($f->imagen == "")
                                    {{"ESTA FACTURA NO TIENE IMAGEN CARGADA"}}
                                @else
                                    <img style="width:100%;" src="{{url('/storage',$f->imagen)}}">
                                @endif
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>           
                        <script type="text/javascript">
                            $('#myModal').on('shown.bs.modal', function () {
                              $('#myInput').trigger('focus')
                            })
                        </script>

                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          

    </section>
</div>
    <script>
        $(document).ready(function(){
            $('.informe').DataTable({
                 dom: '<"html5buttons"B>lTfgitp',
                 select: true,
                 buttons: [
                     {extend: 'csv', title: 'Lista Reses'},
                     {extend: 'excel', title: 'Lista Reses'},
                     {extend: 'pdf', title: 'Lista Reses'},

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
