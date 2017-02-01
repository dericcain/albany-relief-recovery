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
        'is_pending' => 'boolean',
        'is_complete' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function physicalNeeds()
    {
        return $this->belongsToMany(PhysicalNeed::class);
    }

    /**
     * @return string
     */
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

    /**
     * @return bool
     */
    public function markPending()
    {
        return $this->update([
            'is_pending' => true
        ]);
    }

    /**
     * @return bool
     */
    public function markComplete()
    {
        return $this->update([
            'is_complete' => true,
            'is_pending' => false
        ]);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeForAuthedUser($query)
    {
        return $query->with('physicalNeeds')->get();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeForGuest($query)
    {
        return $query->select('id', 'address', 'is_complete', 'is_pending', 'zip', 'lat',
            'lng')->with('physicalNeeds')->get();
    }
}
