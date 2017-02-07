<?php

namespace Tests\Feature;

use App\Need;
use App\PhysicalNeed;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StatsTest extends TestCase
{
    use WithoutMiddleware, DatabaseMigrations, DatabaseTransactions;

    /** @test */
    function the_stats_route_returns_stats_about_people_helped()
    {
        $this->disableExceptionHandling();
        factory(Need::class, 30)->create();
        PhysicalNeed::insert([
            [
                'name' => 'nonperishable food'
            ],
            [
                'name' => 'water'
            ],
            [
                'name' => 'baby needs'
            ],
            [
                'name' => 'debris removal'
            ],
            [
                'name' => 'home repair'
            ],
            [
                'name' => 'minor medical supplies'
            ]
        ]);

        $response = $this->get('/stats');

        $response->assertStatus(200);
        $response->assertSee('completed');
        $response->assertSee('pending');
    }
}
