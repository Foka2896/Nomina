<?php

use App\Http\Controllers\PersonalController;
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
    return view('index');
});

/*Route::get('/principal.index', function () {
    return view('principal.index');
});*/

//Route::get('/personal', 'PersonalController@index');

/*Route::get('personal.create', function(){
    return view('personal.create');
});*/

Route::resource('personal', App\Http\Controllers\PersonalController::class);
Route::resource('vehiculo', App\Http\Controllers\VehiculoController::class);
Route::resource('personalxvehiculo', App\Http\Controllers\PersonalxvehiculoController::class);
Route::resource('caja', App\Http\Controllers\CajaController::class);
Route::resource('camov', App\Http\Controllers\CodigoTransporteController::class);

Route::post('CodigoTransporte/importExcel', [App\Http\Controllers\CodigoTransporteController::class, 'importExcel'])->name('camov.importExcel');
Route::get('CodigoTransporte/exportExcel', [App\Http\Controllers\CodigoTransporteController::class, 'exportExcel'])->name('camov.exportExcel');

Route::resource('historial', App\Http\Controllers\HistorialController::class);


//Auth::routes();

//route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
