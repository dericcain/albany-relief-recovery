<?php

use App\Need;
use Carbon\Carbon;
use GeoThing\GeoThing;
use Maatwebsite\Excel\Facades\Excel;

Artisan::command('update:coor', function () {
    $needsWithoutCoordinates = Need::all();
    $needsWithoutCoordinates->each(function ($need) {
        $coordinates = GeoThing::getCoordinates($need->address . 'Albany GA', $need->zip, 'AIzaSyCRIiaSd-mdFVEPKHW_MxEmQek-sF25fVc');
        $this->info(var_dump($coordinates));
        $need->lat = $coordinates->lat;
        $need->lng = $coordinates->lng;
        $need->save();
        usleep(50000);
    });
})->describe('Update null coordinates');

Artisan::command('import:needs', function () {
    $files = Excel::load(public_path('needs.csv'), function ($reader) {
    })->get();

    $newCollection = $files->each(function ($need) {
        if (is_null($need->first_name) && is_null($need->last_name) && is_null($need->date_of_initial_assessment)) {
            return;
        }
        $newNeed = new Need;
        $newNeed->first_name = $need->first_name;
        $newNeed->last_name = $need->last_name;
        $newNeed->speaks_spanish = is_null($need->se_habla_espanol) ? false : true;
        $newNeed->address = (string)$need->street_number . ' ' . $need->street_name;
        $newNeed->zip = '31701';
        $newNeed->phone = $need->best_contact_number;
        $newNeed->email = $need->best_contact_email;
        $newNeed->insurance_agency = $need->home_insurance_agency;
        $newNeed->has_applied_for_assistance = strtolower($need->have_you_applied_for_femagema_assistance) == 'no' || is_null($need->have_you_applied_for_femagema_assistance) ? false : true;
        $newNeed->is_staying_home = strtolower($need->staying_in_home) == 'no' || is_null($need->staying_in_home) ? false : true;
        $newNeed->has_power = strtolower($need->do_you_have_power) == 'no' || is_null($need->do_you_have_power) ? false : true;
        $newNeed->prayer_needs = $need->how_can_we_pray_for_you;
        $newNeed->attends_local_church = is_null($need->do_you_attend_a_church_if_yes_where) ? false : true;
        $newNeed->church_attended = is_null($need->do_you_attend_a_church_if_yes_where) || $need->do_you_attend_a_church_if_yes_where == '' ? null : $need->do_you_attend_a_church_if_yes_where;
        $newNeed->agrees_to_terms = true;
        $newNeed->digital_signature = $need->first_name . ' ' . $need->last_name;
        $newNeed->zone = $need->zone;
        $newNeed->is_pending = true;
        $newNeed->is_complete = false;
        $newNeed->created_at = Carbon::parse($need->date_of_initial_assessment)->toDateString();

        $coordinates = GeoThing::getCoordinates($newNeed->address, $newNeed->zip);
        $newNeed->lat = $coordinates->lat;
        $newNeed->lng = $coordinates->lng;

        $newNeed->save();

        if ($need->need_nonperishable_food) {
            $newNeed->physicalNeeds()->attach(1);
        }

        if ($need->need_water) {
            $newNeed->physicalNeeds()->attach(2);
        }

        if ($need->have_babt_needs) {
            $newNeed->physicalNeeds()->attach(3);
        }

        if ($need->need_debris_removal) {
            $newNeed->physicalNeeds()->attach(4);
        }

        if ($need->need_home_repair) {
            $newNeed->physicalNeeds()->attach(5);
        }

        if ($need->need_minor_medical_supplies) {
            $newNeed->physicalNeeds()->attach(6);
        }
    });
});
