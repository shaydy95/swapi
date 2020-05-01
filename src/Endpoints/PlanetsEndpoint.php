<?php


namespace SwapiClient\Endpoints;


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
        $request = $this->http->createRequest("GET", sprintf("planets/%d/", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->hydrateOne($response->json(), new Planet);
        }

        return $this->handleResponse($response, $request);
    }
}