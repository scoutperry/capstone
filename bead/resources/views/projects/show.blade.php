@extends('layouts/main')

@section('title')
    {{ $projectselect ? $projectselect['title'] : 'project not found' }}
@endsection

@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection

@section('content')
    <h1>{{ $projectselect['title'] }}</h1>

    <p>
        {{ $projectselect['staff_first '] }}
        {{ $projectselect['staff_last'] }}<br>
        {{ $departmentName }} <br>
        {{ $projectselect['location'] }}<br>

        {{ $projectselect['additional_staff'] }}<br>
        {{ $projectselect['estimated_cost'] }}<br>
        {{ $projectselect['additional_equip'] }}<br>
        {{ $projectselect['additional_services'] }}<br>
        {{ $projectselect['summary'] }}<br>
        {{ $projectselect['has_dependent'] }}<br>
        {{ $projectselect['depends_on'] }}<br>
        {{ $projectselect['estimated_duration'] }}<br>
        {{ $projectselect['start_date'] }}<br>
        {{ $projectselect['end_date'] }}<br>
    </p>

    <h2>{{ $projectselect['title'] . ' Evaluation' }}</h2>
    @if ($evaluations == 0)
        <p>No evaluations have been added yet...</p>
    @else
        <div id='ratings'>
            <p>
                @foreach ($evaluations as $evaluation)
                    {{ $evaluation[0] }}
                    {{ $evaluation[1] }}<br>
                @endforeach
            </p>
        </div>
    @endif

    <ul class='projectActions'>
        <li><a href='/projects/{{ $projectselect->slug }}/edit' test='edit-project-button'><i class="fa fa-edit"></i> Edit
                Project</a>
            @if ($evaluations == 0)
        <li>
            <a href='/ratings/{{ $projectselect->slug }}/add' test='evaluate-project-button'><i class="fa fa-plus"></i>
                Evaluate
                Project</a>
        </li>
    @else
        <li><a href='/ratings/{{ $projectselect->slug }}/edit' test='edit-button'><i class="fa fa-edit"></i> Edit
                Evaluation</a>
        </li>
        @endif
        {{-- <li><a href='/projects/{{ $project->slug }}/delete' test='delete-button'><i class="fa fa-trash"></i> Delete</a>
        </li> --}}
    </ul>


@endsection
