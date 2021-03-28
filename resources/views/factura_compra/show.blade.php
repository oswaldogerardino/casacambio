@extends('master')
@section('title', 'Factura: '.$factura['n_factura'])
@section('active-compra', 'active')
@section('active-compra-factura', 'active')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Vista de la factura
              <small>Secci&oacute;n para detalles de la factura</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="#">factura</a></li>
              <li><a href="{{url('facturascompras')}}" class="active">Facturas</a></li>
            </ol>
          </section>

          <!-- Main content -->
      <section class="invoice">

        <!--BOTONES-->
        <div class="row">
          <div class="col-xs-6">
            
          </div>
          <div class="col-xs-6">
            <a target="_blank" href="{{url('imprimir',$factura['id'])}}" class="btn btn-info"><i class="fa fa-print"></i> Imprimir</a>
          </div>
        </div>
        <!--FIN BOTONES-->
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-dollar"></i> Facturaci&oacute;n de Inter Giros
              <small class="pull-right">Fecha: {{$factura->fecha_facturacion}}</small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <address>
              <label>Cliente</label>
              <p>{{$socio[0]['nombre']}}</p>

              <label>Documento del Cliente</label>
              <p>{{$socio[0]['documento']}}</p>

              <label>Cuenta Bancaria</label>
              <p>{{$cuentabancaria}} | {{$tipo_cuenta}} | {{$banco}}</p>

            </address>
          </div>
          <!-- /.col -->
            <div class="col-sm-4 invoice-col">
             <address>
              <label>Depositante: </label>
              <p>{{$factura->nombre_depositante}}</p>

              <label>Documento del Depositante</label>
              <p>{{$factura->cedula_depositante}}</p>

              <label>Telefono del Depositante</label>
              <p>{{$factura->telefono_depositante}}</p>

            </address>
            </div>
          <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <label>DATOS GENERALES</label>
              <br>
              <b>N. Factura</b> #{{$factura['n_factura']}}<br>
              <b>Fecha de Facturacion: </b>{{$factura->fecha_facturacion}}
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th style="width: 40%;">Producto</th>
                  <th style="width: 40%;">Monto</th>
                </tr>
                </thead>
                <!--DATOS PARA MOSTRAR-->
                <tbody id="tabla_datos">
                     <tr>
                        <td>Bolivares</td>
                        <td>{{$factura->transferencia}}</td>
                     </tr>


                </tbody>

              </table>
            </div>
            <!-- /.col -->
          </div>
        <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Gracias por su preferencia!!</p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Gracias por hacer su transacción en Inter Giros "Rapidéz y Eficiencia"
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><label>MONTOS</label></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Pesos:</th>
                <td>$ {{$factura->cantidad_pesos}}</td>
              </tr>
              <tr>
                <th>Comision ($)</th>
                <td>{{$factura->comision}}</td>
              </tr>
              <tr>
                <th>Valor Moneda</th>
                <td>{{$factura->valor_moneda}}</td>
              </tr>
              <tr>
                <th>Transferencia:</th>
                <?php 
                  $transferencia = number_format($factura->transferencia, 2, ",", ".");
                ?>
                <td>{{$transferencia}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
