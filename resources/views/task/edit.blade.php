@extends('layouts.master')

@section('head')

@endsection

@section('title')
    Edit Task
@endsection

@section('content')

    <h2>Edit task:</h2>

    <form method='POST' action='/tasks/{{ $task->id }}'>

      {{ method_field('PUT') }}

      {{ csrf_field() }}

      <div class='form-group'>
        <label>Description</label>
          <input
              type='text'
              id='description'
              name='description'
              value='{{ old('description', $task->description) }}'
          >
          <div class='error'>{{ $errors->first('description') }}</div>
      </div>

      <div class='form-group'>
        <label>Complete</label>
          <input
              type='checkbox'
              id='complete'
              name='complete'
              value='off'
          >
      </div>

      <button type='submint'>Update this task</button>

      {{--
        <ul class''>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      --}}

    </form>


@endsection
