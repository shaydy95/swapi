<?php 

namespace Tests;

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

}