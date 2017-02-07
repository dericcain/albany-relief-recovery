<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GroupVolunteerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions, WithoutMiddleware;

    /** @test */
    function a_group_can_register_to_volunteer()
    {
        $this->disableExceptionHandling();

        $faker = \Faker\Factory::create();

        $response = $this->post('/group-volunteers', [
            'first_name' => $faker->firstName,
            'last_name' => $faker->firstName,
            'email' => $faker->safeEmail,
            'phone' => $faker->phoneNumber,
            'alt_phone' => $faker->phoneNumber,
            'affiliation' => $faker->word,
            'origin' => $faker->city,
            'address' => $faker->streetAddress,
            'num_volunteers' => $faker->randomElement(['<5', '5-10', '10-20', '20-30', '30-50']),
            'age_group' => $faker->randomElement(['under 13', '13-17', '18-25', '26-50', '50+']),
            'debris_removal' => $faker->boolean(),
            'home_repair' => $faker->boolean(),
            'deliveries' => $faker->boolean(),
            'administrative' => $faker->boolean(),
            'sorting' => $faker->boolean(),
            'communications' => $faker->boolean(),
            'counseling' => $faker->boolean(),
            'other' => $faker->word,
            'time_commitment' => '1-2 days',
            'speaks_spanish' => false,
            'agrees_to_terms' => true,
            'digital_signature' => 'John Doe',
        ]);

        $response->assertStatus(201);
    }
}
