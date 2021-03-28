@extends('master')
@section('title', 'Aprobar Factura')
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
            Facturas
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
              <h3 class="box-title">Aprobación de Factura</h3> 
            </div>
            <!-- /.box-header -->
            <form method="POST" id="form1" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group text-left">
                  
                  <div class="col-sm-12">

                    <input required="required" type="file" id="files" name="file"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br />
                    <div id="lista_imagenes"></div>

                  </div>
                  
                </div>
            </div>
            <div class="box-footer">
              <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="APROBAR AHORA!">
              </div>
            </div>
          </form>
            <!-- /.box-body -->
      </div>
      <!-- /.box -->

          

    </section>
</div>

<script>
      function archivo(evt) {
          var files = evt.target.files; // FileList object

          // Obtenemos la imagen del campo "file".
          for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {
                return function(e) {
                  // Insertamos la imagen
                 document.getElementById("lista_imagenes").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);

            reader.readAsDataURL(f);
          }
      }

      document.getElementById('files').addEventListener('change', archivo, true);
</script>
@endsection
