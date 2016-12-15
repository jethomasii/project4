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
                <li class='pendingTask'>{{ $task->description }}, Complete: {{ $task->complete }}</li>
            @endforeach

            @foreach($completeTasks as $task)
                <li class='completeTask'>{{ $task->description }}, Complete: {{ $task->complete }}</li>
            @endforeach

          </ul>

    @endif

@endsection
