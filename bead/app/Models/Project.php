<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public static function findBySlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }

    public function ratings()
{
    return $this->belongsToMany('App\Models\Rating')
        ->withTimestamps() # Must be added to have Eloquent update the created_at/updated_at columns in a pivot table
        ->withPivot('grade'); # Must also specify any other fields that should be included when fetching this relationship
}

}
