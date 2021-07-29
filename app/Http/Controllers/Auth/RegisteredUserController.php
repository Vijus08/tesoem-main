<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\modeloUsuarios;
use App\modeloTipousers;
use App\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $typeusers = modeloTipousers::all()->whereBetween('id_tipo', [2, 3]);
        return view('registro', compact('typeusers'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $registro=request()->all();                 // todos los datos.
        if($request->hasFile('foto')){              // Creamos una comparación para hacer una validación para nuestra foto.
            
            $file=$request->file('foto');
            $nombre_imagen = time().$file->getClientOriginalName();  // Le asignamos la fecha de subida de nuestro archivo.
            $file->move(public_path().'/perfiles/',$nombre_imagen);  // Usamos el metodo move para darle un espacio de guardado de a nuestra imagen.
        }

        
        $user=User::create([                                // Despues de hacer la comparacion creamos la asignación de nuestros campos
            
            'id_tipo'=> $registro['id_tipo'],
            'nombre'=> $registro['nombre'],
            'a_pat'=> $registro['a_pat'],
            'a_mat'=> $registro['a_mat'],
            'telefono'=> $registro['telefono'],
            'semestre'=> $registro['semestre'],
            'email'=> $registro['email'],
            'direccion'=> $registro['direccion'],
            'cod_postal'=> $registro['cod_postal'],
            'localidad'=> $registro['localidad'],
            'fecha_nacimiento'=> $registro['fecha_nacimiento'],
            'password'=> Hash::make($registro['password']),
            'matricula'=> $registro['matricula'],
            'foto'=> $nombre_imagen

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
