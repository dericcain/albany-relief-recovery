<?php

namespace Tests;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $needs = [
        'first_name' => 'Deric',
        'last_name' => 'Cain',
        'speaks_spanish' => false,
        'address' => '1554 Hall Ave',
        'zip' => '35071',
        'phone' => '2059023961',
        'email' => 'deric.cain@gmail.com',
        'insurance_agency' => 'Geico',
        'has_applied_for_assistance' => false,
        'is_staying_home' => true,
        'has_power' => false,
        'prayer_needs' => 'Family',
        'attends_local_church' => true,
        'church_attended' => 'The Cross',
        'additional_notes' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        'agrees_to_terms' => true,
        'digital_signature' => 'Deric Cain',
        'is_pending' => false,
        'is_complete' => false,
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
