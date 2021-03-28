@extends('master')
@section('title', 'Ingreso diario')
@section('active-movimientos', 'active')
@section('active-movimientos-ingreso', 'active')
@section('content')

<style type="text/css">
    .cajamonto{
        padding: 1em;
        background-color: green;
        color:white;
        font-size: 15pt;
    }
    .cajamonto2{
        padding: 1em;
        background-color: #FF5733;
        color:white;
        font-size: 15pt;
    }

    .fecha{
        padding: 1em;
        background-color: #f4f4f4;
        color:black;
        font-size: 15pt;
    }


    .comision{
        padding: 1em;
        background-color: #3E53ED;
        color:white;
        font-size: 15pt;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ingreso Diario
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div>

                <form  method="POST" >
                    <div class="form-group ">
                      <label class="control-label col-sm-12" for="date">
                       Filtrar por fecha
                       <span class="asteriskField">
                        *
                       </span>
                      </label>
                      <div class="col-sm-6">
                       <div class="input-group">
                        <div class="input-group-addon">
                         <i class="fa fa-calendar">
                         </i>
                        </div>
                        <input class="form-control" id="date" name="fecha" placeholder="Fecha a consultar" type="text" required/>
                       </div>
                      </div>
                       <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-users">
                                    </i>
                                </div>
                                <select name="puesto" id="puesto" class="form-control" required>
                                    <option value="0">Todos</option>
                                    @foreach ($puestos as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                     </div>
                    <div class="form-group">
                        &nbsp;
                    </div>

                     <div class="form-group">
                      <div class="col-sm-12">
                       <input class="btn btn-primary" type="submit" value="Filtrar" style="width: 100%; font-size: 16pt;">
                      </div>
                     </div>

                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                </form>

                </div>
                <br></br><br></br><br></br><br>
                 <?php 

                    $total_pesos         = 0;
                    $total_transferencia = 0;
                    $total_comisiones    = 0;
                    foreach($consulta_ingreso as $c){

                        $total_pesos+=$c->cantidad_pesos;
                        $total_transferencia+=$c->transferencia;
                        $total_comisiones+=$c->comision;

                    }
                    $pesos_formato     = number_format($total_pesos, 2, ",", ".");
                    $bolivares_formato = number_format($total_transferencia, 2, ",", ".");
                    $comision_formato  = number_format($total_comisiones, 2, ",", ".");
                ?>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label>PUESTO:</label>
                        <div class="fecha">
                            @if($puesto)
                                {{\DB::table('puestos')->where('id', $puesto)->value("nombre")}}
                            @else
                                TODOS
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="col-md-3">
                      <label><small>Ingreso en Pesos</small></label>
                        <div class="cajamonto">
                          <i class="fa fa-download"> </i> {{$pesos_formato}} $
                        </div>
                    </div>
                     <div class="col-md-3">
                      <label><small>Egreso en Bolivares</small></label>
                        <div class="cajamonto2">
                          <i class="fa fa-upload"> </i>  {{$bolivares_formato}} Bs.
                            
                        </div>
                     </div>
                    <div class="col-md-3">
                        <label><small>Comisión total</small></label>
                        <div class="comision">
                            <i class="fa fa-dollar"> </i> {{$comision_formato}}
                        </div>
                    </div>
                     <div class="col-md-3">
                      <label><small>Fecha en Consulta</small></label>
                        <div class="fecha">
                          <i class="fa fa-calendar"> </i> {{$fecha}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped informe">
                        <thead>
                          <tr>
                            <th>Puesto</th>
                            <th>N. Factura</th>
                            <th>Pesos</th>
                            <th>Transferencia</th>
                            <th>Comisión</th>
                            <th>Valor Moneda</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($consulta_ingreso as $c)
                         <?php
                            $puesto = \DB::table('puestos')->where('id', $c->puesto_id)->value("nombre");
                            $transferencia = number_format($c->transferencia, 2, ",", ".");
                            $pesos         = number_format($c->cantidad_pesos, 2, ",", ".");
                            $comision      = number_format($c->comision, 2, ",", ".");
                          ?>
                          <tr>
                            <td>{{$puesto}}</td>
                            <td>{{$c->n_factura}}</td>
                            <td>{{$pesos}}</td>
                            <td>{{$transferencia}}</td>
                            <td>{{$comision}}</td>
                            <td>{{$c->valor_moneda}}</td>

                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
</div>

  <script>
        $(document).ready(function(){
            var date_inicio=$('input[name="fecha"]'); 
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";           

            date_inicio.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })

        })
    </script>

      <script>
        $(document).ready(function(){
            $('.informe').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                select: true,
                buttons: [
                    {extend: 'csv', title: 'Lista Bancos'},
                    {extend: 'excel', title: 'Lista Bancos'},
                    {extend: 'pdf', title: 'Lista Bancos'},

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
