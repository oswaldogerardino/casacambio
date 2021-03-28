@extends('master')
@section('title', 'Cuentas Bancarias')
@section('active-clientes', 'active')
@section('active-clientes-cuentas', 'active')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cuentas Bancarias
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
              <h3 class="box-title">Listado de Cuentas Bancarias</h3>
              
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                @if(Session::get('cuenta_crear') == 1)
                <div>
                  <a href="{{url('/create_cuentasbancarias')}}" class="btn btn-primary" style="float: right;">Nueva Cuenta Bancaria</a>
                </div>
                @endif

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped informe">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Banco</th>
                    <th>Cuenta</th>
                    <th>Tipo de Cuenta</th>
                    <th>Cliente</th>
                    <th>Documento</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($cuentabancaria as  $key => $c)
                    <?php $banco = DB::table('bancos')->where('id', $c->banco_id)->first(); ?>
                    <?php $cliente = DB::table('socios')->where('id', $c->socio_id)->first(); ?>

                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$banco->nombre}}</td>
                    <td>{{$c->cuenta}}</td>
                    <td>{{$c->tipo_cuenta}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->documento}}</td>
                    <td>
                        <a href="{{url('/show_cuentasbancarias',$c->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Datos</a>

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
                    {extend: 'csv', title: 'Lista Cuentas Bancarias'},
                    {extend: 'excel', title: 'Lista Cuentas Bancarias'},
                    {extend: 'pdf', title: 'Lista Cuentas Bancarias'},

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
