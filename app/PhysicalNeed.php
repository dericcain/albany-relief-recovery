<?php

namespace App;

class PhysicalNeed extends SuperModel
{
    public function needs()
    {
        return $this->belongsToMany(Need::class);
    }
}
