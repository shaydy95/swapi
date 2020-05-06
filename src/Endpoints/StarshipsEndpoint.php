<?php


namespace SwapiClient\Endpoints;


use GuzzleHttp\Exception\RequestException;
use SwapiClient\Models\Starship;

class StarshipsEndpoint extends Endpoints
{
    /**
     * @param int $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function get(int $id) : object
    {
        try {
            $response = $this->http->request("GET", sprintf("species/%d/", $id));
            return $this->hydrateOne(json_decode($response->getBody()), new Starship());
        } catch (RequestException $e) {
            echo $e->getMessage() . "\n";
            echo $e->getRequest()->getMethod();
        }
    }
}