@extends('master')
@section('title', 'Rechazar Factura')
@section('active-compra', 'active')
@section('active-aprobada-factura', 'active')
@section('content')
<div class="content-wrapper">
  <style>
    .thumb {
      height: auto;
      width: 80%;
      border: 1px solid black;
    }
  </style>
    <section class="content-header">
        <h1>
            Rechazo de Factura
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ url('/dash') }}">
                    <i class="fa fa-dashboard">
                    </i>
                    Inicio
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rechazo de Factura</h3> 
            </div>
            <!-- /.box-header -->
            <form method="POST">
            <div class="box-body">
                <div class="form-group text-left">
                  
                  <div class="col-sm-12">
                    <label for="comentario">Comente porqué rechazará esta factura (opcional)</label>
                    <textarea name="comentario" class="form-control"></textarea>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br />
                    <div id="lista_imagenes"></div>

                  </div>
                  
                </div>
            </div>
            <div class="box-footer">
              <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="RECHAZAR AHORA!">
              </div>
            </div>
          </form>
            <!-- /.box-body -->
      </div>
      <!-- /.box -->

          

    </section>
</div>
@endsection
