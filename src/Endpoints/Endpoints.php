<?php


namespace SwapiClient\Endpoints;

use Guzzle\Http\Client;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Message\Request;
use JsonMapper;
use phpDocumentor\Reflection\Types\Null_;
use SwapiClient\Models\Collection;


class Endpoints
{
    /** @var Client */
    protected $http;

    /** @var \JsonMapper */
    protected $mapper;

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
     * @param Request $request
     * @param null $default
     * @return Null_
     */
    protected function handleResponse(Response $response, Request $request, $default = null) : Null_
    {
        switch ($response->getStatusCode()) {
            case 404:
                return $default;
        }
    }

    /**
     * @param array $data
     * @param $modelInstance
     * @return object
     * @throws \JsonMapper_Exception
     */
    protected function hydrateOne(array $data, $modelInstance) : object
    {
        $stdObject = (object) $data;
        return $this->mapper->map($stdObject, $modelInstance);
    }


}