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

}