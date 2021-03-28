@extends('master')
@section('title', 'Bancos')
@section('active-bancos', 'active')
@section('active-asociacion-bancos', 'active')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Bancos
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
              <h3 class="box-title">Listado de Bancos</h3>
              
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                @if(Session::get('banco_crear') == 1)
                  <div>
                    <a href="{{url('create_banco')}}" class="btn btn-primary" style="float: right;">Nuevo Banco</a>
                  </div>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped informe">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($banco as $b)
                  <tr>
                    <td>{{$b->nombre}}</td>
                    <td>
                        <a href="{{url('show_banco',$b->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Datos</a>

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
                    {extend: 'csv', title: 'Lista Bancos'},
                    {extend: 'excel', title: 'Lista Bancos'},
                    {extend: 'pdf', title: 'Lista Bancos'},

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
