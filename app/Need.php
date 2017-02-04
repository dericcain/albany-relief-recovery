<?php

namespace App;

use App\Helpers\PhoneNumber;
use Illuminate\Notifications\Notifiable;

class Need extends SuperModel
{

    use Notifiable;

    protected $casts = [
        'speaks_spanish' => 'boolean',
        'is_staying_home' => 'boolean',
        'has_applied_for_assistance' => 'boolean',
        'has_power' => 'boolean',
        'attends_church' => 'boolean',
        'is_pending' => 'boolean',
        'is_complete' => 'boolean',
        'received_text' => 'boolean'
    ];

    protected $dates = ['received_text_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function physicalNeeds()
    {
        return $this->belongsToMany(PhysicalNeed::class);
    }

    public function routeNotificationForNexmo()
    {
        return '1' . PhoneNumber::onlyNumbers($this->phone);
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
            'is_pending' => false,
            'received_text' => false
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
