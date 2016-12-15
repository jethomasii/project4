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
                <li>
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
