<?php

namespace spec\MyThing;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use MyThing\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RuntimeException;

class PersonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Person::class);
    }

    function it_should_say_hi()
    {
        $this->sayHi()->shouldReturn('Hi!');
    }

    function it_should_do_an_api_call_or_some_crap_like_that($httpClient)
    {
        $httpClient->beADoubleOf(Client::class);
        $httpClient->post(Argument::any())->willReturn(new Response());

        $this->makeAnApiCallOrWhatever($httpClient)->shouldReturn(true);
    }

    function it_should_do_an_api_call_and_blow_up_if_it_fails($httpClient)
    {
        $httpClient->beADoubleOf(Client::class);
        $httpClient->post(Argument::any())->willReturn(new Response(404));

        $this->shouldThrow(RuntimeException::class)->during('makeAnApiCallOrWhatever', [$httpClient]);
    }
}
