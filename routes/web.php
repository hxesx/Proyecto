<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/dashboard', 'DashboardController@index')->name('admin/dashboard');
// Rutas CRUD

/* Crear */
Route::get('admin/articulos/crear', 'ArticulosController@crear')->name('admin/articulos/crear');
Route::put('admin/articulos/store', 'ArticulosController@store')->name('admin/articulos/store');

/* Leer */
Route::get('admin/articulos', 'ArticulosController@index')->name('admin/articulos');

/*Visualizar registro*/
Route::get('admin/articulos/detallesproducto/{id}', 'ArticulosController@detallesproducto')->name('admin/articulos/detallesproducto');


/* Actualizar */
Route::get('admin/articulos/actualizar/{id}', 'ArticulosController@actualizar')->name('admin/articulos/actualizar');
Route::put('admin/articulos/update/{id}', 'ArticulosController@update')->name('admin/articulos/update');

/* Eliminar */
Route::put('admin/articulos/eliminar/{id}', 'ArticulosController@eliminar')->name('admin/articulos/eliminar');

/* Eliminar imagen de un registro */
Route::get('admin/articulos/eliminarimagen/{id}{bid}', 'ArticulosController@eliminarimagen')->name('admin/articulos/eliminarimagen');

Route::get('venta', 'VentasController@index' )->name('venta');
Route::post('venta/cart-add',    'CartController@add')->name('cart.add');

Route::get('venta/cart-checkout','CartController@cart')->name('cart.checkout');

Route::post('venta/cart-clear',  'CartController@clear')->name('cart.clear');

Route::post('venta/cart-removeitem',  'CartController@removeitem')->name('cart.removeitem');

Route::get('comprar', 'TicketController@index' )->name('ticket');
