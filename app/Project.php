<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @var array
     */
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

    /**
     * @return mixed
     */
    public function getProjectManager()
    {
        return $this->members()->where('is_project_manager', true)->first();
    }

    /**
     * @param int $userId
     * @param bool $value
     * @return mixed
     */
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

    /**
     * @param int $newProjectManagerId
     * @return mixed
     */
    public function changeProjectManager(int $newProjectManagerId)
    {
        $value = $newProjectManagerId > 0 ? true : false;
        $projectManager = $this->getProjectManager();
        if (!empty($projectManager) && $projectManager->id != $newProjectManagerId && $value !== false) {
            $this->members()->detach($projectManager);
        } elseif ($value === false) {
            return $this->members()->detach($projectManager);
        }

        if (empty($this->members()->where('user_id', $newProjectManagerId)->first()) && $newProjectManagerId > 0) {
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
        } else {
            $query = $user->projects;
        }
        return $query;
    }
}
