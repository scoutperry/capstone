<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Project;
use App\Models\Rating;
use App\Models\Department;

class ProjectController extends Controller
{
    public function index()
    {
        
        $projects = Project::orderBy('title', 'ASC')->get();
        
        return view('projects/index', ['projects' => $projects,]);

    }

/**
* GET /projects/create
* Display the form to add a new project
*/
    public function create(Request $request) 
    {
        #for a departments dropdown
        $departments = Department::getForDropdown();
        return view('projects/create', ['departments' => $departments]);

        /*$departments = ['Select',];
        $deptColl = Department::orderBy('id')->get();
        $deptArray = ($deptColl->toArray());

        foreach($deptArray as $value) {
            $departments [] = array_pop($value);
        }*/

        return view('projects/create', [
            'departments' => $departments,
        ]);

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
            'staff_first' => 'required',
            'staff_last' => 'required',
            //'slug' => 'required|unique:books,slug,alpha_dash',
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

        #Turn department name into department_id
        $department = Department::findByName($request->department);
        $department_id = $department->id;

        # Instantiate a new Project Model object
        $project = new Project();
        
        $project->slug = str_replace(" ","-",(strtolower($request->title)));
        $project->title = $request->title;
        $project->staff_first = $request->staff_first;
        $project->staff_last = $request->staff_last;
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
        $project->department_id = $department_id;
        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $project->save();

        return redirect('/projects/create')->with(['flash-alert' => 'Your project was added!']);
        
    }


    public function show(Request $request, $slug)
    {
        #Incorporate ratings with project
        $results = Project::with('ratings')->get();
        $evaluations = [];
        $project = 0;
        foreach ($results as $result) {
            if ($result->slug == $slug) {
                $project = $result;
            }
        };
        if (!$project) {
            return redirect('/projects')->with(['flash-alert' => 'Project not found.']);
        }else{
            if ($project->ratings->count() == 0){
                $department = Department::findById($project->department_id);
                $departmentName = $department->name;
                $evaluations = 0;

                return view('projects/show', [
                    'project' => $project,
                    'departmentName' => $departmentName,

                    'evaluations' => $evaluations,

                ]);
            }else{
                $department = Department::findById($project->department_id);
                $departmentName = $department->name;
                foreach ($project->ratings as $rating) {
                    $ratingArray = [
                        $rating->measure,
                        $rating->pivot->grade
                        ];
                    array_push($evaluations, $ratingArray);
                }
                return view('projects/show', [
                    'project' => $project,
                    'departmentName' => $departmentName,
                    'evaluations' => $evaluations,
                ]);                                    
            }
        }
    }

    public function edit(Request $request, $slug)
    {
        $project = Project::where('slug', '=', $slug)->first();
        $departments = Department::getForDropdown();

        if (!$project) {
            return redirect('/projects')->with(['flash-alert' => 'Project not found.']);
        }

        return view('projects/edit', [
            'project' => $project,
            'departments' => $departments
        ]);
    }
    /**
    * PUT /books
    */
    public function update(Request $request, $slug)
    {
        $project = Project::where('slug', '=', $slug)->first();

        $request->validate([
            'title' => 'required',
            'staff_first' => 'required',
            'staff_last' => 'required',
            //'slug' => 'required|unique:books,slug,' . $book->id . '|alpha_dash',
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

    $project->slug = str_replace(" ","-",(strtolower($request->title)));
    $project->title = $request->title;
    $project->staff_first = $request->staff_first;
    $project->staff_last = $request->staff_last;
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
    $project->department_id = $department_id;
        $project->save();

        return redirect('/projects/'.$slug.'/edit')->with(['flash-alert' => 'Your changes were saved.']);
    }

}
