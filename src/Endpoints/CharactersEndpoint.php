<?php


namespace SwapiClient\Endpoints;


use SwapiClient\Models\Character;

class CharactersEndpoint extends Endpoints
{

    public function get(int $id) : object
    {
        $request = $this->http->createRequest("GET", sprintf("people/%d/", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->hydrateOne($response->json(), new Character);
        }

        return $this->handleResponse($response, $request);
    }
}