<?php


namespace SwapiClient\Endpoints;


use SwapiClient\Models\Starship;

class StarshipsEndpoint extends Endpoints
{
    public function get($id) : object
    {
        $request = $this->http->createRequest("GET", sprintf("species/%d/", $id));
        $response = $this->http->send($request);

        if ($response->getStatusCode() == 200) {
            return $this->hydrateOne($response->json(), new Starship());
        }

        return $this->handleResponse($response, $request);
    }
}