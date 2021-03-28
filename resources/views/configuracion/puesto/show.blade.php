@extends('master')
@section('title', 'Puestos')
@section('active-configuracion', 'active')
@section('active-configuracion-puesto', 'active')
@section('content')

	<div class="content-wrapper">

	    <section class="content-header">
	        <h1>
	            Puestos
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
	                <a href="{{ url('/configuracion/puestos') }}">
                        Puestos
	                </a>
	            </li>
	            <li class="active">
	                <a href="#">
	                    {{ $puestos->nombre }}
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
			              	<h3 class="box-title">{{ $puestos->nombre }}</h3>
			            </div>
			              	<div class="box-body">
				                <div class="form-group">
				                  	<label for="nombre" class="col-sm-2 control-label">Nombre: </label>
					                <div class="col-sm-10">
					                   	<input type="text" value="{{ $puestos->nombre }}" class="form-control" readonly></input>
					                </div>
				                </div>
			              	</div>
			              <div class="box-footer">
			                <a href="{{ url('/configuracion/puesto') }}"><button type="button" class="btn btn-warning">Regresar</button></a>
			                <a href="{{ url('/configuracion/puesto/edit_puesto', $puestos->id) }}"><button type="submit" class="btn btn-info">Editar</button></a>
			                
			            	<form class="form-horizontal" action="{{ action('PuestoController@destroy', $puestos->id) }}" method="POST">
			            		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			                	<button type="submit" class="btn btn-danger pull-right" style="margin-top: 10px">Borrar</button>
			            	</form>
			              </div>
			          </div>
				</div>
			</div>
	    </section>
	</div>

@endsection