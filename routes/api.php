<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=> 'auth:api'], function () {
	Route::post('/check', [AuthController::class, 'check']);
	Route::post('/logout', [AuthController::class,'logout']);
	Route::post('/pages', [PageController::class,'create']);
	Route::post('/pages/delete', [PageController::class,'destroy']);
	Route::put('/contents', [ContentController::class, 'update']);
	Route::post('/contents', [ContentController::class, 'create']);
	Route::post('/contents/delete', [ContentController::class, 'destroy']);
});

Route::post('/login', [AuthController::class, 'login']);

/*TO BE IMPLEMENTED ->> */
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
/* <-- TO BE IMPLEMENTED */

Route::post('/mails/contacto', [MailController::class, 'contacto']);
// Route::post('contacto', 'MailController@contacto');

Route::get('/pages', [PageController::class,'index']);

// enviamos un id que será el id de la pagina que posee los contenidos que queremos obtener
Route::get('/contents/{id}', [ContentController::class, 'index']);
Route::get('/contents', [ContentController::class, 'index']);