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

    public function practice2()
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

        //$result = Project::orderBy('staff_last')->get();
        //$projects = $result->toArray();
        //dump($projects);


        //foreach ($projects as $slug) {


            $project = Project::where('slug', '=', 'love-stories-from-the-national-portrait-gallery-london')->first();
            //$project = Project::where('slug', '=', $slug)->first();
            //dump($project);
            //$ratings = Rating::orderBy('slug')->value('title');

            $ratings = [
                'existing_donor',
                'donor_area',
                'foundation_timing',
                'strategic_plan',
                'campus_plan',
                'campaign_priority',
                'program_impact',
                'legal_obligation',
                'fund_obligation',
                'completes_cert',
                'support',
                'grant',
                'historic_credit',
                'visitation_revenue',
                'audience_expansion',
                'special_ticket',
                'other_potential',
                'deai_staff',
                'interpretation',
                'includes_race',
                'includes_gender',
                'includes_sexuality',
                'includes_physical',
                'includes_psychiatric',
                'primary_representation',
                'secondary_representation',
                'diverse_audience',
                'diverse_support',
                'diverse_vendor',
                'curatorial_staff',
                'tech',
                'community',
                'academic',
                'permanent_collection',
                'new_donors',
                'visitor_experience',
                'collection_strength',
                'storage_turnover',
                'conservation_opportunity',
                'interpretive_update',
                'enhance_display',
                'steward',
                'code_law_regulation',
                'art_environment',
                'hvac_art',
                'hvac_nonart',
                'service_improvement',
                'efficient_process',
                'public_aesthetics',
                'nonpublic_aesthetics',
                'education_staff',
                'visitation',
                'program_enhancement',
                'curricular_connection',
                'programming_space',
                'augmentation',
                'families',
                'accessible',
                'way_finding',
                'view_variety',
                'existing_community',
                'new_community',
                'education_market',
                'deai_initiatives',
                'storage_capacity',
                'collections_access',
                'site_storage',
                'swing_space',
                'add_storage',
                'positive_impact',
                'inventory',
                'av_staff',
                'current_collection',
                'loan_embargo',
                'acquisitions_embargo',
                'resource_conflict'
                ];
            dump($ratings);

            foreach ($ratings as $handle) {
                $rating = Rating::where('handle', '=', $handle)->first();
                //dump($rating);
                //$project->ratings()->save($rating, ['grade' => rand(1,5)]);
            }
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


/*        $project = Project::findBySlug($slug);


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