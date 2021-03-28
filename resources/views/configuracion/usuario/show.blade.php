@extends('master')
@section('title', 'Usuario - '. $datos->nombre )
@section('active-configuracion', 'active')
@section('active-configuracion-usuarios', 'active')
@section('content')
	<div class="content-wrapper">

	    <section class="content-header">
	        <h1>
	            Usuarios
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
	                <a href="{{ url('/configuracion/usuario"') }}">
	                    Usuarios
	                </a>
	            </li>
	            <li class="active">
	                <a href="#">
	                    {{ $datos->nombre }}
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
	    		<div class="col-md-3">
	    			
	    		</div>
	    		<div class="col-md-6">
		          	<div class="box box-widget widget-user-2">
			            <div class="widget-user-header bg-aqua">
			              	<div class="widget-user-image">
			              		<img class="img-circle" src="{{ url('/img/user_base.jpg') }}" alt="{{$datos->name}}">
			              	</div>
			              	<h3 class="widget-user-username">{{$datos->nombre}}</h3>
			              	<h5 class="widget-user-desc">{{ isset($datos->rol->nombre) ? $datos->rol->nombre : 'NO POSEE' }}</h5>
			              	<div class="margin">
			              		<div class="btn-group">
				                  	<button type="button" class="btn btn-success">Opciones</button>
				                  	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				                    	<span class="caret"></span>
				                    	<span class="sr-only">Toggle Dropdown</span>
				                  	</button>
				                  	<ul class="dropdown-menu" role="menu">
					                    <li><a href="{{ url('/configuracion/usuario"') }}">Regresar</a></li>
					                    <li><a href="{{ action('UsuarioController@edit', $datos->id) }}">Actualizar</a></li>
					                    <li class="divider"></li>
					                    <li>
					                    	<a href="#">
				                    			<form class="" action="{{ action('UsuarioController@destroy', $datos->id) }}" method="POST">
								            		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								                	<button type="submit" class="btn btn-danger pull-right" style="margin-top: 10px">Borrar</button>
								            	</form>
					                    	</a>
					                	</li>	
				                  	</ul>
				                </div>
			              	</div>
			            </div>
			            <div class="box-footer no-padding">
			              	<ul class="nav nav-stacked">
			                	<li><a href="#">Correo: <span class="badge bg-blue">{{$datos->email}}</span></a></li>
			              	</ul>
			            </div>
		          	</div>
		        </div>
	    		<div class="col-md-3"></div>
			</div>
	    </section>
	</div>

@endsection
