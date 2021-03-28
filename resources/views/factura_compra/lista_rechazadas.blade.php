@extends('master')
@section('title', 'Facturas Pendientes')
@section('active-facturas', 'active')
@section('active-facturas-rechazadas', 'active')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Facturas Rechazadas
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
              <h3 class="box-title">Listado de Facturas Rechazadas</h3>             
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
                    <th>Comentario</th>
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
                    @if($f->comentario == "")
                        <td>{{"SIN COMENTARIO"}}</td>
                    @else
                        <td>{{$f->comentario}}</td>
                    @endif
                    <td>
                        @if(Session::get('factura_rechazada_procesos') == 1)
                            <a href="{{url('/show_facturacompra',$f->id)}}" title="Ver detalles" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        @endif
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
