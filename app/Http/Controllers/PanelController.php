<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Socio;
use App\Facturacompra;

class PanelController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    // INICIO
    public function Home() {

    	$user = User::all()->count();
    	$socio = Socio::all()->count();
        $factura = Facturacompra::all()->count();
    	return view('index', compact('factura', 'user', 'socio'));
    }

}
