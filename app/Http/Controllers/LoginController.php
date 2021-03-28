<?php

namespace App\Http\Controllers;

use App\Http\Requests\InicioFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Configuracion;
use App\Permiso;
use App\Rol;
use App\Puesto;

class LoginController extends Controller {
    //

    // inicio de sesion
    public function inicio() {

        //dd(url());
        return view('auth.login');
    }

    public function authenticate(Request $request) {
      
        $email    = $request->get('email');
        $password = $request->get('password');
        $remember = ($request->get('remember')) ? true : false ;

          
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {

                //DATOS DEL USUARIO
                $usuario       = User::whereEmail($email)->firstOrFail();
                $permisos      = Permiso::whereRolId($usuario->rol_id)->first();
                $rol           = Rol::whereId($usuario->rol_id)->first();
                $configuracion = Configuracion::all();

               //dd($configuracion);


               //VARIABLES DE CONFIGURACION
               Session::put('nombre_empresa', $configuracion[0]['nombre_empresa']);
               Session::put('slogan', $configuracion[0]['slogan']);
               Session::put('codigo_empresa', $configuracion[0]['codigo_empresa']);
               Session::put('valor_moneda', $configuracion[0]['valor_moneda']);

               //VARIABLES DE USUARIO
               Session::put('correo', $usuario->email);
               Session::put('nombre', $usuario->nombre);
               Session::put('rol_id', $usuario->rol_id);
               Session::put('usuario_id', $usuario->id);
               Session::put('rol_nombre', $rol->nombre);

                //PUESTO
               $puesto_nombre = Puesto::whereId($usuario->puesto_id)->value("nombre");
               Session::put('puesto_id', $usuario->puesto_id);
               Session::put('puesto_nombre', $puesto_nombre);

               //VARIABLES DE PERMISOS
               Session::put('facturar', $permisos->facturar);
               Session::put('cuenta_crear', $permisos->cuenta_crear);
               Session::put('cuenta_editar', $permisos->cuenta_editar);
               Session::put('cuenta_borrar', $permisos->cuenta_borrar);
               Session::put('cliente_crear', $permisos->cliente_crear);
               Session::put('cliente_editar', $permisos->cliente_editar);
               Session::put('cliente_borrar', $permisos->cliente_borrar);
               Session::put('banco_crear', $permisos->banco_crear);
               Session::put('banco_editar', $permisos->banco_editar);
               Session::put('banco_borrar', $permisos->banco_borrar);
               Session::put('factura_pendiente_ver', $permisos->factura_pendiente_ver);
               Session::put('factura_pendiente_procesos', $permisos->factura_pendiente_procesos);
               Session::put('factura_rechazada_ver', $permisos->factura_rechazada_ver);
               Session::put('factura_rechazada_procesos', $permisos->factura_rechazada_procesos);
               Session::put('factura_aprobada_ver', $permisos->factura_aprobada_ver);
               Session::put('factura_aprobada_procesos', $permisos->factura_aprobada_procesos);
               Session::put('movimientos_diario', $permisos->movimientos_diario);
               Session::put('movimientos_estadistica', $permisos->movimientos_estadistica);
               //dd(Session::all());

               return redirect()->intended('/dash');
            }else{
                return redirect()->intended('/')->with('error_datos', 'Error con los datos.');
                
            }
              
    
    }

    public function logout() {
        Auth::logout();

        //CARGAR CONFIGURACION
        $configuracion= Configuracion::all();

        //OLVIDAR VARIABLES DE LA SESSION
        Session::flush();

        //VARABLE SESSION NOMBRE EMPRESA LOGIN
        Session::put('nombre_empresa_login', $configuracion[0]['nombre_empresa']);
        return redirect()->intended('/')->with('status', 'Gracias por visitarnos.');
    }


}
