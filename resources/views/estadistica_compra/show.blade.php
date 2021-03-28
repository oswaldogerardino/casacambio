@extends('master')
@section('title', 'Factura')
{{-- @section('class_active_home', 'active') --}}
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Registro de Compras
              <small>Secci&oacute;n para el registro de Compras</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li><a href="#">Compras</a></li>
              <li><a href="{{url('facturascompras')}}">Facturas</a></li>
              <li class="active">Nueva Factura</li>
            </ol>
          </section>

           <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
              <h4><i class="fa fa-info"></i> Nota:</h4>
              Aqu&iacute; podr&aacute; generar sus facturas, seleccione el socio, los productos y haga click en procesar para generar su compra.
            </div>
          </div>

          <!-- Main content -->
      <section class="invoice">

        <!--BOTONES-->
        <div class="row">
          <div class="col-xs-6">
            <label>Cambio de estatus</label>
            <a href="{{url('status_cancelar',$factura['id'])}}" class="btn btn-danger">Cancelar</a>
            <a href="{{url('status_aceptar',$factura['id'])}}" class="btn btn-success">Aceptar</a>
          </div>
          <div class="col-xs-6">
            <a target="_blank" href="{{url('imprimir',$factura['id'])}}" class="btn btn-info"><i class="fa fa-print"></i> Imprimir</a>
          </div>
        </div>
        <!--FIN BOTONES-->
        <ht>
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-dollar"></i> Facturaci&oacute;n de compra
              <small class="pull-right">Fecha: {{$factura->fecha_facturacion}}</small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <address>
              <label>Nombre del Socio</label>
              <div>{{$socio[0]['nombre']}}</div>

            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <address>
              <label>Valor del IVA</label>
              <div>{{$iva[0]['valor']."%"}}</div>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <label>DATOS GENERALES</label>
            <br>
            <b>N. Factura</b> #{{$factura['n_factura']}}<br>
            <b>Orden ID #</b>{{$factura['n_orden']}}<br>
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
                  <th style="width: 40%;">Precio sin IVA</th>
                  <th style="width: 20%;">Cantidad</th>
                </tr>
                </thead>
                <!--DATOS PARA MOSTRAR-->
                <tbody id="tabla_datos">
                  
                  <?php 
                  $calculo_subtotal = 0;
                  foreach ($detalles as $key => $d) {

                    //PRODUCTOS
                    $consulta_productos = \DB::table('productos')->where('id','=',$d->id_producto)->get(); 
                    $productos = json_decode($consulta_productos,true);

                    //DETALLES
                    $consulta_productos = \DB::table('productos')->where('id','=',$d->id_producto)->get();

                    //CALCULO DE MONTOS

                      //SUBTOTAL
                      $calculo_subtotal += $productos[0]['precio'];


                      

                  ?>
                  <tr>
                     <td>{{$productos[0]['nombre']}}</td>
                     <td>{{$productos[0]['precio']}}</td>
                     <td>{{$d->cantidad}}</td>
                  </tr>
                  <?php } 

                      //IVA
                  $monto_iva   = ($calculo_subtotal*$iva[0]['valor']/100);
                  $calculo_iva = $monto_iva + $calculo_subtotal;

                  ?>

                </tbody>

              </table>
            </div>
            <!-- /.col -->
          </div>
        <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Gracias por su compra!!</p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           No olvides revisar tu factura. En caso de cualquier inconveniente consulta con nuestro personal autorizado.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><label>MONTO A PAGAR</label></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$ {{$calculo_subtotal}}</td>
              </tr>
              <tr>
                <th>IVA(%)</th>
                <td>{{$iva[0]['valor']."%"}}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$ {{$calculo_iva}}</td>
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

  </div>

</div>
@endsection
