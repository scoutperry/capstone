<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function ratings()
    {
    # Department has many Ratings
    # Define a one-to-many relationship.
    return $this->hasMany('App\Models\Rating');
    }
}
