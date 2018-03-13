<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function issue()
    {
        return $this->hasMany(Issue::class);
    }
}
