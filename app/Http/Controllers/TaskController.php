<?php

namespace project4\Http\Controllers;

use Illuminate\Http\Request;
use project4\Http\Requests;
use project4\Task;

class TaskController extends Controller
{
    //

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
        return view('task.index')->with([
            'tasks' => $tasks,
            'completeTasks' => $completeTasks,
            'pendingTasks' => $pendingTasks,
        ]);
      }

    }
}
