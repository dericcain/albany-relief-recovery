<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDetail extends Model
{
    public function needs()
    {
        return $this->belongsToMany(Need::class);
    }
}
