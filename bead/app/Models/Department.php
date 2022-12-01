<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public static function findById($id)
    {
        #Find Department by Id number
         return self::where('id', '=', $id)->first();
 
    }

    public static function findByName($name)
    {
        #Find Department by name
         return self::where('name', '=', $name)->first();
 
    }

    public function ratings()
    {
    # Department has many Ratings
    # Define a one-to-many relationship.
    return $this->hasMany('App\Models\Rating');
    }
}
