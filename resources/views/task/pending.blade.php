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
                <li>{{ $task->description }}, Complete: {{ $task->complete }}</li>
            @endforeach

          </ul>

    @endif

@endsection
