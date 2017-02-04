<?php

namespace App\Http\Forms;

use App\Events\NeedMarkedComplete;
use App\Need;
use GeoThing\GeoThing;

class UpdateNeedForm
{
    public $need;

    /**
     * UpdateNeedForm constructor.
     * @param $needId
     */
    public function __construct($needId)
    {
        $this->need = Need::find($needId);
    }

    public function save()
    {
        if ($this->isStatusUpdateToPending()) {
            $this->updateStatusToPending();
        } else {
            if ($this->isStatusUpdateToComplete()) {
                $this->markNeedAsComplete();
            } else {
                if ($this->needIsMet()) {
                    $this->markNeedAsMet();
                } else {
                    $this->updateNeedInfo();
                }
            }
        }
    }

    /**
     * @return bool
     */
    private function isStatusUpdateToPending()
    {
        return request()->has('pending');
    }

    private function updateStatusToPending()
    {
        $this->need->markPending();
    }

    /**
     * @return bool
     */
    private function isStatusUpdateToComplete()
    {
        return request()->has('complete');
    }

    private function markNeedAsComplete()
    {
        event(new NeedMarkedComplete($this->need));
        $this->need->markComplete();
    }

    /**
     * @return bool
     */
    private function needIsMet()
    {
        return request()->has('need_met');
    }

    private function markNeedAsMet()
    {
        $this->need->physicalNeeds()->detach(request('physical_need_id'));
        if ($this->allNeedsAreMet()) {
            $this->need->update(['needs_met' => true]);
        }
    }

    /**
     * @return bool
     */
    private function allNeedsAreMet()
    {
        return $this->need->physicalNeeds->count() == 0;
    }

    private function updateNeedInfo()
    {
        $this->addCoordinatesToRequest();

        $this->updateNeed();

        if ($this->hasPhysicalNeeds()) {
            $this->updatePhysicalNeeds();
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

    private function updateNeed()
    {
        $this->need->update(request()->except('_token', 'physical_needs'));
    }

    /**
     * @return bool
     */
    private function hasPhysicalNeeds()
    {
        return request()->has('physical_needs');
    }

    private function updatePhysicalNeeds()
    {
        $this->need->physicalNeeds()->sync(request('physical_needs'));
    }
}