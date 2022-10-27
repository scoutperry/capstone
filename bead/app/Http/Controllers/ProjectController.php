<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        # TODO: Query the database for all the books;
        return 'Here are all of the projects...';
    }

    public function show($title)
    {
    # TODO: Query the database for the book where title = $title

        return view('projects/show', [
        'title' => $title
        ]);    
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
       $request->validate([
            #'title' => 'required',
            #'author' => 'required',
            #'published_year' => 'required|digits:4',
            #'cover_url' => 'url',
            #'purchase_url' => 'required|url',
            #'description' => 'required|min:255'
        ]);

 # Note: If validation fails, it will automatically redirect the visitor back to the form page
 # and none of the code that follows will execute.

        # Code will eventually go here to add the book to the database, 
        # but for now we'll just dump the form data to the page for proof of concept
        dump($request->all());
    }

}
