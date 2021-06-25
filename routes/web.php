<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MovieController;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [PagesController::class, 'index']);

// Route::get('/movies', [PagesController::class, 'movies']);
// Route::get('/tvshows', [PagesController::class, 'tvshows']);

// Route::resource('/cinema' , MovieController::class);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'is_admin'], function() {
        Route::resource('cinema', MovieController::class, ['only' => [
            'edit', 'create', 'store', 'update', 'destroy'
        ]]);
});

Route::resource('cinema', MovieController::class, ['except' => [
    'edit', 'create', 'store', 'update', 'destroy'
]]);

Route::get('/movies' , 'App\Http\Controllers\MovieController@showMovies');
Route::get('/tvshows' , 'App\Http\Controllers\MovieController@showTvshows');

// Route::post('/cinema/create', array('uses' => 'App\Http\Controllers\MovieController@store'));

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});