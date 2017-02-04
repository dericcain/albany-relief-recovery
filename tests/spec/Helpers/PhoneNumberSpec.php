<?php

namespace spec\App\Helpers;

use App\Helpers\PhoneNumber;
use PhpSpec\ObjectBehavior;

class PhoneNumberSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PhoneNumber::class);
    }

    function it_only_returns_numbers()
    {
        $this::onlyNumbers('(205)902-3961')->shouldReturn('2059023961');
    }

    function it_should_return_a_nicely_formatted_number()
    {
        $this::format('2059023961')->shouldReturn('(205) 902-3961');
    }

}
