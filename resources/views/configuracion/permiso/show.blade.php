@extends('master')
@section('title', $permisos->rol->nombre )
@section('active-configuracion', 'active')
@section('active-configuracion-permisos', 'active')
@section('content')

<style type="text/css">
	
	.titulo{

		color: #2ec936;
		font-style: italic;
	}

</style>
	<div class="content-wrapper">

	    <section class="content-header">
	        <h1>
	            Permisos
	        </h1>
	        <ol class="breadcrumb">
	            <li class="">
	                <a href="{{ url('/dash') }}">
	                    <i class="fa fa-dashboard">
	                    </i>
	                    Inicio
	                </a>
	            </li>
	            <li class="">
	                <a href="{{ url('/configuracion/roles') }}">
	                    Permisos
	                </a>
	            </li>
	            <li class="active">
	                <a href="#">
	                    Rol: {{ $permisos->rol->nombre }}
	                </a>
	            </li>
	        </ol>
	    </section>

	    @foreach($errors->all() as $error)
			<p class="alert alert-danger">{{$error}}</p>
		@endforeach

		@if (session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
		@endif

		@if (session('error'))
			<div class="alert alert-danger">
				{{session('error')}}
			</div>
		@endif

	    <section class="content">
	    	<div class="row">
	    		<div class="col-xs-12">
					<div class="box box-info">
			            <div class="box-header with-border">
			              	<h3 class="box-title">Permisos para {{$permisos->rol->nombre}}</h3>
			            </div>
			            <form class="form-horizontal" method="POST">
			            	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			              	<div class="box-body">

			              		<!--PERMISOS MODULO FACTURAR-->
				                <div class="form-group">
				                	<label for="facturar" class="col-sm-4 control-label titulo">FACTURAR</label>
					                <div class="col-sm-8">
					                   	<div class="form-check">
						                   	@if($permisos->facturar == 1)
											  <input name="facturar" checked class="form-check-input" type="checkbox" value="1" id="facturar">
											@else
											  <input name="facturar" class="form-check-input" type="checkbox" value="1" id="facturar">
											@endif  
											 <label class="form-check-label" for="Realizar Facturaciones"> 
											    Realizar Facturaciones
											 </label>
										</div>
					                </div>
				                </div>

				                <hr>
				                
				                <!--PERMISOS MODULO CUENTAS BANCARIAS-->
				                <div class="form-group">
				                	<label for="cuentasbancarias" class="col-sm-4 control-label titulo">CUENTAS BANCARIAS</label>
					                <div class="col-sm-8">
					                   	<div class="form-check">
					                   	@if($permisos->cuenta_crear == 1)
										  <input class="form-check-input" name="crear_cuenta" checked value="1" type="checkbox" id="crear_cuenta">
										@else
										  <input class="form-check-input" name="crear_cuenta" value="1" type="checkbox" id="crear_cuenta">
										@endif
										  <label class="form-check-label" for="crear_cuenta"> 
										    &nbsp;Crear Cuentas
										  </label>
										  &nbsp;
										@if($permisos->cuenta_editar == 1)
										  <input class="form-check-input" checked name="editar_cuenta" type="checkbox" value="1" id="editar_cuenta">
										@else
										  <input class="form-check-input" name="editar_cuenta" type="checkbox" value="1" id="editar_cuenta">
										@endif
										  <label class="form-check-label" for="editar_cuenta"> 
										    &nbsp;Editar Cuentas
										  </label>
										  &nbsp;
										@if($permisos->cuenta_borrar == 1)
										  <input class="form-check-input" checked name="borrar_cuenta" type="checkbox" value="1" id="borrar_cuenta">
										@else
										  <input class="form-check-input" name="borrar_cuenta" type="checkbox" value="1" id="borrar_cuenta">
										@endif  
										  <label class="form-check-label" for="borrar_cuenta"> 
										    &nbsp;Borrar Cuentas
										  </label>
										</div>
					                </div>
				                </div>

				                <hr>

				                <!--PERMISOS MODULO CONTROL CLIENTES-->
				                <div class="form-group">
				                	<label for="controlclientes" class="col-sm-4 control-label titulo">CONTROL DE CLIENTES</label>
					                <div class="col-sm-8">
					                   	<div class="form-check">
					                   	@if($permisos->cliente_crear == 1)
										  <input class="form-check-input" checked name="crear_clientes" value="1" type="checkbox" id="crearclientes">
										@else
										  <input class="form-check-input" name="crear_clientes" value="1" type="checkbox" id="crearclientes">
										@endif 
										  <label class="form-check-label" for="crearclientes"> 
										    &nbsp;Crear Clientes
										  </label>
										  &nbsp;
										@if($permisos->cliente_editar == 1)
										  <input class="form-check-input" checked name="editar_clientes" value="1" type="checkbox" id="editarclientes">
										@else
										  <input class="form-check-input" name="editar_clientes" value="1" type="checkbox" id="editarclientes">
										@endif

										  <label class="form-check-label" for="editarclientes"> 
										    &nbsp;Editar Clientes
										  </label>
										  &nbsp;
										@if($permisos->cliente_borrar == 1)
										  <input class="form-check-input" checked name="borrar_clientes" value="1" type="checkbox" id="borrarclientes">
										@else
										  <input class="form-check-input" name="borrar_clientes" value="1" type="checkbox" value="" id="borrarclientes">
										@endif
										  <label class="form-check-label" for="borrarclientes"> 
										    &nbsp;Borrar Clientes
										  </label>

										</div>
					                </div>
				                </div>

				                 <hr>

				                <!--PERMISOS MODULO CONTROL BANCOS-->
				                <div class="form-group">
				                	<label for="controlbancos" class="col-sm-4 control-label titulo">CONTROL DE BANCOS</label>
					                <div class="col-sm-8">
					                   	<div class="form-check">
					                   	@if($permisos->banco_crear == 1)
										  <input class="form-check-input" checked name="crear_bancos" value="1" type="checkbox" id="crearbancos">
										@else
										  <input class="form-check-input" name="crear_bancos" value="1" type="checkbox" id="crearbancos">
										@endif 
										  <label class="form-check-label" for="crearbancos"> 
										    &nbsp;Crear Bancos
										  </label>
										  &nbsp;
										@if($permisos->banco_editar == 1)
										  <input class="form-check-input" checked name="editar_bancos" value="1" type="checkbox" id="editarbancos">
										@else
										  <input class="form-check-input" name="editar_bancos" value="1" type="checkbox" value="" id="editarbancos">
										@endif
										  <label class="form-check-label" for="editarbancos"> 
										    &nbsp;Editar Bancos
										  </label>
										  &nbsp;
										@if($permisos->banco_borrar == 1)
										  <input class="form-check-input" checked name="borrar_bancos" value="1" type="checkbox" value="" id="borrarbancos">
										@else
 										  <input class="form-check-input" name="borrar_bancos" value="1" type="checkbox" value="" id="borrarbancos">
										@endif
										  <label class="form-check-label" for="borrarbancos"> 
										    &nbsp;Borrar Bancos
										  </label>

										</div>
					                </div>
				                </div>

				                <hr>

				                <!--PERMISOS MODULO CONTROL DE FACTURAS-->
				                <div class="form-group">
				                	<label for="controlfacturas" class="col-sm-4 control-label titulo">CONTROL DE FACTURAS</label>
					                <div class="col-sm-8">
					                   	<div class="form-check">
					                   	@if($permisos->factura_pendiente_ver == 1)
										  <input class="form-check-input" checked name="ver_fac_pendientes" value="1" type="checkbox" id="facturapendiente">
										@else
										  <input class="form-check-input" name="ver_fac_pendientes" value="1" type="checkbox" id="facturapendiente">
										@endif
										  <label class="form-check-label" for="facturapendiente"> 
										    &nbsp;Ver Facturas Pendientes
										  </label>
										  &nbsp;
										@if($permisos->factura_pendiente_procesos == 1)
										  <input class="form-check-input" checked name="opciones_fac_pendientes" value="1"  type="checkbox" id="opcionespendientes">
										@else
										  <input class="form-check-input" name="opciones_fac_pendientes" value="1"  type="checkbox" id="opcionespendientes">
										@endif
										  <label class="form-check-label" for="opcionespendientes"> 
										    &nbsp;Opciones Facturas Pendientes
										  </label>
										</div>

										<div class="form-check">
										@if($permisos->factura_aprobada_ver == 1)
										  <input class="form-check-input" checked name="ver_fac_aprobadas" value="1"  type="checkbox" id="facturaaprobada">
										@else
										  <input class="form-check-input" name="ver_fac_aprobadas" value="1"  type="checkbox" id="facturaaprobada">
										@endif
										  <label class="form-check-label" for="facturaaprobada"> 
										    &nbsp;Ver Facturas Aprobadas
										  </label>
										  &nbsp;
										@if($permisos->factura_aprobada_procesos == 1)
										  <input class="form-check-input" checked name="opciones_fac_aprobadas" value="1" type="checkbox" id="opcionesaprobadas">
										@else
										  <input class="form-check-input" name="opciones_fac_aprobadas" value="1" type="checkbox" id="opcionesaprobadas">
										@endif
										  <label class="form-check-label" for="opcionesaprobadas"> 
										    &nbsp;Opciones Facturas Aprobadas
										  </label>
										</div>

										<div class="form-check">
										@if($permisos->factura_rechazada_ver == 1)
										  <input class="form-check-input" checked name="ver_fac_rechazadas" value="1"  type="checkbox" id="facturasrechazadas">
										@else
										  <input class="form-check-input" name="ver_fac_rechazadas" value="1"  type="checkbox" id="facturasrechazadas">
										@endif
										  <label class="form-check-label" for="facturasrechazadas"> 
										    &nbsp;Ver Facturas Rechazadas
										  </label>
										  &nbsp;
  										@if($permisos->factura_rechazada_procesos == 1)
										  <input class="form-check-input" checked name="opciones_fac_rechazadas" value="1"  type="checkbox" id="opcionesrechazadas">
										@else
										  <input class="form-check-input" name="opciones_fac_rechazadas" value="1"  type="checkbox" id="opcionesrechazadas">
										@endif
										  <label class="form-check-label" for="opcionesrechazadas"> 
										    &nbsp;Opciones Facturas Rechazadas
										  </label>
										</div>
					                </div>
				                </div>

				                 <hr>

				                <!--PERMISOS MODULO CONTROL MOVIMIENTOS-->
				                <div class="form-group">
				                	<label for="controlmovimientos" class="col-sm-4 control-label titulo">CONTROL DE MOVIMIENTOS</label>
					                <div class="col-sm-8">
					                   	<div class="form-check">
					                    @if($permisos->movimientos_diario == 1)
										  <input class="form-check-input" checked name="ver_mov_diario" value="1"  type="checkbox" id="verdiario">
										@else
										  <input class="form-check-input" name="ver_mov_diario" value="1"  type="checkbox" id="verdiario">
										@endif
										  <label class="form-check-label" for="verdiario"> 
										    &nbsp;Ver Movimiento Diario
										  </label>
										  &nbsp;
										@if($permisos->movimientos_estadistica == 1)
										  <input class="form-check-input" checked name="ver_estadisticas" value="1"  type="checkbox" id="verestadisticas">
										@else
										  <input class="form-check-input" name="ver_estadisticas" value="1"  type="checkbox" id="verestadisticas">
										@endif
										  <label class="form-check-label" for="verestadisticas"> 
										    &nbsp;Ver Estadisticas
										  </label>
										</div>
					                </div>
				                </div>

			              	</div>
			              <div class="box-footer">
			                <a href="{{ url('/configuracion/permisos') }}"><button type="button" class="btn btn-warning"><< Volver</button></a>
			                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
			              </div>
			            </form>
			          </div>
				</div>
			</div>
	    </section>
	</div>

@endsection