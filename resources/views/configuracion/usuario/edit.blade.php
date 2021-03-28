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
	                    Usuario
	                </a>
	            </li>
	            <li class="active">
	                <a href="#">
	                    Editar Usuario: {{$datos->name}}
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
			              	<h3 class="box-title">Editar Usuario</h3>
			            </div>
			            <form class="form-horizontal" method="POST">
			            	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			              	<div class="box-body">
				                <div class="form-group">
				                  	<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					                <div class="col-sm-10">
					                   	<input type="text"  class="form-control" id="nombre" name="nombre" value="{{$datos->nombre}}" placeholder="Nombre" autofocus="Nombre" required />
					                </div>
				                </div>
				                <div class="form-group">
				                  	<label for="email" class="col-sm-2 control-label">Email</label>
					                <div class="col-sm-10">
					                   	<input type="email"  class="form-control" id="email" name="email" value="{{$datos->email}}" placeholder="Email" required />
					                </div>
				                </div>
				                <div class="form-group">
				                  	<label for="rol" class="col-sm-2 control-label">Rol</label>
					                <div class="col-sm-10">
					                   	<select name="rol" id="rol" class="form-control" required>
					                   		<option style="background-color:green; color:white;" value="{{ isset($datos->rol->id) ? $datos->rol->id : ' ' }}">{{ isset($datos->rol->nombre) ? $datos->rol->nombre : 'Seleccione una opcion' }}</option>
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
                                            <option style="background-color:green; color:white;" value="{{ isset($datos->puesto->id) ? $datos->puesto->id : ' ' }}">{{ isset($datos->puesto->nombre) ? $datos->puesto->nombre : 'Seleccione una opcion' }}</option>
                                            @foreach ($puestos as $p)
                                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="clave" class="col-sm-2 control-label">Contraseña</label>
                                    <div class="col-sm-10">
                                        <input autocomplete="off" type="text"  class="form-control" id="clave" name="clave" placeholder="Sólo rellene este campo, si desea cambiar la clave. Sino, déjelo como está."  />
                                    </div>
                                </div>
			              	</div>
			              <div class="box-footer">
			                <a class="btn btn-warning" href="{{ url('/configuracion/usuario') }}">Regresar</a>
			                <button type="submit" class="btn btn-info pull-right">Registrar</button>
			              </div>
			            </form>
			          </div>
				</div>
			</div>
	    </section>
	</div>

@endsection