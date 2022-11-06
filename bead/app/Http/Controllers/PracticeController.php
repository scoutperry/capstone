<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

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

/*

    public function practice()
    {
        # Chain two `where` constraints
        $result = Project::where('published', '>', '1960')->where('id', '<', 5 )->get();
        dump($result->toArray());
    }

    public function practice()
    {
        # Chain a `where` and a `orWhere` constraint
        $result = Book::where('published', '>', '1960')->orWhere('id', '<', 5 )->get();
        dump($result->toArray());
    }

    public function practice()
    {
        # `whereIn` constraint
        $result = Book::whereIn('id', [1, 2])->get();
        dump($result->toArray());
    }

    public function practice()
    {
        # Get just the first result of a query by using the `first` fetch method
        $result = Book::where('title', 'LIKE', '%Gatsby%')->orderBy('created_at')->first();
        dump($result);
    }

    public function practice()
    {
        # Throw an exception if the query fails
        $result = Book::where('title', '=', 'The Great Gatsbyyyyy')->firstOrFail();
        dump($result->toArray());
    }

    public function practice()
    {
        # Count how many rows match a `where` constraint using the `count` fetch method
        $result = Book::where('title', 'LIKE', '%Gatsby%')->count();
        dump($result);
    }

    public function practice()
    {
        # Limit the amount of results a query will return
        $result = Book::where('published', '>', 1800)->limit(2)->get();
        dump($result->toArray());
    }

    public function practice()
    {
        # Get a single column's value from the first result of a query
        $result = Book::where('published', '>', 1800)->orderBy('published')->value('title');
        dump($result);
    }

    public function practice()
    {
        # Get a single column's value from the first result of a query
        $result = Book::where('published', '>', 1800)->orderBy('published')->value('title');
        dump($result);
    }

    public function practice()
    {
        # Determine if a row exists using the `exists` fetch method (returns a boolean value)
        $result = Book::where('title', '=', 'The Great Gatsby')->exists();
        dump($result);
    }

    public function practice()
    {
        # Execute a raw SQL select
        $result = Book::raw('SELECT * FROM books WHERE title LIKE %Gatsby%')->get();
        dump($result->toArray());
    }

    public function practice()
    {
        # Delete a row by id
        $result = Book::destroy(1);
        dump($result);
    }

    public function practice()
    {
        # Delete any rows matching a `where` constraint
        $result = Book::where('title', '=', 'The Great Gatsby')->delete();
        dump($result);
    }

*/












    
}