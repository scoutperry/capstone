<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Project;
use App\Models\Rating;
use App\Models\Department;

class RatingController extends Controller
{
    public function index()
    {
        
        $ratings = Rating::orderBy('id', 'ASC')->get();
        
        return view('ratings/index', ['ratings' => $ratings,]);

    }

    /*
    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }
    
    public function update()
    {
    }
    
    */


    public function add(Request $request, $slug) 
    {

        /*$departments = ['Select',];
        $deptColl = Department::orderBy('id')->get();
        $deptArray = ($deptColl->toArray());
        
        foreach($deptArray as $value) {
            $departments [] = array_pop($value);
        }*/
        $ratings = Rating::allMeasures();
        $departmentId = rand(1,7);
        $project = Project::findBySlug($slug);
        # TODO: Handle case where project isn’t found for the given slug    
        return view('ratings/add', [
            'project' => $project,
            'ratings' => $ratings,
            'departmentId' => $departmentId,

        ]);
    }


    public function save(Request $request, $slug)
    {
        $slug = str_replace(" ","-",(strtolower($slug)));
        $project = Project::findBySlug($slug);
        $results = array_reverse($request->all());
        array_pop($results);
        $results = array_reverse($results);
        dump($results);

        foreach($results as $x => $x_value) {
            $rating = Rating::where('handle', '=', $x)->first();
            $project->ratings()->save($rating, ['grade' => $x_value]);

        }
        return redirect('/projects')->with(['flash-alert' => 'The project ' . $project->title. ' evaluation was submitted.']);


    }
    /*

    public function update()
    {
        return view('ratings/update');
       
    }
    */

    /*public function show(Request $request, $slug)
    {
        $project = Project::findBySlug($slug);
        if (!$project) {
            return redirect('/projects')->with(['flash-alert' => 'Project not found.']);
        }
        else
        $departments = Department::latest('name')->get();
        foreach ($departments as $department) {
            if ($department['id'] == $project->department_id)
            $departmentName = $department['name'];
            }
        return view('projects/show', [
            'project' => $project,
            'departmentName' => $departmentName,

        ]);
    }*/
}
