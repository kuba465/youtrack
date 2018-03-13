<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }
}
