<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function issue()
    {
        return $this->hasMany(Issue::class);
    }
}
