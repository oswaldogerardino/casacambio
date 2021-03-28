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
	            <li class="active">
	                <a href="#">
	                    Puestos
	                </a>
	            </li>
	        </ol>
	    </section>

	    @if (session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
		@endif

	    <section class="content">
	    	<div class="row">
	    		<div class="col-xs-12">
	    			<div class="box">
	    				<div class="box-header">
	    					<h3 class="box-title"><a href="puesto/create_puesto" class="btn btn-primary">Crear Nuevo</a></h3>
	    				</div>
	    				<div class="box-body">
	    					<div class="table-responsive">
	    						<table class="table table-bordered table-hover informacion">
	    							<thead>
	    								<th>Nombre</th>
	    							</thead>
	    							<tbody>
	    								@foreach($puestos as $p)
		    								<tr>
		    									<td><a href="{{url('/configuracion/puesto/show_puesto',$p->id)}}">{{ $p->nombre }}</a></td>
		    								</tr>
		    							@endforeach
	    							</tbody>
	    						</table>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </section>

	    <script>
	        $(document).ready(function(){
	            $('.informacion').DataTable({
	                dom: '<"html5buttons"B>lTfgitp',
	                select: true,
	                buttons: [
	                    // {extend: 'csv', title: 'Lista de Ivas'},
	                    // {extend: 'excel', title: 'Lista de Ivas'},
	                    // {extend: 'pdf', title: 'Lista de Ivas'},

	                    // {extend: 'print',
	                    //     customize: function (win){
	                    //         $(win.document.body).addClass('white-bg');
	                    //         $(win.document.body).css('font-size', '10px');
	                    //         $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
	                    //     }
	                    // }
	                ],
	            });
	        });

	    </script>
	</div>

@endsection