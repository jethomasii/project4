@extends('layouts.master')

@section('head')

@endsection

@section('title')
    Delete Task
@endsection

@section('content')

      <h1>Delete Task:</h1>

      <form method='POST' action='/tasks/{{ $task->id }}'>
          {{ method_field('DELETE') }}

          {{ csrf_field() }}

          <p>Do you really want to delete the listed task? This action cannot be undone.</p>
          <input id='confirm-button' type='submit' value='Delete'>
      </form>

      <ul id='Tasks'>
        <li>
          <p>
            {{ $task->description }}
            <br>
            Created: {{ date('F d, Y: H:m', strtotime($task->created_at)) }}
          </p>
        </li>
      </ul>
@endsection
