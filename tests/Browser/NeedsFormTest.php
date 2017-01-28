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
                    ->type('main_contact', 'Deric Cain')
                    ->type('age', '35')
                    ->type('main_number', '2055551234')
                    ->type('other_names', 'Melissa Cain, Ethan Cain')
                    ->check('is_primary_home')
                    ->radio('owner_renter', 'renter')
                    ->check('has_power')
                    ->check('is_staying_home')
                    ->type('address', '1554 Hall Ave')
                    ->type('number_of_stories', '1')
                    ->type('sq_ft', '1300')
                    ->type('insurance_agency', 'GEICO')
                    ->select('home_damage', 'damaged')
//                    ->check('physical_needs[]')
//                    ->check('physical_needs', 'Water')
//                    ->check('physical_needs', 'Meals')
                    ->type('physical_needs_other', 'Need something else')
                    ->check('has_baby')
                    ->check('needs_milk')
                    ->type('diaper_size', '5')
                    ->type('over_counter_meds', 'ibuprofen')
                    ->type('clothing_needs', 'jeans 32 male shirt 2t boy')
                    ->check('needs_transportation')
//                    ->check('work_details[]')
//                    ->check('work_details[]')
//                    ->check('work_details[]')
//                    ->radio('physical_health_scale', '8')
//                    ->radio('mental_health_scale', '8')
                    ->type('what_to_pray', 'Need help!')
                    ->check('attends_local_church')
                    ->type('church_attended', 'Canvas Church')
                    ->check('applied_for_disaster_assistance')
                    ->check('applied_for_fema_food_stamps')
                    ->check('agrees_to_terms')
                    ->type('digital_signature', 'Jonathan Deric Cain')
                    ->type('volunteers_that_visited', 'Sarah, Bob, Lucy, Dan')
                    ->type('resources_provided', 'water, food')
                    ->type('additional_notes',
                        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type an scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.')
                    ->check('wants_to_help_long_term')
                    ->type('needs_to_be_provided', 'Music')
                    ->type('member_name', 'John Doe')
                    ->type('member_email', 'john@email.com')
                    ->type('member_phone', '2055554321')
                    ->type('member_facebook', 'johndoe')
                    ->check('is_associated_with_church')
                    ->type('church_association', 'First baptist')
                    ->press('Submit')
                    ->waitFor('.toast')
                    ->assertSee('submitted');
        });
    }
}
