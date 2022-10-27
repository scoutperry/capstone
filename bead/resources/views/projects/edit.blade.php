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

    <form method='POST' action='/projects'>
        {{ csrf_field() }}

        <label for='title'>Project Title:</label>
        <input type='text' name='title' id='title'>

        <label for='staffMember'>Your name:</label>
        <input type='text' name='staffMember' id='staffMember'>

        <label for='dept'>Your department:</label>
        <input type='text' name='dept' id='dept'>

        <label for='location'>Location Project takes place:</label>
        <input type='text' name='location' id='location'>

        <label for='addStaff'>Additional staff needed:</label>
        <input type='text' name='addStaff' id='addStaff'>

        <label for='estimatedCost'>Estimated Cost of Project:</label>
        <input type="number" id="estimatedCost" name="estimatedCost">

        <label for='addlEquip'>Additional equipment needed:</label>
        <input type='text' name='addlEquip' id='addlEquip'>

        <label for='addlServices'> Additional services needed:</label>
        <input type='text' name='addlServices' id='addlServices'>

        <label for='summary'> Summary of project:</label>
        <input type='text' name='summary' id='summary'>

        <label for='hasDependent'> Check if project will enable other proposed projects:</label>
        <input type="checkbox" id="hasDependent" name="hasDependent" value="hasDependent">

        <label for='isDependent'> Check if project is dependent on another proposed project:</label>
        <input type="checkbox" id="hasDependent" name="hasDependent" value="hasDependent">

        <label for="estDuration">Estimated Duration of project:</label>
        <input type="text" id="estDuration" name="estDuration">

        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate">

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate">


        <button type='submit'>Submit</button>
    </form>
@endsection
