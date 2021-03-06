@extends('master')
@section('title', 'Nuevo Usuario')
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
	                    Nuevo Usuario
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
			              	<h3 class="box-title">Nuevo Usuario</h3>
			            </div>
			            <form class="form-horizontal" method="POST">
			            	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			              	<div class="box-body">
				                <div class="form-group">
				                  	<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					                <div class="col-sm-10">
					                   	<input type="text" autocomplete="off" class="form-control" id="nombre" name="nombre" placeholder="Nombre" autofocus="Nombre" required />
					                </div>
				                </div>
				                <div class="form-group">
				                  	<label for="email" class="col-sm-2 control-label">Email</label>
					                <div class="col-sm-10">
					                   	<input type="email" autocomplete="off" class="form-control" id="email" name="email" placeholder="Email" required />
					                </div>
				                </div>
				                <div class="form-group">
				                  	<label for="clave" class="col-sm-2 control-label">Contrase??a</label>
					                <div class="col-sm-10">
					                   	<input type="password" autocomplete="off"  class="form-control" id="clave" name="clave" placeholder="Contrase??a" required />
					                </div>
				                </div>
				                <div class="form-group">
				                  	<label for="rol" class="col-sm-2 control-label">Rol</label>
					                <div class="col-sm-10">
					                   	<select name="rol" id="rol" class="form-control" required>
					                   		<option value="">Seleccione una opcion</option>
					                   		@foreach ($roles as $rol)
					                   			<option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
					                   		@endforeach
					                   	</select>
					                </div>
				                </div>
                                <div class="form-group">
                                    <label for="rol" class="col-sm-2 control-label">Puesto</label>
                                    <div class="col-sm-10">
                                        <select name="puesto" id="puesto" class="form-control" required>
                                            <option value="">Seleccione una opcion</option>
                                            @foreach ($puestos as $p)
                                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
			              	</div>
			              <div class="box-footer">
			                <a href="{{ url('/configuracion/usuario') }}"><button type="button" class="btn btn-warning">Regresar</button></a>
			                <button type="submit" class="btn btn-info pull-right">Registrar</button>
			              </div>
			            </form>
			          </div>
				</div>
			</div>
	    </section>
	</div>

@endsection