<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_members');
    }

    public function scopeProjectMembers($query, Project $project)
    {
        $query = User::role('project_member')->whereNotIn('id', function ($query) use ($project){
            $query->select('user_id')->from('project_members')->where('project_id', $project->id);
        });

        return $query;
    }
}
