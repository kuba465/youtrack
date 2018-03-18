<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status_id', 'priority_id', 'user_id', 'project_id', 'estimated_time'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeUserIssues($query, User $user)
    {
        if ($user->hasRole('admin')) {
            return $query = Issue::orderBy('priority_id', 'desc')->get();
        } else {
            $query = Issue::whereIn('project_id', $user->projects);
            if ($user->hasRole('project_member')) {
                //TODO: why this query put name of project instead of user id?
//                $query->where('user_id', '=', $user->id);
            }
            return $query->orderBy('priority_id', 'desc')->get();
        }

    }

    /**
     * @param string $string
     * @return string
     */
    public function stringOfTime(string $string): string
    {
        //TODO: add timepicker, then all time will be 3-elements, so if will be smoother
        //TODO: or check in controller how long is time and if 2-element add to it "00" ad beginning
        //TODO: I prefer first solution
        switch ($string) {
            case 'estimated_time':
                $string = $this->estimated_time;
                break;
            case 'work_time':
                $string = $this->work_time;
                break;
        }
        $estimatedTimeArray = explode(':', $string);
        $excluded = ['0', '00'];
        if (count($estimatedTimeArray) === 3) {
            if (!in_array($estimatedTimeArray[0], $excluded)) {
                $estimatedTimeString = $estimatedTimeArray[0] . ' days ' . $estimatedTimeArray[1] . ' h ' . $estimatedTimeArray[2] . ' min';
            } elseif (!in_array($estimatedTimeArray[1], $excluded)) {
                $estimatedTimeString = $estimatedTimeArray[1] . ' h ' . $estimatedTimeArray[2] . ' min';
            } else {
                $estimatedTimeString = $estimatedTimeArray[2] . ' min';
            }
        } else {
            if (!in_array($estimatedTimeArray[0], $excluded)) {
                $estimatedTimeString = $estimatedTimeArray[0] . ' h ' . $estimatedTimeArray[1] . ' min';
            } else {
                $estimatedTimeString = $estimatedTimeArray[1] . ' min';
            }
        }
        return $estimatedTimeString;
    }
}
