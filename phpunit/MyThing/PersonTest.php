<?php
/**
 * Created by PhpStorm.
 * User: sean.james
 * Date: 20/12/2016
 * Time: 15:29
 */

namespace Tests\Person;

use MyThing\Person;
use GuzzleHttp\Psr7\Response;
use PHPUnit_Framework_TestCase;
use Prophecy\Prophet;
use Prophecy\Argument;
use GuzzleHttp\Client as HttpClient;
use RuntimeException;

class TestPerson extends PHPUnit_Framework_TestCase
{
    /** @var Prophet $prophet */
    private $prophet;

    public function testConstruct()
    {
        $person = new Person();
        $this->assertInstanceOf(Person::class, $person);
    }

    public function testProphecyThing()
    {
        // using the prophecy mocker framework instead of PHPUnit's own.
        $httpClient = $this->prophet->prophesize(HttpClient::class);
        $httpClient->post(Argument::any())->willReturn(new Response());

        $person = new Person();
        $return = $person->makeAnApiCallOrWhatever($httpClient->reveal());
        $this->assertTrue($return);
    }

    public function testProphecyWithError()
    {
        // using the prophecy mocker framework instead of PHPUnit's own.
        $httpClient = $this->prophet->prophesize(HttpClient::class);
        $httpClient->post(Argument::any())->willReturn(new Response(404));

        $person = new Person();
        $this->expectException(RuntimeException::class);
        $person->makeAnApiCallOrWhatever($httpClient->reveal());
    }

    public function setUp()
    {   
        $this->prophet = new Prophet();
    }

    public function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}