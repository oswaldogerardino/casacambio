@extends('master')
@section('title', 'Facturacion')
@section('active-compra', 'active')
@section('active-compra-factura', 'active')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Facturaciones
            <small>Secci&oacute;n para el registro de facturacion</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Facturaci&oacute;n</a></li>
            <li><a href="{{url('/facturascompras')}}">Facturas</a></li>
            <li class="active">Nueva Factura</li>
          </ol>
        </section>

         <div class="pad margin no-print">
          <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Nota:</h4>
            Aqu&iacute; podr&aacute; generar sus facturas, seleccione el socio, los productos y haga click en procesar para generar su compra.
          </div>
        </div>

  <form method="POST" action="{{url('/create_facturacompra')}}" class="form-horizontal">
        <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-dollar"></i> Facturaci&oacute;n de Divisa
            <small class="pull-right">Fecha: {{$fecha}} / Puesto: {{Session::get('puesto_nombre')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>

      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-8 invoice-col">
          <address>
              <label>Nombre del Depositante</label>
              <input type="text" name="nombre_depositante" class="form-control">
               <label>C&eacute;dula depositante</label>
              <input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="cedula_depositante" class="form-control">

             </select>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <label>Tel&eacute;fono del depositante</label>
            <input type="text" name="telefono_depositante" class="form-control">
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <hr>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <label>Cliente</label>
             <input class="form-control" type="text" readonly="readonly" value="{{$nombre_cliente}}">
             <input class="form-control" name="id_cliente" type="hidden" readonly="readonly" value="{{$id_cliente}}">
            <label>Cuenta Bancaria</label>
             <select name="cuenta_cliente" required id="addDato" class="form-control">
              @foreach($cuentabancaria as $cu)
                <option value="{{$cu->id}}">{{$cu->cuenta}} | {{ $cu->tipo_cuenta }}</option>
              @endforeach

             </select>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <label>Comisi&oacute;n</label>
            <input required type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="comision" class="form-control">
            <label>Cantidad de Pesos ($)</label>
            <input required type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="cantidad_pesos" class="form-control">
             <label>Valor de la moneda ($)</label>
            <input required type="text" readonly name="valor_moneda" value="{{ Session::get('valor_moneda') }}" class="form-control">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <label>DATOS GENERALES</label>
          <br>
          <br>
          <b><font size="6pt">N. Factura</b> #{{$codigo_factura}}</font><br>
          <input type="hidden" name="n_factura" value="{{$codigo_factura}}">
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button href="submit"  class="btn btn-success" style="float: right;"><i class="fa fa-credit-card"></i> Procesar</button>
        </div>
      </div>
    </section>
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <input type="hidden" value="{{$codigo_factura}}" name="n_factura">
          <input type="hidden" value="{{Session::get('puesto_id')}}" name="puesto">
  </form>
    <!-- /.content -->

        
  </div>
  <!-- /.content-wrapper -->

  
@endsection
