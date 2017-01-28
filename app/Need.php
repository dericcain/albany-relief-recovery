<?php

namespace App;

use App\Helpers\PhoneNumber;

class Need extends SuperModel
{
    protected $casts = [
        'speaks_spanish' => 'boolean',
        'is_staying_home' => 'boolean',
        'has_applied_for_assistance' => 'boolean',
        'has_power' => 'boolean',
        'attends_church' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function physicalNeeds()
    {
        return $this->belongsToMany(PhysicalNeed::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @param $phoneNumber
     */
    public function setPhoneAttribute($phoneNumber)
    {
        $this->attributes['phone'] = PhoneNumber::onlyNumbers($phoneNumber);
    }

    /**
     * @param $phoneNumber
     * @return string
     */
    public function getPhoneAttribute($phoneNumber)
    {
        return PhoneNumber::format($phoneNumber);
    }
}
