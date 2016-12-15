@extends('layouts.master')

@section('head')

@endsection

@section('title')
    All Tasks
@endsection

@section('content')

    <h1>All Tasks:</h1>

    @if(sizeof($tasks) == 0)
        You have not added any tasks, go <a href='/tasks/create'>here</a> to get started.
    @else

          <ul id='Tasks'>

            @foreach($pendingTasks as $task)
                <li class='pendingTask'>
                  <p>
                    {{ $task->description }}
                    <br>
                    Created: {{ date('F d, Y: H:m', strtotime($task->created_at)) }}
                  </p>
                  <a class='button' href='/task{{ $task->id }}/edit'>Edit</a>
                  <a class='button' href='/task/{{ $task->id }}/mark-complete'>Mark as Complete</a>
                  <a class='button' href='/task/{{ $task->id }}delete'>Delete</a>
                </li>
            @endforeach

            @foreach($completeTasks as $task)
                <li class='completeTask'>
                  <p>
                    {{ $task->description }}
                    <br>
                    Created: {{ date('F d, Y: H:m', strtotime($task->created_at)) }},
                    Completed: {{ date('F d, Y: H:m', strtotime($task->updated_at)) }}
                  </p>
                  <a class='button' href='/task/{{ $task->id }}/delete'>Delete</a>
                </li>
            @endforeach

          </ul>

    @endif

@endsection
