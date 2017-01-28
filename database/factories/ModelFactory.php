<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Need::class, function (Faker\Generator $faker) {

    return [
        'main_contact' => $faker->name,
        'main_number' => $faker->phoneNumber,
        'alt_number' => $faker->phoneNumber,
        'age' => $faker->numberBetween(21, 80),
        'other_names' => '',
        'address' => $faker->streetAddress,
        'zip' => $faker->postcode,
        'home_is_damaged' => $faker->numberBetween(0, 1),
        'owner_renter' => $faker->randomElement(['owner', 'renter']),
        'number_of_stories' => $faker->numberBetween(0, 3),
        'sq_ft' => '1300',
        'is_primary_home' => $faker->numberBetween(0, 1),
        'is_staying_home' => $faker->numberBetween(0, 1),
        'has_power' => $faker->numberBetween(0, 1),
        'needs_medical' => $faker->numberBetween(0, 1),
        'has_baby' => $faker->numberBetween(0, 1),
        'diaper_size' => '5',
        'needs_formula' => $faker->numberBetween(0, 1),
        'formula_type' => '',
        'needs_milk' => $faker->numberBetween(0, 1),
        'over_counter_meds' => 'ibuprofen',
        'clothing_needs' => 'male jeans 32',
        'needs_transportation' => $faker->numberBetween(0, 1),
        'needs_home_repair' => $faker->numberBetween(0, 1),
        'needs_trees_cut' => $faker->numberBetween(0, 1),
        'repair_comments' => 'Needs a chainsaw',
        'physical_health_scale' => $faker->numberBetween(1, 10),
        'emotional_health_scale' => $faker->numberBetween(1, 10),
        'what_to_pray' => 'My kids',
        'attends_local_church' => $faker->numberBetween(0, 1),
        'church_attended' => 'First Baptist',
        'applied_for_disaster_assistance' => $faker->numberBetween(0, 1),
        'applied_for_fema_food_stamps' => $faker->numberBetween(0, 1),
        'agrees_to_terms' => $faker->numberBetween(0, 1),
        'digital_signature' => 'Deric Cain',
        'volunteers_that_visited' => 'John, Joe, Sally and Bob',
        'resources_provided' => 'water',
        'additional_notes' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        'wants_to_help_long_term' => $faker->numberBetween(0, 1),
        'needs_to_be_provided' => '',
        'member_name' => $faker->name,
        'member_phone' => $faker->phoneNumber,
        'member_email' => $faker->email,
        'member_facebook' => $faker->userName,
        'is_associated_with_church' => $faker->numberBetween(0, 1),
        'church_association' => 'The Cross Church',
        'can_contact' => $faker->numberBetween(0, 1),
        'is_pending' => $faker->numberBetween(0, 1),
        'is_complete' => $faker->numberBetween(0, 1),
    ];
});

