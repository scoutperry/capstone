@extends('layouts/main')


@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection

@section('content')
    <h1>Department Rubric</h1>

    @if (count($ratings) == 0)
        No criteria has been added yet...
    @else
        <div id='ratings'>
            @foreach ($ratings as $rating)
                {{-- Might change this into a mini update/delete form for each criteria --}}
                <a class='rating' href='/rating/{{ $rating->handle }}'>
                    <h3>{{ $rating['measure'] }}</h3>
                </a>
            @endforeach
        </div>
    @endif
@endsection
