{{--dd(Session::all())--}}
<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <a class="logo" href="{{ url('/dash') }}">
        <span class="logo-mini">
            <b>
                <i class="fa fa-cog"></i>
            </b>
        </span>
        <span class="logo-lg">
            <b>
                {{Session::get('nombre_empresa')}}
            </b>
        </span>
    </a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a class="sidebar-toggle" data-toggle="offcanvas" href="#" role="button">
            <span class="sr-only">
                Toggle navigation
            </span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img alt="User Image" class="user-image" src="{{ url('/img/default.png') }}"/>
                            <span class="hidden-xs">
                                {{Session::get('correo')}}
                            </span>
                        </img>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img alt="User Image" class="img-circle" src="{{ url('/img/default.png') }}"/>
                                <p>
                                    {{Session::get('nombre')}}
                                </p>

                                <p>
                                    {{Session::get('rol_nombre')}}
                                </p>

                            </img>
                        </li>
                    
                        <li class="user-footer">
                            <div class="pull-center">
                                <a class="btn btn-default btn-flat" href="{{ url('/salir') }}">
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img alt="User Image" class="img-circle" src="{{ url('/img/default.png') }}"/>
            </div>
            <div class="pull-left info">
                <p>
                   {{Session::get('nombre')}}
                </p>
                <a href="#">
                    <i class="fa fa-circle text-success">
                    </i>
                    {{Session::get('rol_nombre')}}
                </a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">
                MENU
            </li>
            <li class="active">
                <a href="{{ url('/dash') }}">
                    <i class="fa fa-dashboard">
                    </i>
                    <span>
                        Inicio
                    </span>
                </a>
            </li>
            
        {{-- FACTURACION --}}

        @if(Session::get('facturar') == 1)
            <li class="treeview @yield('active-compra')" style="background-color: green">
                <a href="#" data-toggle="modal" data-target="#cedula">
                    <i class="fa fa-dollar">
                    </i>
                    <span  style="color: white;">
                        FACTURACI&Oacute;N
                    </span>
                </a>
            </li>
        @endif

        {{-- CLIENTES --}}

        @if(Session::get('cliente_crear') == 0 AND Session::get('cliente_editar') == 0 AND Session::get('cliente_borrar') == 0 AND Session::get('cuenta_crear') == 0 AND Session::get('cuenta_editar') == 0 AND Session::get('cuenta_borrar') == 0)

        @else
            <li class="treeview @yield('active-clientes')">
                <a href="#">
                    <i class="fa fa-user-plus">
                    </i>
                    <span>
                        Clientes Y Cuentas B.
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </span>
                </a>
                <ul class="treeview-menu">
                @if(Session::get('cliente_crear') == 0 AND Session::get('cliente_editar') == 0 AND Session::get('cliente_borrar') == 0)

                @else
                    <li class="@yield('active-clientes-socios')">
                        <a href="{{ url('/socios') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Control de Clientes
                        </a>
                    </li>
                @endif

                @if(Session::get('cuenta_crear') == 0 AND Session::get('cuenta_editar') == 0 AND Session::get('cuenta_borrar') == 0)

                @else
                     <li class="@yield('active-clientes-cuentas')">
                        <a href="{{ url('/cuentasbancarias') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Cuentas Bancarias
                        </a>
                     </li>
                @endif

                </ul>
            </li>
        @endif

        {{-- BANCOS --}}

        @if(Session::get('banco_crear') == 0 AND Session::get('banco_editar') == 0 AND Session::get('banco_borrar') == 0)

        @else
            <li class="treeview @yield('active-bancos')">
                <a href="#">
                    <i class="fa fa-dollar">
                    </i>
                    <span>
                        Bancos
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('active-asociacion-bancos')">
                        <a href="{{ url('/bancos') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Control de Bancos
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- Facturas --}}

        @if(Session::get('factura_pendiente_ver') == 0 AND Session::get('factura_pendiente_procesos') == 0 AND Session::get('factura_rechazada_ver') == 0 AND Session::get('factura_rechazada_procesos') == 0 AND Session::get('factura_aprobada_ver') == 0 AND Session::get('factura_aprobada_procesos') == 0)

        @else
            <li class="treeview @yield('active-facturas')">
                <a href="#">
                    <i class="fa fa-shopping-bag">
                    </i>
                    <span>
                        Facturas
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Session::get('factura_pendiente_ver') == 1)
                        <li class="@yield('active-facturas-pendientes')">
                            <a href="{{ url('/facturascompras') }}">
                                <i class="fa fa-circle-o">
                                </i>
                                Facturas Pendientes
                            </a>
                        </li>
                    @endif

                    @if(Session::get('factura_rechazada_ver') == 1)
                        <li class="@yield('active-facturas-rechazadas')">
                            <a href="{{ url('/listarechazadas') }}">
                                <i class="fa fa-circle-o">
                                </i>
                                Facturas Rechazadas
                            </a>
                        </li>
                    @endif

                    @if(Session::get('factura_aprobada_ver') == 1)
                        <li class="@yield('active-facturas-aprobadas')">
                            <a href="{{ url('/listasprobadas') }}">
                                <i class="fa fa-circle-o">
                                </i>
                                Facturas Aprobadas
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Movimientos --}}

        @if(Session::get('movimientos_diario') == 0 AND Session::get('movimientos_estadistica') == 0 )

        @else

            <li class="treeview @yield('active-movimientos')">
                <a href="#">
                    <i class="fa fa-line-chart">
                    </i>
                    <span>
                        Movimientos
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Session::get('movimientos_diario') == 1)
                         <li class="@yield('active-movimientos-ingreso')">
                            <a href="{{ url('/diario') }}">
                                <i class="fa fa-circle-o">
                                </i>
                                Ingreso por dia
                            </a>
                         </li>
                    @endif

                    @if(Session::get('movimientos_estadistica') == 1)
                        <li class="@yield('active-movimientos-estadisticas')">
                            <a href="{{ url('/estadistica_compra') }}">
                                <i class="fa fa-circle-o">
                                </i>
                                Estadisticas
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Configuración --}}

        @if(Session::get('rol_nombre') == 'ADMINISTRADOR' || Session::get('rol_nombre') == 'SUPERADMIN')
            <li class="treeview @yield('active-configuracion')">
                <a href="#">
                    <i class="fa fa-wrench">
                    </i>
                    <span>
                        Configuración
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@yield('active-configuracion-puesto')">
                        <a href="{{ url('/configuracion/puesto') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Puestos
                        </a>
                    </li>

                     <li class="@yield('active-configuracion-roles')">
                        <a href="{{ url('/configuracion/roles') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Roles
                        </a>
                    </li>

                    <li class="@yield('active-configuracion-usuarios')">
                        <a href="{{ url('/configuracion/usuario') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Usuarios
                        </a>
                    </li>

                    <li class="@yield('active-configuracion-permisos')">
                        <a href="{{ url('/configuracion/permisos') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Permisos
                        </a>
                    </li>

                    <li class="@yield('active-configuracion-configuracion')">
                        <a href="{{ url('/configuracion/configuracion') }}">
                            <i class="fa fa-circle-o">
                            </i>
                            Configuración
                        </a>
                    </li>
                       
                </ul>
            </li>
        @endif

            <br>
            <br>
            <div class="text-center">
            <font color="white" >
                <strong>Creado por:</strong><br>
                <strong><a target="_blank" href="http://lamanzanadigital.com.ve/">Oswaldo Gerardino</a></strong>
            </font>
            </div>
           
        </ul>
    </section>
</aside>
