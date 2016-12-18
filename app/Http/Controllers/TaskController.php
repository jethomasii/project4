<?php

namespace project4\Http\Controllers;

use Illuminate\Http\Request;
use project4\Http\Requests;
use project4\Task;
use Session;

class TaskController extends Controller
{
    //

    /*
     * getTasks
     * @param $request
     * returns $tasks (all tasks)
     * returns $completeTasks (tasks marked complete)
     * returns $pendingTasks (tasks not marked complete)
     */

    public function getTasks(Request $request) {

      $user = $request->user();

      if($user) {
          // load tasks for the user.
          $tasks = Task::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();

      }
      else {
          $tasks = [];
      }

      $completeTasks = [];
      $pendingTasks = [];

      foreach ($tasks as $task) {
        if ($task->complete) {
          array_push ($completeTasks, $task);
        }
        else {
          array_push ($pendingTasks, $task);
        }
      }

      if ($request->is('tasks/pending')) {
          return view('task.pending')->with([
            'pendingTasks' => $pendingTasks,
          ]);
      }
      elseif ($request->is('tasks/complete')) {
          return view('task.complete')->with([
            'completeTasks' => $completeTasks,
          ]);
      }
      else {
        return view('task.all')->with([
            'tasks' => $tasks,
            'completeTasks' => $completeTasks,
            'pendingTasks' => $pendingTasks,
        ]);
      }

    }

    /*
     * make - form to make a new task
     */
    public function make() {
      return view('task.make');
    }

    /*
     * save - saves a task mad with make
     */
    public function save(Request $request) {
      # Validate
      $this->validate($request, [
        'description' => 'required|min:1',
      ]);

      $task = new Task();
      $task->description = $request->input('description');
      $task->user_id = $request->user()->id;

      if($request->complete) {
        $task->complete = 1;
      }
      else { $task->complete= 0; }


      $task->save();

      Session::flash('flash_message', 'Added Task: '.$task->description);

      return redirect('/tasks');
    }

    /*
     * edit - presents form to update a task
     */
    public function edit($id) {

      $task = Task::find($id);

      if(is_null($task)) {
        Session::flash('flash_message', 'Unable to locate task');
        return redirect('/tasks');
      }

      return view('task.edit')->with([
        'task' => $task,
      ]);
    }

    /*
     * update - stores information from Edit
     */
    public function update(Request $request) {

      $this->validate($request, [
        'description' => 'required|min:1',
      ]);

      $task = Task::find($request->id);

      if(is_null($task)) {
        Session::flash('flash_message', 'Unable to locate task');
        return redirect('/tasks');
      }

      $task->description = $request->description;

      if($request->complete) {
        $task->complete = 1;
      }

      $task->save();

      Session::flash('flash_message', 'Updated Task!');
      return redirect('/tasks');

    }

    /*
     * markComplete - confirms a task will be marked complete
     */
    public function markComplete($id) {
      return view('task.markComplete');
    }

    /*
     * delete - confirms deletion before purge
     */
    public function delete($id) {

      $task = Task::find($id);

      return view('task.delete')->with([
        'task' => $task,
      ]);
    }

    /*
     * purge - removes item from tasks Database
     */
    public function purge($id) {

      // Locate the task
      $task = Task::find($id);

      // Splash if not found
      if (is_null($task)) {
        Session::flash('message_flash', 'Unable to locate task');
        return redirect('/tasks');
      }

      // Delete $task
      $task->delete();

      // Tell the world
      Session::flash('flash_message', 'Deleted Task: '.$task->descrition);
      return redirect('/tasks');
    }
}
