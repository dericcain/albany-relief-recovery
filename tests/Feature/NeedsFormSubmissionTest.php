<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NeedsFormSubmissionTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    /** @test */
    function a_need_is_created_when_the_needs_form_is_submitted()
    {
        $this->disableExceptionHandling();

        $response = $this->post(route('needs.store'), $this->needs);

        $response->assertStatus(201);
    }

    /** @test */
    function check_that_relationship_is_in_db()
    {

    }
}
