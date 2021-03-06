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

      // Recover the task.
      $task = Task::find($id);

      // Verify it's actually recovered
      if(is_null($task)) {
        Session::flash('flash_message', 'Unable to locate task');
        return redirect('/tasks');
      }

      // Return recovered task to view.
      return view('task.edit')->with([
        'task' => $task,
      ]);
    }

    /*
     * update - stores information from Edit
     */
    public function update(Request $request) {

      // Validate the request actually has a description.
      $this->validate($request, [
        'description' => 'required|min:1',
      ]);

      // Pull the original task.
      $task = Task::find($request->id);

      // Verify it was pulled.
      if(is_null($task)) {
        Session::flash('flash_message', 'Unable to locate task');
        return redirect('/tasks');
      }

      // Set the description on the new task object.
      $task->description = $request->description;

      // Set complete if necessary.
      if($request->complete) {
        $task->complete = 1;
      }

      // Save new task to old.
      $task->save();

      // Return to taks list, let the user know.
      Session::flash('flash_message', 'Updated Task!');
      return redirect('/tasks');

    }

    /*
     * markComplete - confirms a task will be marked complete
     */
    public function markComplete($id) {

      // Recover the task.
      $task = Task::find($id);

      // Verify it's actually recovered
      if(is_null($task)) {
        Session::flash('flash_message', 'Unable to locate task');
        return redirect('/tasks');
      }

      // Mark complete
      $task->complete = 1;

      // save
      $task->save();

      // Let the user know, get on with it.
      Session::flash('flash_message', 'Completed: '.$task->description);
      return redirect('/tasks');
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
      Session::flash('flash_message', 'Deleted Task: '.$task->description);
      return redirect('/tasks');
    }
}
