<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', 'HelloController@hello');

Route::get('/goodbye/{name}', function (string $name) {
    return 'Goodbye: ' . $name;
});

// Route::get('/example', function () {
//     return 'To jest get';
// });
$uri = '/example';
Route::get($uri, 'ExampleController@getAction');
Route::post($uri, 'ExampleController@postAction');
Route::put($uri, 'ExampleController@putAction');
Route::patch($uri, 'ExampleController@patchAction');
Route::delete($uri, 'ExampleController@deleteAction');
Route::options($uri, 'ExampleController@optionsAction');

Route::match(['get', 'post'], '/match', function () {
    return 'To jest match i post';
});

Route::any('/all', fn () => 'Wszystkie metody');
//Wyświetlanie widoku z ominięcniem kontrolera
Route::view('/view/route', 'route.view');
Route::view(
    '/view/route/var1',
    'route.viewParam',
    ['param1' => 'var1 - nasza dana', 'name' => 'Kewin']
);

Route::get('posts/{postId}', function (int $postId) {
    var_dump($postId);
    dd($postId);
});

//Route::get('users/{nick?}', function (string $nick = null) {
// Route::get('users/{nick?}', function (string $nick = "Pusty") {
//     dd($nick);
// });


//nakładnie reguł na parametry
Route::get('users/{nick}', function (string $nick) {
    dump($nick);
})->where(['nick' => '[a-z]+']);

Route::get('elements', function () {
    return 'Items';
})->name('shop.items');

Route::get('elements/{id}', function (int $id) {
    return 'Element: ' . $id;
})->name('shop.item.single');

// Route::get('example', function () {
//     $url = route('shop.item.single', ['id' => 4444]);
//     dump($url);
// });
