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
