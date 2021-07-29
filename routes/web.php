<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorRegistro;

Route::get('/','controladorNotificaciones@solo_categorias')->name('inicio');

Route::get('/registro','controladorUsuarios@index');
Route::post('/registro','controladorUsuarios@store');

Route::get('/citas', 'ControladorCitas@index');
Route::post('/citas', 'ControladorCitas@store');

Route::view('/contacto','contacto')->name('contacto');

Route::get('/login', 'controladorLogin')->name('login');
Route::view('/nosotros','nosotros')->name('nosotros');

Route::get('/notificaciones', 'controladorNotificaciones@notificaciones_generales')->name('notificaciones');


Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';