@extends('master')
@section('title', 'Clientes')
@section('active-clientes', 'active')
@section('active-clientes-socios', 'active')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Clientes
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ url('/"') }}">
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
              <h3 class="box-title">Listado de Clientes</h3>
              
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                @if(Session::get('cliente_crear') == 1)
                    <div>
                      <a href="{{url('create_socio')}}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Nuevo Cliente</a>
                    </div>
                @endif
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped informe">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($socios as $s)
                  <tr>
                    <td>{{$s->nombre}}</td>
                    <td>{{$s->documento}}</td>
                    <td>
                        <a href="{{url('show_socio',$s->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Datos</a>

                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
</div>
    <script>
        $(document).ready(function(){
            $('.informe').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                select: true,
                buttons: [
                    {extend: 'csv', title: 'Lista Socios'},
                    {extend: 'excel', title: 'Lista Socios'},
                    {extend: 'pdf', title: 'Lista Socios'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                        }
                    }
                ],
            });
        });

    </script>
@endsection
