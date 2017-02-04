<?php

namespace Tests\Feature;

use App\Need;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations, WithoutMiddleware;

    /** @test */
    function a_webhook_from_a_text_gets_stored_in_the_needs_table()
    {
        $this->disableExceptionHandling();

        // Arrange
        $need = factory(Need::class)->create([
            'phone' => '2059023961'
        ]);

        // Act
        $response = $this->post('messages', [
            "msisdn" => "2059023961",
            "to" => "12172030615",
            "messageId" => "02000000E68951D8",
            "text" => "I still need help with moving debris",
            "type" => "text",
            "keyword" => "HELLO7",
            "message-timestamp" => "2016-07-05 21:46:15"
        ]);

        $updatedNeed = Need::find($need->id);

        // Assert
        $response->assertStatus(200);
        $this->assertTrue($updatedNeed->received_text);
        $this->assertEquals('I still need help with moving debris', $updatedNeed->text_message);
    }
}
