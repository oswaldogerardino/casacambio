@extends('master')
@section('title', 'Inicio')
{{-- @section('class_active_home', 'active') --}}
@section('content')

<style type="text/css">
    .titulo_inter{
        
        text-align: center;
        font-size: 50pt;
        font-family: verdana;
    }

    .slogan{
        
        text-align: center;
        font-size: 20pt;
        font-family: verdana;
    }
</style>
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Inicio
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/">
                    <i class="fa fa-dashboard">
                    </i>
                    Inicio
                </a>
            </li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{$user}}
                        </h3>
                        <p>
                            Usuarios
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            {{$socio}}
                        </h3>
                        <p>
                            Clientes
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            {{$factura}}
                        </h3>
                        <p>
                            Facturas registradas
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-folder-o">
                        </i>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xs-12 titulo_inter">
                <strong> {{Session::get('nombre_empresa')}} </strong>
            </div>
            <div class="col-lg-12 col-xs-12 slogan">
                <small> {{Session::get('slogan')}}</small>
            </div>
        </div>
        
    </section>
</div>
@endsection
