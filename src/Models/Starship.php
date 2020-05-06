<?php


namespace SwapiClient\Models;


use GuzzleHttp\Psr7\Request;

class Starship extends Request
{
    /** @var string */
    public $name;
    /** @var string */
    public $classification;
    /** @var string */
    public $designation;
    /** @var string */
    public $average_height;
    /** @var string */
    public $average_lifespan;
    public $eye_colors;
    /** @var string */
    public $hair_colors;
    /** @var string */
    public $skin_colors;
    /** @var string */
    public $language;
    /** @var Planet */
    public $homeworld;
    /** @var Character */
    public $people;
    /** @var \DateTime */
    public $created;
    /** @var \DateTime */
    public $edited;
    /** @var string */
    public $url;

    public function __construct($url = null)
    {
        $this->url = $url;
    }
}