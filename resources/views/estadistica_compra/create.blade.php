@extends('master')
@section('title', 'Registrar Socio')
{{-- @section('class_active_home', 'active') --}}
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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

  <form method="POST" class="form-horizontal">
        <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-dollar"></i> Facturaci&oacute;n de compra
            <small class="pull-right">Fecha: {{$fecha}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <label>Socio</label>
             <select id="socio" name="socio" class="form-control">
                <option required value="">Seleccione un Socio</option>
                 @foreach($socio as $s)
                  <option value="{{$s->id}}">{{$s->nombre}}</option>
                 @endforeach
              </select>
            <label>Productos del Socio</label>
             <select required id="addDato" class="form-control"></select>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <label>Seleccione Iva (%)</label>
             <select  id="iva" required name="iva" class="form-control">
              @foreach($iva as $v)
              <option value="{{$v->id}}">{{$v->valor}}</option>
              @endforeach
            </select>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <label>DATOS GENERALES</label>
          <br>
          <br>
          <b>N. Factura</b> #{{$codigo_factura}}<br>
          <b>Orden ID #</b> {{$order_id}}<br>
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
                <th style="width: 40%;">Cod. Producto #</th>
                <th style="width: 20%;">Cantidad</th>
                <th style="width: 20%;">Opciones</th>
              </tr>
              </thead>
              <!--DATOS PARA MOSTRAR-->
              <tbody id="tabla_datos"></tbody>

            </table>
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
          <input type="hidden" value="{{$order_id}}" name="orden_id">
  </form>
    <!-- /.content -->

        
  </div>
  <!-- /.content-wrapper -->

    <script>
        $(document).ready(function(){
          
             $('select#socio').on('change',function(){
                    var i = 0;
                $('select#addDato').on('change',function(){

                   //var socio = $('#addDato').val();
                // $('#addDato').click(function(){
                    var content = $('#addDato').val().split('|');// SPLIRtat ES como explode de  php? correcto igual

                    console.log(content);
                    var html = '<tr>'; // variable que contendra el html
                          html += '<td><input type="text" readonly name="producto" class="form-control numeros" value="'+content[1]+'" disabled></td>';
                          html += '<td><input type="text" readonly name="codproducto" class="form-control" value="'+content[2]+'" disabled></td>';
                          html += '<td><input type="text" required name="cantidad[]" class="form-control numeros"></td>';
                          html += '<td><button title="Eliminar" type="submit" id="borrar'+i+'" class="btn-danger btn-sm"><i class=" glyphicon-minus"></i></button></td>';
                          html += '<input type="hidden" name="id_producto[]" value="'+content[0]+'">';
                      html += '</tr>';
                    $('#tabla_datos').append(html);//funcion p
                    i++;
                });// -> una vez hecho el llamdo para los productos este va hacer el codigo para seleccionar y añadir un 
                //item nuevo a la tabla
            });


             $('select#socio').on('change',function(){
              var socio = $('#socio').val();
              var parametros = {'socio' : socio};

              $.ajax({

                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: 'get_producto',
                  data: parametros,
                  type: 'POST',
                  dataType: 'JSON',
                  beforeSend: function(){
                      $("#cargando").html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>");
                  },
                  success: function (data){
                      //console.log(data); // este console se poner para pruebas luego se tiene que borrar 
                        var html = '<option>Seleccione una opcion</option>';
                        for(var o =0; o < data.length; o++){
                            html += '<option value="'+data[o]['id']+'|'+data[o]['nombre']+'|'+data[o]['codigo']+'">'+data[o]['nombre']+'</option>';
                        }
                        $('#addDato').html(html);
                  },
              });

           });




        });

    </script>
</div>
@endsection
