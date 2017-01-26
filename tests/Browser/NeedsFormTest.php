<?php

namespace Tests\Browser;

use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class NeedsFormTest extends DuskTestCase
{
    /** @test */
    function a_needs_form_submits_correctly()
    {
        $this->browse(function ($browser) {
            $browser->visit('/needs/create')
                    ->type('Deric Cain', 'name')
                    ->type('35', 'age')
                    ->type('2055551234', 'main_number')
                    ->type('Melissa Cain, Ethan Cain', 'other_names')
                    ->check('is_primary_home')
                    ->type('renter', 'owner_renter')
                    ->type('owner', 'owner_renter')
                    ->check('has_power')
                    ->check('is_staying_home')
                    ->type('1554 Hall Ave', 'address')
                    ->type('1', 'number_of_stories')
                    ->type('1300', 'sq_ft')
                    ->type('GEICO', 'insurance_agency')
                    ->select('damaged', 'home_damage')
                    ->check('physical_needs[]')
                    ->check('physical_needs[]')
                    ->check('physical_needs[]')
                    ->check('physical_needs[]')
                    ->type('Need something else', 'physical_needs_other')
                    ->check('has_baby')
                    ->check('needs_milk')
                    ->type('5', 'diaper_size')
                    ->type('ibuprofen', 'over_counter_meds')
                    ->type('jeans 32 male shirt 2t boy', 'clothing_needs')
                    ->check('needs_transportation')
                    ->check('work_details[]')
                    ->check('work_details[]')
                    ->check('work_details[]')
                    ->type('8', 'physical_health_scale')
                    ->type('8', 'mental_health_scale')
                    ->type('Need help!', 'what_to_pray')
                    ->check('attends_local_church')
                    ->type('Canvas Church', 'church_attended')
                    ->check('applied_for_disaster_assistance')
                    ->check('applied_for_fema_food_stamps')
                    ->check('agrees_to_terms')
                    ->type('Jonathan Deric Cain', 'digital_signature')
                    ->type('Sarah, Bob, Lucy, Dan', 'volunteers_that_visited')
                    ->type('water, food', 'resources_provided')
                    ->type('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type an scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                        'additional_notes')
                    ->check('wants_to_help_long_term')
                    ->type('Music', 'needs_to_be_provided')
                    ->type('John Doe', 'member_name')
                    ->type('john@email.com', 'member_email')
                    ->type('2055554321', 'owner_phone')
                    ->type('johndoe', 'owner_facebook')
                    ->check('is_associated_with_church')
                    ->type('First baptist', 'church_association')
                    ->press('Submit');
        });
    }
}
