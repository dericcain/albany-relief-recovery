<?php

namespace Tests\Feature;

use App\Need;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class NeedsFormSubmissionTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations, WithoutMiddleware;

    /** @test */
    function a_need_is_created_when_the_needs_form_is_submitted()
    {
        $this->disableExceptionHandling();

        $response = $this->post(route('needs.store'), $this->needs);
        $need = Need::whereEmail('deric.cain@gmail.com')->first();

        $response->assertStatus(201);
        $this->assertNotNull($need);
    }

    /** @test */
    function a_need_is_marked_as_pending()
    {
        $need = factory(Need::class)->create();

        $response = $this->post(route('needs.update', ['id' => $need->id]), [
            'pending' => true
        ]);
        $updatedNeed = Need::find($need->id);

        $response->assertStatus(200);
        $this->assertTrue($updatedNeed->is_pending);
    }

    /** @test */
    function a_need_can_be_marked_as_complete()
    {
        $need = factory(Need::class)->create();

        $response = $this->post(route('needs.update', ['id' => $need->id]), [
            'is_complete' => true
        ]);

        $response->assertStatus(200);
        $updatedNeed = Need::find($need->id);

        $this->assertFalse($updatedNeed->is_pending);
        $this->assertTrue($updatedNeed->is_complete);
    }

}
