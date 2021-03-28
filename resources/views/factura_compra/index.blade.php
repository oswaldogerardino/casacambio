@extends('master')
@section('title', 'Facturas Pendientes')
@section('active-facturas', 'active')
@section('active-facturas-pendientes', 'active')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Facturas Pendientes
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
              <h3 class="box-title">Listado de Facturas Pendientes</h3>             
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
                  <tr>
                    <td>{{$f->n_factura}}</td>
                    <td>{{$f->socio->nombre}}</td>
                    <td>{{$f->fecha_facturacion}}</td>
                    <td>{{"Pendiente"}}</td>
                    <td>

                        @if(Session::get('factura_pendiente_procesos') == 1)
                            <a href="{{url('/show_facturacompra',$f->id)}}" title="Ver detalles" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{url('/ver_aprobar',$f->id)}}" title="Aprobar Factura" class="btn btn-success"><i class="fa fa-check"></i></a>
                            <a title="Imprimir Factura" target="_blank" href="{{url('imprimir',$f->id)}}" class="btn btn-info"><i class="fa fa-print"></i></a>
                            <a href="{{url('/ver_rechazar',$f->id)}}" title="Rechazar Factura" class="btn btn-danger"><i class="fa fa-remove"></i></a>
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
