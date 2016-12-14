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
            @foreach($tasks as $task)

                <section class='task'>
                    <a href='/books/{{ $book->id }}'><h2 class='truncate'>{{ $book->title }}</h2></a>

                    <h3 class='truncate'>{{ $book->author->first_name }} {{ $book->author->last_name }}</h3>

                    <a href='/books/{{ $book->id }}'><img class='cover' src='{{ $book->cover }}' alt='Cover for {{ $book->title }}'></a>

                    <div class='tags'>
                        @foreach($book->tags as $tag)
                            <div class='tag'>{{ $tag->name }}</div>
                        @endforeach
                    </div>

                    <a class='button' href='/books/{{ $book->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
                    <a class='button' href='/books/{{ $book->id }}'><i class='fa fa-eye'></i> View</a>
                    <a class='button' href='/books/{{ $book->id }}/delete'><i class='fa fa-trash'></i> Delete</a>
                </section>
            @endforeach
        </div>
    @endif

@endsection
