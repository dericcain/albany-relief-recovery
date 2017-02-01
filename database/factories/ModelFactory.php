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
        'first_name' => $faker->firstName,
        'last_name' => $faker->firstName,
        'phone' => $faker->phoneNumber,
        'speaks_spanish' => false,
        'address' => $faker->streetAddress,
        'zip' => $faker->postcode,
        'email' => $faker->safeEmail,
        'has_applied_for_assistance' => false,
        'is_staying_home' => $faker->numberBetween(0, 1),
        'has_power' => $faker->numberBetween(0, 1),
        'agrees_to_terms' => true,
        'digital_signature' => 'John Doe',
        'is_pending' => false,
        'is_complete' => false,
    ];
});

