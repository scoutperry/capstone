<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public static function allMeasures()
    {
        return self::where('department_id', '=', rand(1,7))->select(['handle', 'measure'])->get();

        //return self::orderBy('id')->select(['handle', 'measure', 'department_id'])->get();

    }

    public function department()
    {
        # Rating belongs to Department
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\Department');
    }

    public function projects()
    {
    return $this->belongsToMany('App\Models\Project')
        ->withTimestamps() # Must be added to have Eloquent update the created_at/updated_at columns in a pivot table
        ->withPivot('grade'); # Must also specify any other fields that should be included when fetching this relationship
    }
}
