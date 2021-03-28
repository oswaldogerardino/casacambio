@extends('master')
@section('title', 'CONFIGURACION' )
@section('active-configuracion', 'active')
@section('active-configuracion-configuracion', 'active')
@section('content')


	<div class="content-wrapper">

	    <section class="content-header">
	        <h1>
	            Configuración del Sistema
	        </h1>
	        <ol class="breadcrumb">
	            <li class="">
	                <a href="{{ url('/dash') }}">
	                    <i class="fa fa-dashboard">
	                    </i>
	                    Inicio
	                </a>
	            </li>
	            <li class="active">
	                <a href="#">
	                    Configuración del Sistema
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

	    <section class="content">
	    	<div class="row">
	    		<div class="col-xs-12">
					<div class="box box-info">
			            <div class="box-header with-border">
			              	<h3 class="box-title">Configuración del Sistema</h3>
			            </div>
			            <form class="form-horizontal" method="POST">
			            	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			              	<div class="box-body">
				                <div class="form-group">
				                  	<label for="nombre" class="col-sm-2 control-label">Empresa</label>
					                <div class="col-sm-10">
					                   	<input type="text"  class="form-control" value="{{ $nombre_empresa }}" id="nombreempresa" name="nombreempresa" placeholder="Nombre de la Empresa" required />
					                </div>
				                </div>
				                <div class="form-group">
				                  	<label for="slogan" class="col-sm-2 control-label">Slogan</label>
					                <div class="col-sm-10">
					                   	<input type="text"  class="form-control" value="{{ $slogan }}" id="slogan" name="slogan" placeholder="Slogan de la Empresa" />
					                </div>
				                </div>
				                <div class="form-group">
				                  	<label for="codigo" class="col-sm-2 control-label">Código Empresarial</label>
					                <div class="col-sm-10">
					                   	<input type="text"  class="form-control" value="{{ $codigo_empresa }}" id="codigo" name="codigo" placeholder="Código de Registro de la Empresa" />
					                </div>
				                </div>
				                 <div class="form-group">
				                  	<label for="moneda" class="col-sm-2 control-label">Valor de la Moneda</label>
					                <div class="col-sm-10"><input type="text"  class="form-control" value="{{ $valor_moneda }}" id="moneda" name="moneda" placeholder="Valor de la Moneda" required />
					                </div>
				                </div>
			              	</div>
			              <div class="box-footer">
			                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Guardar Datos</button>
			              </div>
			            </form>
			          </div>
				</div>
			</div>
	    </section>
	</div>

@endsection