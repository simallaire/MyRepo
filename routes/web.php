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

Route::get('/project/main/{name}',function($name){
	return view('project.main.'.$name);
});


Route::get('/phpinfo',function(){
    dd(phpinfo());
});
Route::get('/search/{query}', 'AjaxController@search');
