@extends('layouts/main')


@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection

@section('title')
    Add a Project Proposal
@endsection

@section('content')
    <h1>Add a Project Proposal</h1>
    {{-- Missing required fields --}}
    <form method='POST' action='/projects'>
        <div class='details'>* Required fields</div>

        {{ csrf_field() }}

        <label for='title'>* Project Title:</label>
        <input type='text' name='title' id='title' value='{{ old('title') }}'>
        {{-- @include('includes/error-field', ['fieldName' => 'title']) --}}
        <br>

        <label for='staff_first'>* First name:</label>
        <input type='text' name='staff_first' id='staff_first' value='{{ old('staff_first') }}'><br>

        <label for='staff_last'>* Last name:</label>
        <input type='text' name='staff_last' id='staff_last' value='{{ old('staff_last') }}'><br>

        <label for='department'>* Your department:</label>
        <input type='text' name='department' id='department' value='{{ old('department') }}'><br>

        <label for='location'>* Location Project takes place:</label>
        <input type='text' name='location' id='location' value='{{ old('location') }}'><br>

        <label for='additional_staff'>Additional staff needed:</label>
        <input type='text' name='additional_staff' id='additional_staff' value='{{ old('additional_staff') }}'><br>

        <label for='estimated_cost'>* Estimated Cost of Project:</label>
        <input type='number' id='estimated_cost' name='estimated_cost' value='{{ old('estimated_cost') }}'><br>

        <label for='additional_equip'>Additional equipment needed:</label>
        <input type='text' name='additional_equip' id='additional_equip' value='{{ old('additional_equip') }}'><br>

        <label for='additional_services'>Additional services needed:</label>
        <input type='text' name='additional_services' id='additional_services'
            value='{{ old('additional_services') }}'><br>

        <label for='summary'>* Summary of project:</label>
        <input type='text' name='summary' id='summary' value='{{ old('summary') }}'><br>

        <label for='has_dependent'>Check if project will enable other proposed projects:</label>
        <input type='checkbox' id='has_dependent' name='has_dependent' value='has_dependent'><br>

        <label for='depends_on'>Check if project is dependent on another proposed project:</label>
        <input type='checkbox' id='depends_on' name='depends_on' value='depends_on'><br>

        <label for='estimated_duration'>* Estimated Duration of project:</label>
        <input type='text' id='estimated_duration' name='estimated_duration'
            value='{{ old('estimated_duration') }}'><br>

        <label for='start_date'>* Start Date:</label>
        <input type='date' id='start_date' name='start_date' value='{{ old('start_date') }}'><br>

        <label for='end_date'>* End Date:</label>
        <input type='date' id='end_date' name='end_date' value='{{ old('end_date') }}'><br>

        <button type='submit'>Submit</button>
    </form>
@endsection
