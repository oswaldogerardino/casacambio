@extends('master')
@section('title', 'Nuevo Rol')
@section('active', 'active')
@section('active-rol', 'active')
@section('content')

	<div class="content-wrapper">

	    <section class="content-header">
	        <h1>
	            Roles
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
	                <a href="{{ url('/configuracion/roles/') }}">
	                    Roles
	                </a>
	            </li>
	            <li class="active">
	                <a href="#">
	                    Nuevo Rol
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
			              	<h3 class="box-title">Nuevo Rol</h3>
			            </div>
			            <form class="form-horizontal" method="POST">
			            	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			              	<div class="box-body">
				                <div class="form-group">
				                  	<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					                <div class="col-sm-10">
					                   	<input type="text"  class="form-control" id="nombre" name="nombre" placeholder="Nombre" required />
					                </div>
				                </div>
			              	</div>
			              <div class="box-footer">
			                <a href="{{ url('/configuracion/roles/') }}"><button type="button" class="btn btn-warning">Regresar</button></a>
			                <button type="submit" class="btn btn-info pull-right">Registrar</button>
			              </div>
			            </form>
			          </div>
				</div>
			</div>
	    </section>
	</div>

@endsection