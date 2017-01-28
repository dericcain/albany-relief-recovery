<?php

namespace App;

class WorkDetail extends SuperModel
{
    public function needs()
    {
        return $this->belongsToMany(Need::class);
    }
}
