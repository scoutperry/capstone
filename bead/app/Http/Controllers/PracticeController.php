<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Rating;
use App\Models\Department;

use Faker\Factory; # library to generate random/fake data


class PracticeController extends Controller
{
    public function practiceX()
    {
        dump(\DB::select('SHOW DATABASES;'));
    } 

    public function practice()
    {
       # Get all rows
        $result = Project::all();
        dump($result->toArray());
    } 
    
    public function practice1()
    {
        # Get a row by id
        $result = Project::find(1);
        dump($result);
    }

    public function practice3()
    {
       # Throw an exception if the lookup fails
       $result = Project::findOrFail(9999);
       dump($result->toArray());
    }

    public function practice4()
    {
        # Get all rows with a `where` constraint using fuzzy matching
        $result = Project::where('title', 'LIKE', '%nile%')->get();
        dump($result->toArray());
    }

    public function practice5()
    {
        # Get all rows with a `where` constraint using exact matching
        $result = Project::where('title', '=', 'Jewels of the Nile')->get();
        dump($result->toArray());
    }

    public function practice6()
    {
        # Get rows with a `orderBy` constraint
        # By default order is ascending
        $result = Project::orderBy('staff_last')->get();
        dump($result->toArray());
    }

    public function practice7()
    {
        # A second param can be passed to `orderBy` constraint to specify descending order
        $result = Project::orderBy('staff_last', 'desc')->get();
        dump($result->toArray());
    }

    public function practice8()
    {
        # `orderBy` constraints can be chained to order by multiple rows
        $result = Project::orderBy('staff_last')->orderBy('title', 'desc')->get();
        dump($result->toArray());
    }
    public function practice9()
    {
        # `orderBy` constraints can be chained to order by multiple rows
        $result = str_replace(" ","-",(strtolower("Red Beans and Rice")));
        dump($result);
    }

    public function practice10()
    {
            $projects = Project::all()->toArray();
            //$project = Project::find(rand(1,5))->toArray();
            //dump($project);
            $ratings = Rating::all()->toArray();
            $handles = [];
            foreach($ratings as $rating){
                    array_push($handles, $ratings['handle']);
                };        
            //dump($handles);
            foreach($projects as $project){

                foreach ($handles as $handle) {
                    $rating = Rating::where('handle', '=', $handle)->first();
                    //dump($rating->handle);
                    //$project->ratings()->save($rating, ['grade' => rand(1,5)]);
                }
            };    
            #yes I truly deeply messed this up    

        //}

    }

    public function practice11()
    {
        $department = ['Select',];
        $deptColl = Department::orderBy('id')->get();
        
        $deptArray = ($deptColl->toArray());
        foreach($deptArray as $value) {
            $department [] = array_pop($value);
        }
        dump ($department);
    }

    public function practice12()
    {
       $ratings = Rating::orderBy('id', 'ASC')->get();
        dump($ratings->toArray());
    }

    public function practice13()
    {
        #test findBySlug function of Project Model
        $project = Project::findBySlug('aliquam-accusamus-deleniti-enim-et');
        dump($project->department_id);
    }

    public function practice14()
    {
        #test findByName function of Department Model
        $department = Department::findByName('DEAI');
        dump($department->id);
    }

    public function practice15()
    {
        #test findByID function of Department Model
        $department = Department::findById(3);
        dump($department->name);
    }
    public function practice16()
    {
        #get dept name from project
        $project = Project::findBySlug('aliquam-accusamus-deleniti-enim-et');
        $department = Department::findById($project->department_id);

        dump($project);
        dump($department->name);

    }

    public function practice17()
    {
        #get all projects ---returns null
        $projects = Project::all()->toArray();
        $ratings = Rating::all()->toArray();
        foreach ($projects as $title) {
            $project = Project::where('title', '=', $title)->first();
            dump($project);

        }

    }
    public function practice18()
    {
        #accidental way to get waaaay too much info
        $project = Project::find(1);
        //dump($project->id);
        //dump($project->title);
        $grade = $project->wherePivot('grade');
        dump($grade);

    }
    public function practice19()
    {
        # Eager load users to reduce number of queries
        # (Suggestion: Try this without the `with` and watch how it greatly increases the number of queries)
        $projects = Project::with('ratings')->get();
    
        foreach ($projects as $project) {
            if ($project->ratings->count() == 0) {
                dump($project->title . ' is not yet rated');
            } else {
                dump($project->title . ' is evaluated on the following perameters:');
    
                foreach ($project->ratings as $rating) {
                    dump($rating->measure);
                }
            }
        }
    }


    public function practice20()
    {
        # Eager load users to reduce number of queries
        # (Suggestion: Try this without the `with` and watch how it greatly increases the number of queries)
        $projects = Project::with('ratings')->get();
    
        foreach ($projects as $project) {
            if ($project->ratings->count() == 0) {
                dump($project->title . ' is not yet rated');
            } else {
                dump($project->title . ' is evaluated on the following perameters:');
    
                foreach ($project->ratings as $rating) {
                    dump($rating->measure);
                    dump($rating->pivot->grade);
                }
            }
        }
    }

    public function practice21()
    {
        $projects = Project::with('ratings')->get();
        $rateCollection = [];
        $projectselect;
        foreach ($projects as $project) {
            if ($project->slug =='vero-fuga-nihil') {
                $projectselect = $project;
            }
        };
        if ($projectselect->ratings->count() == 0){
                $department = Department::findById($project->department_id);
                $departmentName = $department->name;
                dump($projectselect);
                dump($departmentName);
        }else{
                $department = Department::findById($project->department_id);
                $departmentName = $department->name;
                foreach ($projectselect->ratings as $rating) {
                    $ratingArray = [
                        $rating->measure,
                        $rating->pivot->grade
                        ];
                    array_push($rateCollection, $ratingArray);
                }
                dump($department);
                dump($rateCollection);
                dump($departmentName);                    
        }
    }
    
    public function practice22()
    {
        //$project = Project::find(2);
        $ratings = Rating::all()->toArray();
        $measures = [];
        foreach($ratings as $rating){
            if($rating['department_id']== 2){
                array_push($measures, $rating['measure']);

            }
            //dump($rating['measure']);
        };
        dump($measures);

    }

    public function practice23()
    {
        $departments = Department::all()->toArray();
        $departmentNames = [];
        foreach($departments as $department){
                array_push($departmentNames, $department['name']);
            };        
        dump($departmentNames);

    }

    public function practice24()
    {
        $projects = Project::all()->toArray();
        $ratings = Rating::all()->toArray();
        $handles = [];
        $i=0;
        $x=0;
        while( $x < 6) {
            $project = $projects[$x];
            dump('project '. $x);

            while( $i < 76) {
                $rating = $ratings[$i];
                dump('rating '.$i );
                $i++;
            }
        $x++;

        }
    #welp I tried. A well designed recursive function might do it
    }

    public function practice25()
    {
        $ratings = Rating::allMeasures()->toArray();
        dump($ratings);
    }


/*       $ratings = Rating::allMeasures();




    public function practice11()
    {
        # Chain two `where` constraints
        $result = Project::where('published', '>', '1960')->where('id', '<', 5 )->get();
        dump($result->toArray());
    }

    public function practice12()
    {
        # Chain a `where` and a `orWhere` constraint
        $result = Book::where('published', '>', '1960')->orWhere('id', '<', 5 )->get();
        dump($result->toArray());
    }

    public function practice13()
    {
        # `whereIn` constraint
        $result = Book::whereIn('id', [1, 2])->get();
        dump($result->toArray());
    }

    public function practice14()
    {
        # Get just the first result of a query by using the `first` fetch method
        $result = Book::where('title', 'LIKE', '%Gatsby%')->orderBy('created_at')->first();
        dump($result);
    }

    public function practice15()
    {
        # Throw an exception if the query fails
        $result = Book::where('title', '=', 'The Great Gatsbyyyyy')->firstOrFail();
        dump($result->toArray());
    }

    public function practice16()
    {
        # Count how many rows match a `where` constraint using the `count` fetch method
        $result = Book::where('title', 'LIKE', '%Gatsby%')->count();
        dump($result);
    }

    public function practice17()
    {
        # Limit the amount of results a query will return
        $result = Book::where('published', '>', 1800)->limit(2)->get();
        dump($result->toArray());
    }

    public function practice18()
    {
        # Get a single column's value from the first result of a query
        $result = Book::where('published', '>', 1800)->orderBy('published')->value('title');
        dump($result);
    }

    public function practice19()
    {
        # Get a single column's value from the first result of a query
        $result = Book::where('published', '>', 1800)->orderBy('published')->value('title');
        dump($result);
    }

    public function practice20()
    {
        # Determine if a row exists using the `exists` fetch method (returns a boolean value)
        $result = Book::where('title', '=', 'The Great Gatsby')->exists();
        dump($result);
    }

    public function practice21()
    {
        # Execute a raw SQL select
        $result = Book::raw('SELECT * FROM books WHERE title LIKE %Gatsby%')->get();
        dump($result->toArray());
    }

    public function practice22()
    {
        # Delete a row by id
        $result = Book::destroy(1);
        dump($result);
    }

    public function practice23()
    {
        # Delete any rows matching a `where` constraint
        $result = Book::where('title', '=', 'The Great Gatsby')->delete();
        dump($result);
    }

*/












    
}