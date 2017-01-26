<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workDetails()
    {
        return $this->hasMany(WorkDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function physicalNeeds()
    {
        return $this->hasMany(PhysicalNeed::class);
    }
}
