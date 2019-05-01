<?php
use Illuminate\Http\Request;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::resource('/project','ProjectController');
Route::resource('/post','PostController');
Route::resource('/tag','TagController');
Route::resource('/language','LanguageController');
Route::resource('/user','UserController');
Route::resource('/file','FileController');


Route::get('/phpinfo',function(){
    dd(phpinfo());
});
Route::get('/search/{query}', 'AjaxController@search');
Route::get('/storePostComment','AjaxController@storePostComment');
Route::get('/file/{id}/delete','AjaxController@deleteFile');
Route::get('/post/{id}/delete','AjaxController@deletePost');
Route::get('/comment/{id}/delete','AjaxController@deleteComment');


Route::get('/test',function(){
    $user = App\User::find(1);
return $user->toJson(JSON_PRETTY_PRINT);
});

Route::get('/send/mail','HomeController@mail');

Auth::routes(['verify' => true]);
