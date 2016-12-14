<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*Route::get('/', function () {
    return view('welcome');
});
*/

/*
 * Task routes
 */
 # Index, show all the tasks
Route::get('/tasks', 'TaskController@index')->name('tasks.index')->middleware('auth');


Route::get('/', 'PageController@welcome');

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index');
