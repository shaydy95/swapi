<?php

namespace Tests;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use \SwapiClient\Client;

class ClientTest extends TestCase
{
	private $client;

	public function setUp(): void
	{
		$this->client = new Client();
	}

	public function testFirstMethod()
	{
		$this->assertSame('Privet, Genri', $this->client->firstMethod());
	}

//	public function testСharacters()
//	{
//		$this->assertSame('Privet, Genri', $this->client->characters());
//	}

}