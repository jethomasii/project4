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
# Form to make a task route
Route::get('/tasks/make', 'TaskController@make')->name('tasks.makeTask')->middleware('auth');
# Process make a task Form
Route::post('/tasks', 'TaskController@save')->name('tasks.saveTask');
# Form to Edit a task
Route::get('/tasks/{id}/edit', 'TaskController@edit')->name('tasks.edit');
# Actually edit a task
Route::put('/tasks/{id}', 'TaskController@update')->name('tasks.update');
# Confirm mark completeTask
Route::get('/tasks/{id}/mark-complete', 'TaskController@markComplete')->name('tasks.markComplete');
# Confirm Delete
Route::get('/tasks/{id}/delete', 'TaskController@delete')->name('tasks.delete');
# Delete
Route::delete('/tasks/{id}', 'TaskController@purge')->name('tasks.purge');



Route::get('/', 'PageController@welcome');

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');
