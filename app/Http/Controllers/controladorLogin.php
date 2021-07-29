<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modeloRegistro;

class controladorLogin extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $login = ['login' => 'Hola desde el controlador Login'];
        return view('login', compact('login'));        
    }
}
