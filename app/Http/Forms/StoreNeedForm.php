<?php

namespace App\Http\Forms;

use App\Need;
use GeoThing\GeoThing;

class StoreNeedForm
{
    public function save()
    {
        $this->addCoordinatesToRequest();

        $need = Need::create(request()->except('_token', 'physical_needs'));

        if ($this->hasPhysicalNeeds()) {
            $need->physicalNeeds()->attach(request('physical_needs'));
        }
    }

    private function addCoordinatesToRequest()
    {
        $coordinates = GeoThing::getCoordinates(request('address'), request('zip'), config('GOOGLE_MAP_API'));
        request()->merge([
            'lat' => round($coordinates->lat, 6),
            'lng' => round($coordinates->lng, 6),
        ]);
    }

    /**
     * @return bool
     */
    private function hasPhysicalNeeds()
    {
        return request()->has('physical_needs');
    }
}