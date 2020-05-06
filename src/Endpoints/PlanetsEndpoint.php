<?php


namespace SwapiClient\Endpoints;


use GuzzleHttp\Exception\RequestException;
use SwapiClient\Models\Collection;
use SwapiClient\Models\Planet;

class PlanetsEndpoint extends Endpoints
{

    /**
     * @param $id
     * @return object|Planet
     * @throws \JsonMapper_Exception
     * @throws \Exception
     */
    public function get(int $id)
    {
        try {
            $response = $this->http->request("GET", sprintf("planets/%d/", $id));
            return $this->hydrateOne(json_decode($response->getBody()), new Planet());
        } catch (RequestException $e) {
            echo $e->getMessage() . "\n";
            echo $e->getRequest()->getMethod();
        }
    }
}