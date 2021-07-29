<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modeloUsuarios extends Model
{
    protected $table = 'usuarios'; // Se crea la variable table con el valor de la tabla 'usuarios' de nuestra base de datos.
    const CREATED_AT = null; // Decimos que la contante CREATED_AT sea nula para que no se guarde en la base de datos.
    const UPDATED_AT = null; // Decimos que la contante UPDATED_AT sea nula para que no se guarde en la base de datos.
    protected $guarded = ['id_usuario']; // Le decimos que l unico campo que no se llenara manual sino automatico será el 'id_usuario'.
}
