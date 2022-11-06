<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    public function index()
    {
        
        $projects = Project::orderBy('title', 'ASC')->get();
        
        return view('projects/index', ['projects' => $projects,]);
        
        
        # TODO: Query the database for all the projects;
        //return 'Here are all of the projects...';
    }

/**
* GET /projects/create
* Display the form to add a new project
*/
    public function create(Request $request) 
    {
        return view('projects/create');
    }

    public function store(Request $request) 
    {

       # Validate the request data
       # The `$request->validate` method takes an array of data 
       # where the keys are form inputs
       # and the values are validation rules to apply to those inputs

       #Review validation for additional values

       $request->validate([

            'title' => 'required',
            //'slug' => 'required',
            'staff_first' => 'required',
            'staff_last' => 'required',
            'department' => 'required',
            'location' => 'required',
            'additional_staff' => '',
            'estimated_cost' => 'required|numeric',
            'additional_equip' => '',
            'additional_services' => '',
            'summary' => 'required',
            'has_dependent' => '',
            'depends_on' => '',
            'estimated_duration' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'


        ]);

 # Note: If validation fails, it will automatically redirect the visitor back to the form page
 # and none of the code that follows will execute.

        //$slug = str_replace(" ","-",(strtolower($request->title)));

        # Instantiate a new Book Model object
        $project = new Project();
        
        $project->slug = str_replace(" ","-",(strtolower($request->title)));
        $project->title = $request->title;
        $project->staff_first = $request->staff_first;
        $project->staff_last = $request->staff_last;
        $project->department = $request->department;
        $project->location = $request->location;
        $project->additional_staff = $request->additional_staff;
        $project->estimated_cost = $request->estimated_cost;
        $project->additional_equip = $request->additional_equip;
        $project->additional_services = $request->additional_services;
        $project->summary = $request->summary;
        $project->has_dependent = $request->has_dependent;
        $project->depends_on = $request->depends_on;
        $project->estimated_duration = $request->estimated_duration;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $project->save();

        # Confirm results
        dump('Added: ' . $project->title);
        dump(Project::all()->toArray());
        
        //return redirect('/projects/create')->with(['flash-alert' => 'Your project was added!']);
        
    }


    public function show($title)
    {

        return view('projects/show', [
        'title' => $title
        ]); 
        
        /*
        # TODO define 'findBySlug

        $project = Project::findBySlug($slug);
        if (!$project) {

            return redirect('/projects')->with(['flash-alert' => 'Project not found.']);
        }
        //$onList = $Project->users()->where('user_id', $request->user()->id)->count() >= 1;
        else
        return view('projects/show', [
            'project' => $project,
            //'onList' => $onList

        ]);*/
    }

}
