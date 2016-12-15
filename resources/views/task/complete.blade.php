@extends('layouts.master')

@section('head')

@endsection

@section('title')
    Complete Tasks
@endsection

@section('content')

    <h1>Complete Tasks:</h1>

    @if(sizeof($completeTasks) == 0)
        You do not have any complete tasks.
    @else

          <ul id='Tasks'>

            @foreach($completeTasks as $task)
                <li>{{ $task->description }}, Complete: {{ $task->complete }}</li>
            @endforeach

          </ul>

    @endif

@endsection
