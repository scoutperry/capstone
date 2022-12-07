@extends('layouts/main')


@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection

@section('title')
    Update a Project Proposal
@endsection

@section('content')
    <h1>Update a Project Proposal</h1>
    {{-- Missing required fields --}}
    <form method='POST' action='/projects'>
        <div class='details'>* Required fields</div>

        {{ csrf_field() }}

        <label for='title'>* Project Title:</label>
        <input type='text' name='title' id='title' value='{{ old('title') }}'>
        @if ($errors->get('title'))
            <div class='error'>{{ $errors->first('title') }}</div>
        @endif
        <br>
        {{-- @include('includes/error-field', ['fieldName' => 'title']) --}}

        <label for='staff_first'>* First name:</label>
        <input type='text' name='staff_first' id='staff_first' value='{{ old('staff_first') }}'>
        @if ($errors->get('staff_first'))
            <div class='error'>{{ $errors->first('staff_first') }}</div>
        @endif
        <br>
        <label for='staff_last'>* Last name:</label>
        <input type='text' name='staff_last' id='staff_last' value='{{ old('staff_last') }}'>
        @if ($errors->get('staff_last'))
            <div class='error'>{{ $errors->first('staff_last') }}</div>
        @endif
        <br>

        {{-- Hard Code --}}
        <label for='department'>* Your department:</label>
        <select id='department' name='department' value='{{ old('department') }}'>
            <option value=null> Select </option>
            <option value='Development'> Development </option>
            <option value='Finance'>Finance</option>
            <option value='DEAI'>DEAI</option>
            <option value='Curatorial'>Curatorial</option>
            <option value='Facilites'> Facilites </option>
            <option value='Education'>Education</option>
            <option value='Collections'>Collections</option>
        </select>

        {{-- <label for='department_id'>* Your department:</label>

        <select test='department-dropdown' name='department_id'>
            <option value=''>Choose one...</option>
            <select id='departments' name='departments' value='{{ old('department') }}'>
                @foreach ($departments as $department)
                    <option value='{{ $department->id }}' {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }} </option>
                @endforeach
            </select> --}}

        @if ($errors->get('department'))
            <div class='error'>{{ $errors->first('department') }}</div>
        @endif
        <br>

        <label for='location'>* Location Project takes place:</label>
        <input type='text' name='location' id='location' value='{{ old('location') }}'>
        @if ($errors->get('location'))
            <div class='error'>{{ $errors->first('location') }}</div>
        @endif
        <br>

        <label for='additional_staff'>Additional staff needed:</label>
        <input type='text' name='additional_staff' id='additional_staff' value='{{ old('additional_staff') }}'>
        @if ($errors->get('additional_staff'))
            <div class='error'>{{ $errors->first('additional_staff') }}</div>
        @endif
        <br>
        <label for='estimated_cost'>* Estimated Cost of Project:</label>
        <input type='number' id='estimated_cost' name='estimated_cost' value='{{ old('estimated_cost') }}'>
        @if ($errors->get('estimated_cost'))
            <div class='error'>{{ $errors->first('estimated_cost') }}</div>
        @endif
        <br>
        <label for='additional_equip'>Additional equipment needed:</label>
        <input type='text' name='additional_equip' id='additional_equip' value='{{ old('additional_equip') }}'>
        @if ($errors->get('additional_equip'))
            <div class='error'>{{ $errors->first('additional_equip') }}</div>
        @endif
        <br>
        <label for='additional_services'>Additional services needed:</label>
        <input type='text' name='additional_services' id='additional_services' value='{{ old('additional_services') }}'>
        @if ($errors->get('additional_services'))
            <div class='error'>{{ $errors->first('additional_services') }}</div>
        @endif
        <br>
        <label for='summary'>* Summary of project:</label>
        <input type='text' name='summary' id='summary' value='{{ old('summary') }}'>
        @if ($errors->get('summary'))
            <div class='error'>{{ $errors->first('summary') }}</div>
        @endif
        <br>
        <label for='has_dependent'>Check if project will enable other proposed projects:</label>
        <input type='checkbox' id='has_dependent' name='has_dependent' value='has_dependent'>
        @if ($errors->get('has_dependent'))
            <div class='error'>{{ $errors->first('has_dependent') }}</div>
        @endif
        <br>
        <label for='depends_on'>Check if project is dependent on another proposed project:</label>
        <input type='checkbox' id='depends_on' name='depends_on' value='depends_on'>
        @if ($errors->get('depends_on'))
            <div class='error'>{{ $errors->first('depends_on') }}</div>
        @endif
        <br>
        <label for='estimated_duration'>* Estimated Duration of project:</label>
        <input type='text' id='estimated_duration' name='estimated_duration' value='{{ old('estimated_duration') }}'>
        @if ($errors->get('estimated_duration'))
            <div class='error'>{{ $errors->first('estimated_duration') }}</div>
        @endif
        <br>
        <label for='start_date'>* Start Date:</label>
        <input type='date' id='start_date' name='start_date' value='{{ old('start_date') }}'>
        @if ($errors->get('start_date'))
            <div class='error'>{{ $errors->first('start_date') }}</div>
        @endif
        <br>
        <label for='end_date'>* End Date:</label>
        <input type='date' id='end_date' name='end_date' value='{{ old('end_date') }}'>
        @if ($errors->get('end_date'))
            <div class='error'>{{ $errors->first('end_date') }}</div>
        @endif
        <br>

        <button type='submit'>Submit</button>
    </form>
@endsection
