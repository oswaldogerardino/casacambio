<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{Session::get('nombre_empresa')}} | @yield('title')</title>
         <meta name="description" content="casa de cambio de moneda {{Session::get('nombre_empresa')}}">
            <!-- Favicons -->
        <link rel="icon" href="{{ url('/img/favicon-bar-chart.ico') }}" type="image/x-icon" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ url('/css/Template/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ url('/css/Template/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/AdminLTE.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/_all-skins.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/iCheck/flat/blue.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/datepicker/datepicker3.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Template/plugins/dataTables/datatables.min.css') }}">
        <script src="{{ url('/js/Template/fontawesome.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/jQuery/jquery-ui.min.js') }}"></script>

        <!--LIBRERIA HIGHCHARTS-->
        <script src="{{ url('/Highcharts-6.0.2/code/highcharts.js')}}"></script>
        <script src="{{ url('/Highcharts-6.0.2/code/modules/exporting.js')}}"></script>
        <script src="{{ url('/Highcharts-6.0.2/code/modules/series-label.js')}}"></script>

        {{-- LOGIN --}}
        <link rel="stylesheet" href="{{ url('/css/Login/blue.css') }}">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('header')

                @yield('content')
            
            @include('footer')
        </div>


        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>

        <script src="{{ url('/js/Template/bootstrap.js') }}"></script>

        <script src="{{ url('/js/Template/plugins/raphael/raphael-min.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/jqueryNumber/jqueryNumber.js') }}"></script>
        <script src="{{ url('/js/Template/global.js') }}"></script>

        <script src="{{ url('/js/Template/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/knob/jquery.knob.js') }}"></script>

        <script src="{{ url('/js/Template/plugins/moment/moment.min.js') }}"></script>

        <script src="{{ url('/js/Template/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/fastclick/fastclick.js') }}"></script>

        <script src="{{ url('/js/Template/app.js') }}"></script>
        <script src="{{ url('/js/Template/dashboard.js') }}"></script>
        <script src="{{ url('/js/Template/demo.js') }}"></script>
        <script src="{{ url('/js/Template/plugins/dataTables/datatables.min.js') }}"></script>


        <script src="{{ url('/js/Login/icheck.js') }}"></script>
        <script>
            $(function () {
                $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
                });
            });

        </script>
    </body>
</html>
