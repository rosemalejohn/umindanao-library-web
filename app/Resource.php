<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name', 'details', 'photo', 'url'];

    public function visitors()
    {
        return $this->belongsToMany(Visitor::class, 'resource_users')->withTimestamps();
    }
}
