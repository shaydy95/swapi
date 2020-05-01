<?php


namespace SwapiClient\Models;

use SwapiClient\Endpoints\Endpoints;

class Collection extends \ArrayObject
{
    /**
     * @var Endpoints
     */
    protected $endpoint;
    /**
     * @var Collection|string|null
     */

    public function setEndpoint(Endpoints $endpoint)
    {
        $this->endpoint = $endpoint;
    }

}