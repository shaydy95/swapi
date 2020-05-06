<?php

require __DIR__.'/vendor/autoload.php';

//$swapi = new \SwapiClient\Client();
//
//$a = $swapi->spaceship()->get(1);
//
//var_dump($a);die();

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

// Create a mock and queue two responses.
$mock = new MockHandler([
    new Response(200, ['X-Foo' => 'Bar'], 'hui'),
    new Response(202, ['Content-Length' => 0]),
    new RequestException('Error Communicating with Server', new Request('GET', 'http://swapi.dev/api/people/1/'))
]);

$handlerStack = HandlerStack::create($mock);
$client = new Client(['handler' => $handlerStack]);

// The first request is intercepted with the first response.
$response = $client->request('GET', 'http://swapi.dev/api/people/1/');
echo $response->getStatusCode();
//> 200
//echo $response->getBody();
////> Hello, World
//// The second request is intercepted with the second response.
//echo $client->request('GET', 'http://swapi.dev/api/people/1/')->getStatusCode();
////> 202
//
//// Reset the queue and queue up a new response
//$mock->reset();
//$mock->append(new Response(201));

// As the mock was reset, the new response is the 201 CREATED,
// instead of the previously queued RequestException
//echo $client->request('GET', '/')->getStatusCode();