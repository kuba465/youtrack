<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

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

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_members')->withPivot('is_project_manager');
    }

    /**
     * @param $query
     * @param Project $project
     * @return mixed
     */
    public function scopeProjectMembers($query, Project $project)
    {
        $query = User::role('project_member')->whereNotIn('id', function ($query) use ($project) {
            $query->select('user_id')->from('project_members')->where('project_id', $project->id);
        });

        return $query;
    }

    /**
     * @param $query
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeUsersVisibleForAuthUser($query, User $user)
    {
        if ($user->hasRole('admin')) {
            $query = User::all();
        } elseif ($user->hasRole('project_manager')) {
            $projects = $user->projects;
            $query = User::whereIn('id', function ($newQuery) use ($projects) {
                $newQuery->select('user_id')->from('project_members')
                    ->where('is_project_manager', false)
                    ->whereIn('project_id', $projects)
                    ->get();
            })->get();
        }
        return $query;
    }
}
