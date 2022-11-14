<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function department()
    {
        # Book belongs to Department
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\Department');
    }

    public function projects()
{
    return $this->belongsToMany('App\Models\Project')
        ->withTimestamps() # Must be added to have Eloquent update the created_at/updated_at columns in a pibot table
        ->withPivot('grade'); # Must also specify any other fields that should be included when fetching this relationship
}
}
