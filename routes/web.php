<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Loader\Configurator\RouteConfigurator;

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

Route::get('/', 'Home\MainPage')
    ->name('home.mainPage');

Route::get('users', 'UserController@list')
    ->name('get.users');

//Route::get('users/{id}', 'User\ProfilController@show')
// ->name('get.user.profile');

Route::get('users/{id}', 'UserController@show')
    ->name('get.user.show');

Route::post('users/test/{id}', 'UserController@testStore')
    ->name('get.user.test.store');

Route::get('users/{id}/address', 'User\ShowAddress')
    ->name('get.user.address')
    ->where(['id' => '[0-9]+']);


Route::get('games/dashboard', 'GameController@dashboard')
    ->name('games.dashboard');

Route::resource('games', 'GameController')
    ->only([
        'index', 'show'
    ]);


Route::resource('admin/games', 'GameController')
    ->only([
        'store', 'create', 'destroy'
    ]);
