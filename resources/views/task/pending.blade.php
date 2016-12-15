@extends('layouts.master')

@section('head')

@endsection

@section('title')
    Pending Tasks
@endsection

@section('content')

    <h1>Pending Tasks:</h1>

    @if(sizeof($pendingTasks) == 0)
        You do not have any pending tasks.
    @else

          <ul id='Tasks'>

            @foreach($pendingTasks as $task)
              <li>
                <p>
                  {{ $task->description }}
                  <br>
                  Created: {{ date('F d, Y: H:m', strtotime($task->created_at)) }}
                </p>
                <a class='button' href='/task/{{ $task->id }}/edit'>Edit</a>
                <a class='button' href='/task/{{ $task->id }}/mark-complete'>Mark as Complete</a>
                <a class='button' href='/task/{{ $task->id }}/delete'>Delete</a>
              </li>
            @endforeach

          </ul>

    @endif

@endsection
