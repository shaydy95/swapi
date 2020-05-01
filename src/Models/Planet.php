<?php


namespace SwapiClient\Models;


class Planet
{
    /** @var string */
    public $name;
    /** @var string */
    public $diameter;
    /** @var string */
    public $rotation_period;
    /** @var string */
    public $orbital_period;
    /** @var string */
    public $gravity;
    /** @var string */
    public $population;
    /** @var string */
    public $climate;
    /** @var string */
    public $terrain;
    /** @var string */
    public $surface_water;
    /** @var Character */
    public $residents;
    /** @var string */
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