@extends('layouts.master')

@section('head')

@endsection

@section('title')
    Make a Task
@endsection

@section('content')

    <h2>Make a task:</h2>

    <form method='POST' action='/tasks'>

      {{ csrf_field() }}

      <div class='form-group'>
        <label>Description</label>
          <input
              type='text'
              id='description'
              name='description'
              value='{{ old('description', 'Things to do') }}'
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

      <button type='submint'>Make this task</button>

      {{--
        <ul class''>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      --}}

    </form>

@endsection
