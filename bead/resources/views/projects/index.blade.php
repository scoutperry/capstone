@extends('layouts/main')


@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection

@section('content')
    <h1>All Projects</h1>



    @if (count($projects) == 0)
        No projects have been added yet...
    @else
        <div id='projects'>
            @foreach ($projects as $project)
                <a class='project' href='/projects/{{ $project->slug }}'>
                    <h3>{{ $project['title'] }}</h3>
                </a>
                </a>
            @endforeach
        </div>
    @endif
@endsection
