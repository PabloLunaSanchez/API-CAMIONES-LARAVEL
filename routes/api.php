<?php
use App\Http\Controllers\API\PersonaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViajeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//rutas para tabla persona

Route::post('/auth/register',[AuthController::class, 'register']);
Route::post('/auth/registerflete',[ViajeController::class, 'guardarflete']);
Route::post('/auth/login',[AuthController::class, 'login']);




//Route::get('auth/user/{id}', 'AuthController@getUserDataById');




Route::get( '/personas', 'App\Http\Controllers\API\PersonaController@index' ); // GET /todas las personas
Route::post( '/personas', 'App\Http\Controllers\API\PersonaController@store' ); // POST /agregar personas
Route::get('/personas/{persona}', 'App\Http\Controllers\API\PersonaController@show'); // GET /personas/{id}
Route::put( '/personas/{persona}', 'App\Http\Controllers\API\PersonaController@update' ); // PUT /personas/{id}
Route::delete( '/personas/{id}', 'App\Http\Controllers\API\PersonaController@destroy' ); // DELETE /personas/{id}

//rutas para tabla camiones
Route::get('/camiones', 'App\Http\Controllers\API\CamionController@index'); // GET /todos los camiones
Route::post('/camiones', 'App\Http\Controllers\API\CamionController@store'); // POST /agregar camiones
Route::get('/camiones/{camion}', 'App\Http\Controllers\API\CamionController@show'); // GET /camiones/{id}
Route::put('/camiones/{camion}', 'App\Http\Controllers\API\CamionController@update'); // PUT /camiones/{id}
Route::delete('/camiones/{id}', 'App\Http\Controllers\API\CamionController@destroy'); // DELETE /camiones/{id}

//rutas para clientes
Route::get('/clientes', 'App\Http\Controllers\API\ClienteController@index'); // GET /todos los clientes
Route::post('/clientes', 'App\Http\Controllers\API\ClienteController@store'); // POST /agregar clientes
Route::get('/clientes/{cliente}', 'App\Http\Controllers\API\ClienteController@show'); // GET /clientes/{id}
Route::put('/clientes/{cliente}', 'App\Http\Controllers\API\ClienteController@update'); // PUT /clientes/{id}
Route::delete('/clientes/{id}', 'App\Http\Controllers\API\ClienteController@destroy'); // DELETE /clientes/{id}

//rutas para tabla viajes
Route::get('/viajes', 'App\Http\Controllers\API\ViajeController@index'); // GET /todos los viajes
Route::post('/viajes', 'App\Http\Controllers\API\ViajeController@store'); // POST /agregar viajes
Route::get('/viajes/{viaje}', 'App\Http\Controllers\API\ViajeController@show'); // GET /viajes/{id}
Route::put('/viajes/{viaje}', 'App\Http\Controllers\API\ViajeController@update'); // PUT /viajes/{id}
Route::delete('/viajes/{id}', 'App\Http\Controllers\API\ViajeController@destroy'); // DELETE /viajes/{id}
