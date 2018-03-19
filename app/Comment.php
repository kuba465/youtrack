<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var array 
     */
    protected $fillable = [
        'owner_id', 'issue_id', 'description'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
