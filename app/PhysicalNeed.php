<?php

namespace App;

class PhysicalNeed extends SuperModel
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function needs()
    {
        return $this->belongsToMany(Need::class);
    }
}
