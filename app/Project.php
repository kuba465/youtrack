<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'project_manager'
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members')->withTimestamps();
    }

    public function projectManager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }
}
