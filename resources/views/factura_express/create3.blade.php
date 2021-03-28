<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inter Giros. | Datos del Cliente</title>
         <meta name="description" content="casa de cambio de moneda intergiros">
            <!-- Favicons -->
        <link rel="icon" href="{{ url('/img/favicon-bar-chart.ico') }}" type="image/x-icon" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ url('/css/Template/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ url('/css/Template/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/AdminLTE.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/_all-skins.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/iCheck/flat/blue.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/datepicker/datepicker3.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/dataTables/datatables.min.css') }}">
        <script src="{{ url('/js/Template/fontawesome.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/jQuery/jquery-ui.min.js') }}"></script>

        <!--LIBRERIA HIGHCHARTS-->
        <script src="{{ url('/Highcharts-6.0.2/code/highcharts.js')}}"></script>
        <script src="{{ url('/Highcharts-6.0.2/code/modules/exporting.js')}}"></script>
        <script src="{{ url('/Highcharts-6.0.2/code/modules/series-label.js')}}"></script>

        {{-- LOGIN --}}
        <link rel="stylesheet" href="{{ url('/css/Login/blue.css') }}">
        <style type="text/css">
          
          body{
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#6db3f2+0,3690f0+56,bdd6ed+100,1e69de+100 */
            background: #6db3f2; /* Old browsers */
            background: -moz-linear-gradient(-45deg, #6db3f2 0%, #3690f0 56%, #bdd6ed 100%, #1e69de 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #6db3f2 0%,#3690f0 56%,#bdd6ed 100%,#1e69de 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #6db3f2 0%,#3690f0 56%,#bdd6ed 100%,#1e69de 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6db3f2', endColorstr='#1e69de',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
          }
          .caja{

            width: 70%;
            margin: 3% auto 3% auto;
            -webkit-box-shadow: 10px 10px 22px 3px rgba(0,0,0,0.52);
            -moz-box-shadow: 10px 10px 22px 3px rgba(0,0,0,0.52);
            box-shadow: 10px 10px 22px 3px rgba(0,0,0,0.52);

          }

        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">

        <div class="caja box">

            <section class="content-header">
                <h1>
                  Datos para la Facturación
                  <small>El cliente no existe, complete los datos.</small>
                </h1>
            </section>
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info">
                      <!--DATOS PERSONALES-->
                        <div class="box-header with-border">
                           <h3 class="box-title"><strong>1) </strong>Datos personales del cliente</h3>
                        </div>
                              <?php echo Form::open(array('action' => 'FacturaexpressController@cedula_consulta')) ?>
                                <div class="box-body">
                                  <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre</label>
                                    <div class="col-sm-9">
                                      <input required type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre del Cliente">
                                    </div>
                                    <label class="col-sm-3 control-label">Documento</label>
                                    <div class="col-sm-9">
                                      @if(isset($documento))
                                      <input required type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="documento" class="form-control" placeholder="Documento del Cliente" value="{{$documento}}">
                                      @else
                                      <input required type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="documento" class="form-control"  placeholder="Documento del Cliente">
                                      @endif
                                      
                                    </div>
                                    <label class="col-sm-3 control-label">Correo (opcional)</label>
                                    <div class="col-sm-9">
                                      <input type="email" name="correo" value="{{old('correo')}}" class="form-control" placeholder="Correo del Cliente">
                                    </div>
                                    <label class="col-sm-3 control-label">Tel&eacute;fono (opcional)</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Tel&eacute;fono del Cliente">
                                    </div>
                                  </div>
                              </div>
                            </div>
                                <!-- /.box-body -->
                             
                              <!-- /.FIN DATOS PERSONALES -->


                          <!--DATOS BANCARIOS-->
                            <div class="box-header with-border">
                               <h3 class="box-title"><strong>2) </strong>Datos Bancarios</h3>
                            </div>

                                  <div class="box-body">
                                    <div class="form-group">

                                      <label class="col-sm-3 control-label">Banco</label>
                                      <div class="col-sm-9">
                                       <select required name="banco" class="form-control">
                                        <option value="">Seleccione una opci&oacute;n</option>
                                        @foreach($bancos as $b)
                                          <option value="{{$b->id}}">{{$b->nombre}}</option>
                                        @endforeach
                                       </select>
                                      </div>                                      
                                      <label class="col-sm-3 control-label">Tipo de Cuenta</label>
                                      <div class="col-sm-9">
                                       <select required name="tipo_cuenta" class="form-control">
                                        <option value="">Seleccione una opci&oacute;n</option>
                                          <option value="AHORRO">AHORRO</option>
                                          <option value="CORRIENTE">CORRIENTE</option>
                                       </select>
                                      </div>

                                      <label class="col-sm-3 control-label">N&uacute;mero de cuenta</label>
                                      <div class="col-sm-9">
                                        <input onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" required type="text" name="n_cuenta" value="{{old('n_cuenta')}}"  class="form-control" placeholder="N&uacute;mero de cuenta bancaria">
                                      </div>
                                    </div>
                                  </div>
                                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                  <input type="hidden" name="continuidad" value="1">
                                  
                                </div>
                                <!-- /.box-body -->
                              <div class="box-footer">
                                  <button type="submit" class="btn btn-success pull-right"> Siguiente >></button>
                                  <a class="btn btn-info" href="{{ url('/') }}"><< Volver al Sistema</a></li>
                
                               
                              </div>
                              <!-- /.FIN DATOS BANCARIOS -->
                            </form>
                      </div>
                </div>
            </div>
          </section>
        </div>
        <script>
                $.widget.bridge('uibutton', $.ui.button);
              </script>

              <script src="{{ url('/js/Template/bootstrap.js') }}"></script>

              <script src="{{ url('/js/Template/plugins/raphael/raphael-min.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/jqueryNumber/jqueryNumber.js') }}"></script>
              <script src="{{ url('/js/Template/global.js') }}"></script>

              <script src="{{ url('/js/Template/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/knob/jquery.knob.js') }}"></script>

              <script src="{{ url('/js/Template/plugins/moment/moment.min.js') }}"></script>

              <script src="{{ url('/js/Template/plugins/daterangepicker/daterangepicker.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/fastclick/fastclick.js') }}"></script>

              <script src="{{ url('/js/Template/app.js') }}"></script>
              <script src="{{ url('/js/Template/dashboard.js') }}"></script>
              <script src="{{ url('/js/Template/demo.js') }}"></script>
              <script src="{{ url('/js/Template/plugins/dataTables/datatables.min.js') }}"></script>


              <script src="{{ url('/js/Login/icheck.js') }}"></script>
              <script>
                  $(function () {
                      $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                      });
                  });

               </script>

    </body>
</html>
 