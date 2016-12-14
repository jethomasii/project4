<?php

namespace project4\Http\Controllers;

use Illuminate\Http\Request;
use project4\Http\Requests;
use project4\Task;

class TaskController extends Controller
{
    //

    public function index(Request $request) {

      $user = $request->user();

      if($user) {
          // load tasks for the user.
          $tasks = Task::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();

      }
      else {
          $tasks = [];
      }

      return view('task.index')->with([
          'tasks' => $tasks
      ]);
    }
}
