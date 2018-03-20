<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    const TOKEN = '2W4p3_RE1t8AAAAAAAAH2hdjcrQWEHs446_woitNRYPleLofksWMrbhsplO0cFqS';

    /**
     * @var array
     */
    protected $fillable = [
        'path', 'name', 'issue_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
