
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>InterGiros | Login</title>
        <meta name="description" content="asociacion de ganaderos para obtener las medidas graficas para produccion de leche, carne, queso, lacteos, derivados de carne, etc...">
            <!-- Favicons -->
            <link rel="icon" href="{{ url('/img/favicon-bar-chart.ico') }}" type="image/x-icon" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ url('/css/Login/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Login/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Login/AdminLTE.css') }}">
        <link rel="stylesheet" href="{{ url('/css/Login/blue.css') }}">
        <script src="{{ url('/js/Template/fontawesome.js') }}"></script>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#" role="button"><b> {{Session::get('nombre_empresa_login')}} </b></a>
               
            </div>

            <div class="login-box-body">
                
                
                @if (session('status'))
                    <div class="alert alert-success">
                        <p class="login-box-msg">{{session('status')}}</p>
                    </div>
                @endif
                @if (session('error_datos'))
                    <div class="alert alert-warning">
                        <p class="login-box-msg">{{session('error_datos')}}</p>
                    </div>
                @endif
                
                <form method="POST" action="">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!--
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> ¿ Recordar ?
                                </label>
                            </div>
                        </div>
                       -->
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                        </div>
                    </div>
                </form>
                {{-- <a href="{{ route('password.request') }}">¿ Olvido su contraseña ?</a><br> --}}
            </div>
        </div>

        <script src="{{ url('/js/Login/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ url('/js/Login/bootstrap.js') }}"></script>
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
