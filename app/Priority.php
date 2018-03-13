<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public function issue()
    {
        return $this->hasMany(Issue::class);
    }
}
