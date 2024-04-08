<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CulturesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ParcellesController;
use App\Http\Controllers\RecoltesController;
use App\Http\Controllers\DechetsController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\ChiffresController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('layout');
// });


/*----------------------- Pages Route ------------------------*/

Route::group(['middleware' => ['auth']], function () {
    Route::resource('Recolte', RecoltesController::class);
    Route::resource('Culture', CulturesController::class);
    Route::resource('Client', ClientsController::class);
    Route::resource('Parcelle', ParcellesController::class);
    Route::resource('Dechet', DechetsController::class);
    Route::resource('Export', ExportsController::class);
    Route::resource('Chiffre-d-Affaires', ChiffresController::class);
    Route::resource('Statistique', StatistiquesController::class);
    Route::resource('Utilisateur', UsersController::class);
    Route::resource('Profile', ProfileController::class);

    
});


Auth::routes();

Route::get('/', [DashboardController::class, 'index']);
Route::get('logout', [LoginController::class, 'logout']);