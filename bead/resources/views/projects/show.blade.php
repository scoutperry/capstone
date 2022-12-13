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


    <h4>Project Summary:</h4>
    <p>{{ $project['summary'] }}<br></p>
    <h4>Proposed site location:</h4>
    <p>{{ $project['location'] }}<br></p>
    <h4>Any Additional Staff Required?</h4>
    <p>{{ $project['additional_staff'] }}<br></p>
    <h4>Any Additional Equip Required?</h4>
    <p>{{ $project['additional_equip'] }}<br></p>
    <h4>Any Additional Services Required?</h4>
    <p>{{ $project['additional_services'] }}<br></p>

    <h4>Estimated Cost:</h4>
    <p>{{ $project['estimated_cost'] }}<br></p>

    <h4>Does the completion of this project enable another project to begin?</h4>
    <p>{{ $project['has_dependent'] }}<br></p>
    <h4>Does this project depend on another project to be completed?</h4>
    <p>{{ $project['depends_on'] }}<br></p>

    <h4>Estimated Duration of this project:</h4>
    <p>{{ $project['estimated_duration'] }}<br></p>
    <h4>Proposed Start Date:</h4>
    <p>{{ $project['start_date'] }}<br></p>
    <h4>Proposed End Data:</h4>
    <p>{{ $project['end_date'] }}<br></p>
    <h4>Staff Contact:</h4>
    <p>{{ $project['staff_first'] }} {{ $project['staff_last'] }}<br>
        <br>
        {{ $departmentName }} <br>
    </p>

    <h2>{{ $project['title'] . ' Evaluation' }}</h2>
    @if ($evaluations == 0)
        <p>No evaluations have been added yet...</p>
    @else
        <div id='ratings'>
            <p>
                @foreach ($evaluations as $evaluation)
                    <h5> {{ $evaluation[0] }}:</h5>
                    <p> {{ $evaluation[1] }}<br></p>
                @endforeach
            </p>
        </div>
    @endif

    <ul class='projectActions'>
        <li><a href='/projects/{{ $project->slug }}/edit' test='edit-project-button'><i class="fa fa-edit"></i> Edit
                Project</a>
            @if ($evaluations == 0)
        <li>
            <a href='/ratings/{{ $project->slug }}/add' test='evaluate-project-button'><i class="fa fa-plus"></i>
                Evaluate
                Project</a>
        </li>
    @else
        <li><a href='/ratings/{{ $project->slug }}/edit' test='edit-button'><i class="fa fa-edit"></i> Edit
                Evaluation</a>
        </li>
        @endif
        {{-- <li><a href='/projects/{{ $project->slug }}/delete' test='delete-button'><i class="fa fa-trash"></i> Delete</a>
        </li> --}}
    </ul>


@endsection
