<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modeloUsuarios;
use App\modeloTipousers;

class controladorUsuarios extends Controller
{
    public function index(){            //Creamos un metodo index que soló nos retornará la vista registro.
        $typeusers = modeloTipousers::all()->whereBetween('id_tipo', [2, 3]);
       
        return view('registro', compact('typeusers'));
    }
    
    public function store(Request $request){        // Creacion del metodo Store (llenado de datos) con la variable request para recibir
        $registro=request()->all();                 // todos los datos.
        if($request->hasFile('foto')){              // Creamos una comparación para hacer una validación para nuestra foto.
            
            $file=$request->file('foto');
            $nombre_imagen = time().$file->getClientOriginalName();  // Le asignamos la fecha de subida de nuestro archivo.
            $file->move(public_path().'/perfiles/',$nombre_imagen);  // Usamos el metodo move para darle un espacio de guardado de a nuestra imagen.
        }


        modeloUsuarios::create([                                // Despues de hacer la comparacion creamos la asignación de nuestros campos
            
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
            'password'=> bcrypt($registro['password']),
            'matricula'=> $registro['matricula'],
            'foto'=> $nombre_imagen

        ]);
        return back();

    }
}
