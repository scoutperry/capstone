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
        {{ $project['staff_first'] }}<br>
        {{ $project['staff_last'] }}<br>
        {{ $project['department'] }}<br>
        {{ $project['location'] }}<br>
        {{ $project['additional_staff'] }}<br>
        {{ $project['estimated_cost'] }}<br>
        {{ $project['additional_equip'] }}<br>
        {{ $project['additional_services'] }}<br>
        {{ $project['summary'] }}<br>
        {{ $project['has_dependent'] }}<br>
        {{ $project['depends_on'] }}<br>
        {{ $project['estimated_duration'] }}<br>
        {{ $project['start_date'] }}<br>
        {{ $project['end_date'] }}<br>
    </p>
@endsection
