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
        {{ csrf_field() }}

        <label for='title'>Project Title:</label>
        <input type='text' name='title' id='title'><br>

        <label for='staff_first'>First name:</label>
        <input type='text' name='staff_first' id='staff_first'><br>

        <label for='staff_last'>Last name:</label>
        <input type='text' name='staff_last' id='staff_last'><br>

        <label for='dept'>Your department:</label>
        <input type='text' name='dept' id='dept'><br>

        <label for='location'>Location Project takes place:</label>
        <input type='text' name='location' id='location'><br>

        <label for='addl_staff'>Additional staff needed:</label>
        <input type='text' name='addl_staff' id='addl_staff'><br>

        <label for='estimated_cost'>Estimated Cost of Project:</label>
        <input type="number" id="estimated_cost" name="estimated_cost"><br>

        <label for='addl_equip'>Additional equipment needed:</label>
        <input type='text' name='addl_equip' id='addl_equip'><br>

        <label for='addl_services'> Additional services needed:</label>
        <input type='text' name='addl_services' id='addl_services'><br>

        <label for='summary'> Summary of project:</label>
        <input type='text' name='summary' id='summary'><br>

        <label for='has_dependent'> Check if project will enable other proposed projects:</label>
        <input type="checkbox" id="has_dependent" name="has_dependent" value="has_dependent"><br>

        <label for='depends_on'> Check if project is dependent on another proposed project:</label>
        <input type="checkbox" id="depends_on" name="depends_on" value="depends_on"><br>

        <label for="est_duration">Estimated Duration of project:</label>
        <input type="text" id="est_duration" name="est_duration"><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date"><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date"><br>

        <button type='submit'>Submit</button>
    </form>
@endsection
