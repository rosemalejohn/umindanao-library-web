<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Visitor extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'id_number', 'type', 'password', 'course_id', 'college_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token',
    ];

    protected $appends = ['full_name'];

    public function scopeStudents($query)
    {
        return $query->whereType('student');
    }

    public function scopeFaculties($query)
    {
        return $query->whereType('faculties');
    }

    public function college() 
    {
        return $this->belongsTo(College::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->middlename . ' ' . $this->lastname;
    }
}
