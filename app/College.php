<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{

    protected $fillable = ['name'];

    public function students() 
    {
    	return $this->hasMany(Visitor::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
