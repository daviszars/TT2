<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieFollowController;

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

Route::get('/', [MovieController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'is_admin'], function() {
        Route::resource('cinema', MovieController::class, ['only' => [
            'edit', 'create', 'store', 'update', 'destroy']]);
    });
});

Route::resource('cinema', MovieController::class, ['except' => [
    'edit', 'create', 'store', 'update', 'destroy'
]]);

Route::get('/movies' , [MovieController::class, 'showMovies']);
Route::get('/tvshows' , [MovieController::class, 'showTvshows']);

Route::post('/cinema/{movie}/follows', [MovieFollowController::class, 'store'])->name('movies.follows');
Route::delete('/cinema/{movie}/follows', [MovieFollowController::class, 'destroy'])->name('movies.follows');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');