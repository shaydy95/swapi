<?php 

namespace SwapiClient;


use JsonMapper;

class Client
{
    const VERSION = '1';

    protected $characters;

    private $http;

    private $mapper;

    public function __construct()
    {
        $this->http = $this->createHttpClient();
        $this->mapper = $this->createMapper();

    }

    protected function createHttpClient()
    {
        return new \Guzzle\Http\Client('http://swapi.dev/api/', [
            'default' => [
                'exceptions' => false,
                'headers' => [
                    'User-Agent' => sprintf('php-swapi/%s', static::VERSION),
                    'Accept' => 'application/json',
                ],
            ],
        ]);
    }

    protected function createMapper()
    {
        return new JsonMapper;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\CharactersEndpoint
     */
    public function characters($fresh = false)
    {
        if (!isset($this->characters) || $fresh) {
            $this->characters = new Endpoints\CharactersEndpoint($this->http, $this->mapper);
        }
        return $this->characters;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\PlanetsEndpoint
     */
    public function planets($fresh = false)
    {
        if (!isset($this->planets) || $fresh) {
            $this->planets = new Endpoints\PlanetsEndpoint($this->http, $this->mapper);
        }
        return $this->planets;
    }

    /**
     * @param bool $fresh
     * @return Endpoints\StarshipsEndpoint
     */
    public function starship($fresh = false)
    {
        if (!isset($this->species) || $fresh) {
            $this->species = new Endpoints\StarshipsEndpoint($this->http, $this->mapper);
        }
        return $this->species;
    }



    /**
     * @param string $url
     * @return object SWAPI Model
     * @throws \UnexpectedValueException When given an unrecognised URI
     */
    public function getFromUri($uri)
    {
        if (preg_match("/\/api\/(\w+)\/(\d+)(\/|$)/", $uri, $matches) !== false) {
            switch (strtolower($matches[1])) {
                case "characters":
                    return $this->characters()->get($matches[2]);
                case "films":
                    return $this->films()->get($matches[2]);
                case "planets":
                    return $this->planets()->get($matches[2]);
                case "species":
                    return $this->species()->get($matches[2]);
                case "starships":
                    return $this->starships()->get($matches[2]);
                case "vehicles":
                    return $this->vehicles()->get($matches[2]);
            }
        }

        throw new \UnexpectedValueException(sprintf("Could not match a URI to an endpoint handler for %s", $uri));
    }
    
	public function firstMethod()
	{
		return "Privet, Genri";
	}
}