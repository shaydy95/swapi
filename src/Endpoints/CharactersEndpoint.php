<?php


namespace SwapiClient\Endpoints;


use GuzzleHttp\Exception\RequestException;
use SwapiClient\Models\Character;

class CharactersEndpoint extends Endpoints
{

    /**
     * @param int $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function get(int $id) : object
    {
        try {
            $response = $this->http->request("GET", sprintf("people/%d/", $id));
            return $this->hydrateOne(json_decode($response->getBody()), new Character());
        } catch (RequestException $e) {
            echo $e->getMessage() . "\n";
            echo $e->getRequest()->getMethod();
        }
    }
}