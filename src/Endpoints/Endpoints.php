<?php


namespace SwapiClient\Endpoints;


use GuzzleHttp\Client as Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use JsonMapper;
use phpDocumentor\Reflection\Types\Null_;
use Psr\Http\Message\ResponseInterface;
use SwapiClient\Models\Collection;


class Endpoints
{
    /** @var Client */
    protected $http;

    /** @var \JsonMapper */
    protected $mapper;

    /**
     * Endpoints constructor.
     * @param Client $http
     * @param JsonMapper $mapper
     */
    public function __construct(Client $http, JsonMapper $mapper)
    {
        $this->http = $http;
        $this->mapper = $mapper;
    }

    public function setClient(Client $http)
    {
        $this->http = $http;
    }

    /**
     * @param Response $response
     * @param null $default
     * @return Null_
     */
    protected function handleResponse(Response $response, $default = null) : Null_
    {
        switch ($response->getStatusCode()) {
            case 404:
                return $default;
        }
    }

    /**
     * @param object $data
     * @param $modelInstance
     * @return object
     * @throws \JsonMapper_Exception
     */
    protected function hydrateOne(object $data, $modelInstance) : object
    {
        return $this->mapper->map($data, $modelInstance);
    }


}