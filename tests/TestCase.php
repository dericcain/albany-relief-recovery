<?php

namespace Tests;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $needs = [
        'main_contact' => 'Deric Cain',
        'main_number' => '2055551234',
        'alt_number' => '',
        'age' => '35',
        'other_names' => '',
        'address' => '1554 Hall Ave',
        'zip' => '35071',
        'home_is_damaged' => true,
        'owner_renter' => 'owner',
        'number_of_stories' => '1',
        'sq_ft' => '1300',
        'is_primary_home' => true,
        'is_staying_home' => true,
        'has_power' => true,
        'needs_medical' => false,
        'has_baby' => true,
        'work_details' => [1, 3],
        'physical_needs' => [1, 3, 5],
        'diaper_size' => '5',
        'needs_formula' => false,
        'formula_type' => '',
        'needs_milk' => false,
        'over_counter_meds' => 'ibuprofen',
        'clothing_needs' => 'male jeans 32',
        'needs_transportation' => false,
        'needs_home_repair' => true,
        'needs_trees_cut' => false,
        'repair_comments' => 'Needs a chainsaw',
        'physical_health_scale' => '8',
        'emotional_health_scale' => '6',
        'what_to_pray' => 'My kids',
        'attends_local_church' => true,
        'church_attended' => 'First Baptist',
        'applied_for_disaster_assistance' => false,
        'applied_for_fema_food_stamps' => false,
        'agrees_to_terms' => true,
        'digital_signature' => 'Deric Cain',
        'volunteers_that_visited' => 'John, Joe, Sally and Bob',
        'resources_provided' => 'water',
        'additional_notes' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        'wants_to_help_long_term' => false,
        'needs_to_be_provided' => '',
        'member_name' => 'Melissa Cain',
        'member_phone' => '2059012345',
        'member_email' => 'mcain@gmail.com',
        'member_facebook' => 'melissa.cain',
        'is_associated_with_church' => true,
        'church_association' => 'The Cross Church',
        'can_contact' => true,
    ];


    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler
        {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }
}
