<?php 

namespace SwapiClient;


use JsonMapper;
use SwapiClient\Models\Character;
use SwapiClient\Models\Planet;
use SwapiClient\Models\Starship;

class Client
{
    const API_URI = 'http://swapi.dev/api/';

    /**
     * @var Character
     */
    protected $characters;

    /**
     * @var Planet
     */
    protected $planets;

    /**
     * @var Starship
     */
    protected $species;

    private $http;

    private $mapper;

    public function __construct()
    {
        $this->http = $this->createHttpClient();
        $this->mapper = $this->createMapper();

    }

    public function createHttpClient()
    {
        return new \GuzzleHttp\Client([
            'base_uri' => self::API_URI,
            'default' => ['headers' => ['Accept' => 'application/json']],
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
    public function spaceship($fresh = false)
    {
        if (!isset($this->species) || $fresh) {
            $this->species = new Endpoints\StarshipsEndpoint($this->http, $this->mapper);
        }
        return $this->species;
    }


    /**
     * @param $uri
     * @return object SWAPI Model
     * @throws \JsonMapper_Exception
     */
    public function getFromUri($uri)
    {
        if (preg_match("/\/api\/(\w+)\/(\d+)(\/|$)/", $uri, $matches) !== false) {
            switch (strtolower($matches[1])) {
                case "characters":
                    return $this->characters()->get($matches[2]);
                case "planets":
                    return $this->planets()->get($matches[2]);
                case "starship":
                    return $this->spaceship()->get($matches[2]);
            }
        }

        throw new \UnexpectedValueException(sprintf("Could not match a URI to an endpoint handler for %s", $uri));
    }
    
	public function firstMethod()
	{
		return "Privet, Genri";
	}
}