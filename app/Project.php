<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'project_manager'
    ];

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
    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members')->withPivot('is_project_manager')->withTimestamps();
    }

    public function getProjectManager()
    {
        return $this->members()->where('is_project_manager', true)->first();
    }

    public function setValueForProjectManager(int $userId, bool $value)
    {
        $member = $this->members()->where('user_id', $userId)->first();
        if (empty($member)) {
            $member = $this->getProjectManager();
        }
        $member->pivot->is_project_manager = $value;
        $member->pivot->save();
        return $member;
    }

    public function changeProjectManager(int $newProjectManagerId)
    {
        $value = $newProjectManagerId > 0 ? true : false;
        $projectManager = $this->getProjectManager();
        if (!empty($projectManager) && $projectManager->id != $newProjectManagerId && $value !== false) {
            $this->setValueForProjectManager($projectManager->id, false);
            $this->members()->attach($newProjectManagerId);
        } elseif ($value === false) {
            return $this->setValueForProjectManager($projectManager->id, $value);
        } else {
            $this->members()->attach($newProjectManagerId);
        }

        return $this->setValueForProjectManager($newProjectManagerId, $value);
    }

    /**
     * @param $query
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection|mixed|static[]
     */
    public function scopeProjectsAvailableToUser($query, User $user)
    {
        if ($user->hasRole('admin')) {
            $query = Project::all();
        } elseif ($user->hasRole('project_manager')) {
            $query = Project::where('project_manager_id', $user);
        } else {
            $query = $user->projects;
        }
        return $query;
    }
}
