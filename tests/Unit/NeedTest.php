<?php

namespace Tests\Unit;

use App\Need;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NeedTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /** @test */
    function a_need_is_inserted_into_the_database()
    {
        // Arrange
        $need = Need::create($this->needs);

        // Act

        // Assert
    }
}
