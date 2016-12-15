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
 # Main tasks page show all, show all the tasks
Route::get('/tasks', 'TaskController@getTasks')->name('tasks.getTasks')->middleware('auth');
# Pending tasks page, show just pending, pass same tasks cause screw making bunch of different ones.
Route::get('/tasks/pending', 'TaskController@getTasks')->name('tasks.getTasks')->middleware('auth');
# Same thing for complete
Route::get('/tasks/complete', 'TaskController@getTasks')->name('tasks.getTasks')->middleware('auth');


Route::get('/', 'PageController@welcome');

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index');
