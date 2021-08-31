<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Loader\Configurator\RouteConfigurator;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'Home\MainPage')
        ->name('home.mainPage');

    //USERS - ME
    Route::group([
        'prefix' => 'me',
        'as' => 'me.'
    ], function () {
        Route::get('profile', 'User\UserController@profile')
            ->name('profile');

        Route::get('edit', 'User\UserController@edit')
            ->name('edit');

        Route::post('update', 'User\UserController@update')
            ->name('update');

        Route::post('deleteProfilePicture', 'User\UserController@deleteProfilePicture')
            ->name('deleteProfilePicture');

        //listing, dodanie gry,usuniecie,ocena
        Route::get('games', 'User\GameController@list')
            ->name('games.list');

        Route::post('games', 'User\GameController@add')
            ->name('games.add');

        Route::delete('games', 'User\GameController@remove')
            ->name('games.remove');

        Route::post('games/rate', 'User\GameController@rate')
            ->name('games.rate');
    });

    //  USERS
    Route::get('users', 'UserController@list')
        ->name('get.users');

    Route::get('users/{id}', 'UserController@show')
        ->name('get.user.show');

    Route::post('users/test/{id}', 'UserController@testStore')
        ->name('get.user.test.store');

    Route::get('users/{id}/address', 'User\ShowAddress')
        ->name('get.user.address')
        ->where(['id' => '[0-9]+']);

    //  GAMES

    Route::group([
        'namespace' => 'Game',
        'prefix' => 'b/games',
        'as' => 'games.b.'

    ], function () {
        Route::get('dashboard', 'BuilderController@dashboard')
            ->name('dashboard');

        Route::get('', 'BuilderController@index')
            ->name('list');

        Route::get('{game}', 'BuilderController@show')
            ->name('show');
    });

    Route::group([
        'namespace' => 'Game',
        'prefix' => 'e/games',
        'as' => 'games.e.',

    ], function () {
        Route::get('dashboard', 'EloquentController@dashboard')
            ->name('dashboard');

        Route::get('', 'EloquentController@index')
            ->name('list');

        Route::get('{game}', 'EloquentController@show')
            ->name('show');
    });

    Route::group([
        'namespace' => 'Game',
        'prefix' => 'games',
        'as' => 'games.',

    ], function () {
        Route::get('dashboard', 'GameController@dashboard')
            ->name('dashboard');

        Route::get('', 'GameController@index')
            ->name('list');

        Route::get('{game}', 'GameController@show')
            ->name('show');
    });

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();
