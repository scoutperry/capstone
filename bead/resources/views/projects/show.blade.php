@extends('layouts/main')

@section('title')
    {{ $project ? $project['title'] : 'project not found' }}
@endsection

@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection

@section('content')
    <h1>{{ $project['title'] }}</h1>

    <p>
        Details about this project will go here...
    </p>
@endsection
