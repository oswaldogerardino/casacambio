<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


// home
Route::get('/dash', 'PanelController@Home')->middleware('auth');
// inicio de sesion
Route::get('/', 'LoginController@inicio');
Route::post('/', 'LoginController@authenticate');
Route::get('/salir', 'LoginController@logout');


// CONFIGURACION
Route::group(['middleware' => 'auth'], function() {
	Route::prefix('configuracion')->group(function () {

	    // ROLES
	    Route::get('/roles', 'RolController@index');
	    	Route::prefix('roles')->group(function () {
				// crear
				Route::get('/nuevo-rol', 'RolController@create');
				// guardar
				Route::post('/nuevo-rol', 'RolController@store');
				// mostrar
				Route::get('{id?}', 'RolController@show');
				// edit
				Route::get('/editar-rol/{id?}', 'RolController@edit');
				// update
				Route::post('/editar-rol/{id?}', 'RolController@update');
				// destroy
				Route::post('/destroy/{id?}', 'RolController@destroy');
			});

	    // USUARIOS
	    Route::get('/usuario', 'UsuarioController@index');
	    	Route::prefix('usuario')->group(function () {
				// crear
				Route::get('/nuevo-usuario', 'UsuarioController@create');
				// guardar
				Route::post('/nuevo-usuario', 'UsuarioController@store');
				// mostrar
				Route::get('{id?}', 'UsuarioController@show');
				// edit
				Route::get('/editar-usuario/{id?}', 'UsuarioController@edit');
				// update
				Route::post('/editar-usuario/{id?}', 'UsuarioController@update');
				// destroy
				Route::post('/destroy/{id?}', 'UsuarioController@destroy');
			});

	    // PERMISOS
	    Route::get('/permisos', 'PermisoController@index');
	    Route::prefix('permiso')->group(function () {
				// ver
				Route::get('/show_permiso/{id}', 'PermisoController@show');
				// update
				Route::post('/show_permiso/{id}', 'PermisoController@update');
			});


	    // SISTEMA
	    Route::get('/configuracion', 'ConfiguracionController@edit');
	    Route::post('/configuracion', 'ConfiguracionController@update');

        //PUESTO
        Route::get('/puesto', 'PuestoController@index');
        Route::prefix('puesto')->group(function () {
            // crear
            Route::get('/create_puesto', 'PuestoController@create');
            // registrar
            Route::post('/create_puesto', 'PuestoController@store');
            // ver
            Route::get('/show_puesto/{id}', 'PuestoController@show');
            // edit
            Route::get('/edit_puesto/{id?}', 'PuestoController@edit');
            // update
            Route::post('/edit_puesto/{id?}', 'PuestoController@update');
            // destroy
            Route::post('/destroy_puesto/{id}', 'PuestoController@destroy');
        });

	});
});

//MODULO SOCIO

	//INDEX
	Route::get('/socios', 'SocioController@index')->middleware('auth');

	//CREATE
	Route::get('/create_socio', 'SocioController@create')->middleware('auth');
	Route::post('/create_socio', 'SocioController@store')->middleware('auth');
		
	//EDIT
	Route::get('/edit_socio/{id}', 'SocioController@edit')->middleware('auth');
	Route::post('/edit_socio/{id}', 'SocioController@update')->middleware('auth');
		
	// SHOW
	Route::get('/show_socio/{id}', 'SocioController@show')->middleware('auth');

	// DELETE
	Route::get('/destroy_socio/{id}', 'SocioController@destroy')->middleware('auth');


//MODULO BANCO

	//INDEX
	Route::get('/bancos', 'BancoController@index')->middleware('auth');

	//CREATE
	Route::get('/create_banco', 'BancoController@create')->middleware('auth');
	Route::post('/create_banco', 'BancoController@store')->middleware('auth');
		
	//EDIT
	Route::get('/edit_banco/{id}', 'BancoController@edit')->middleware('auth');
	Route::post('/edit_banco/{id}', 'BancoController@update')->middleware('auth');
		
	// SHOW
	Route::get('/show_banco/{id}', 'BancoController@show')->middleware('auth');

	// DELETE
	Route::get('/destroy_banco/{id}', 'BancoController@destroy')->middleware('auth');
	//ROUTES MODULO RESES


//MODULO CUENTAS BANCARIAS

	//INDEX
	Route::get('/cuentasbancarias', 'CuentabancariaController@index')->middleware('auth');

	//CREATE
	Route::get('/create_cuentasbancarias', 'CuentabancariaController@create')->middleware('auth');
	Route::post('/create_cuentasbancarias', 'CuentabancariaController@store')->middleware('auth');
		
	//EDIT
	Route::get('/edit_cuentasbancarias/{id}', 'CuentabancariaController@edit')->middleware('auth');
	Route::post('/edit_cuentasbancarias/{id}', 'CuentabancariaController@update')->middleware('auth');
		
	// SHOW
	Route::get('/show_cuentasbancarias/{id}', 'CuentabancariaController@show')->middleware('auth');

	// DELETE
	Route::get('/destroy_cuentasbancarias/{id}', 'CuentabancariaController@destroy')->middleware('auth');

//MODULO FACTURACION COMPRAS

	//INDEX
	Route::get('/listasprobadas', 'FacturacompraController@lista_aprobar')->middleware('auth');
	Route::get('/listarechazadas', 'FacturacompraController@lista_rechazar')->middleware('auth');

	Route::get('/storage/{archivo}', function ($archivo) {
		
     $public_path = public_path();
     $url = '../intergiros/storage'.$archivo;

	});

	//INDEX
	Route::get('/facturascompras', 'FacturacompraController@index')->middleware('auth');

	//SHOW
	Route::get('/show_facturacompra/{id}', 'FacturacompraController@show')->middleware('auth');
	Route::get('/ver_aprobar/{id}', 'FacturacompraController@ver_aprobar')->middleware('auth');
	Route::post('/ver_aprobar/{id}', 'FacturacompraController@guardar_aprobar')->middleware('auth');
	Route::get('/ver_rechazar/{id}', 'FacturacompraController@ver_rechazar')->middleware('auth');
	Route::post('/ver_rechazar/{id}', 'FacturacompraController@guardar_rechazar')->middleware('auth');

	//EDIT
	Route::get('/edit_facturacompra/{id}', 'FacturacompraController@index@edit')->middleware('auth');
	Route::post('/edit_facturacompra/{id}', 'FacturacompraController@update')->middleware('auth');

	//CREATE GET
	Route::get('/create_facturacompra', 'FacturacompraController@create')->middleware('auth');
	Route::post('/create_facturacompra', 'FacturacompraController@store')->middleware('auth');

	//DESTROY
	Route::get('/destroy/{id}', 'FacturacompraController@destroy')->middleware('auth');

	//GET PRODUCTO
	Route::post('/get_producto', 'FacturacompraController@GetProductos')->middleware('auth');

	//STATUS ACEPTADO
	Route::get('/status_aceptar/{id}', 'FacturacompraController@StatusAceptar')->middleware('auth');

	//STATUS RECHAZADO
	Route::get('/status_cancelar/{id}', 'FacturacompraController@StatusCalcelar')->middleware('auth');

	//IMPRIMIR PDF FACTURA
	Route::get('/imprimir/{id}', 'FacturacompraController@ImprimirPdf')->middleware('auth');


//MODULO ESTADISTICAS COMPRAS
		
	Route::get('/estadistica_compra', 'EstadisticaCompraController@index')->middleware('auth');
	Route::post('/estadistica_compra', 'EstadisticaCompraController@consultaanio')->middleware('auth');


//MODULO MOVIMIENTOS 
		
    Route::get('/diario', 'EstadisticaCompraController@diario')->middleware('auth');
    Route::post('/diario', 'EstadisticaCompraController@diario_consulta')->middleware('auth');



    //FACTURA EXPRESS
    Route::post('/facturacedula', 'FacturaexpressController@cedula_consulta')->middleware('auth'); 

