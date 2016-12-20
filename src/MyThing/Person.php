<?php

namespace MyThing;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
use RuntimeException;

class Person
{
    public function sayHi()
    {
        return "Hi!";
    }

    public function makeAnApiCallOrWhatever(HttpClient $client)
    {
        $response = $client->post('wherever');
        $status = $response->getStatusCode();
        if ($status==200) {
            return true;
        }
        throw new RuntimeException('BOOM!');
    }
}