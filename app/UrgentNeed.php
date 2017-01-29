<?php

namespace App;

use App\Helpers\PhoneNumber;

class UrgentNeed extends SuperModel
{

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
     * @param $phoneNumber
     */
    public function setAltPhoneAttribute($phoneNumber)
    {
        $this->attributes['alt_phone'] = PhoneNumber::onlyNumbers($phoneNumber);
    }

    /**
     * @param $phoneNumber
     * @return string
     */
    public function getAltPhoneAttribute($phoneNumber)
    {
        return PhoneNumber::format($phoneNumber);
    }
}
