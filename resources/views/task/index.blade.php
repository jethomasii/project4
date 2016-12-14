@extends('layouts.master')

@section('head')

@endsection

@section('title')
    View all Tasks
@endsection

@section('content')

    <h1>Your Tasks</h1>

    @if(sizeof($tasks) == 0)
        You have not added any tasks, go <a href='/tasks/create'>here</a> to get started.
    @else
        <div id='tasks' class='cf'>

            <h2>Complete:</h2>

            @foreach($completeTasks as $task)

                <section class='task'>
                    <p>{{ $task->description }}, Complete: {{ $task->complete }}</p>
                </section>
            @endforeach

            <h2>Incomplete:</h2>

            @foreach($pendingTasks as $task)

                <section class='task'>
                    <p>{{ $task->description }}, Complete: {{ $task->complete }}</p>
                </section>
            @endforeach
        </div>
    @endif

@endsection
