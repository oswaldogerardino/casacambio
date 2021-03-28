@extends('master')
@section('title', 'Datos de Factura')
@section('content')

  <div class="content-wrapper">

      <section class="content-header">
          <h1>
            Registro de Bancos
            <small>Secci&oacute;n para el registro de Bancos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">CasaCambio</a></li>
            <li><a href="{{url('/bancos')}}">Bancos</a></li>
            <li class="active">Nuevo Banco</li>
          </ol>
        </section>

     

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
          <div class="box box-info">
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
                              </div>
                              <!-- /.FIN DATOS BANCARIOS -->
                            </form>
                         </div>
                      </div>
                  </div>
               </section>
          </div>
      </section>

@endsection