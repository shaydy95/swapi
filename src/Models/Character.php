<?php


namespace SwapiClient\Models;


class Character extends Collection
{
    /** @var string */
    public $name;
    /** @var string */
    public $birth_year;
    /** @var string */
    public $eye_color;
    /** @var string */
    public $gender;
    /** @var string */
    public $hair_color;
    /** @var int cm */
    public $height;
    /** @var int kg */
    public $mass;
    /** @var string */
    public $skin_color;
    /** @var \DateTime */
    public $created;
    /** @var \DateTime */
    public $edited;
    /** @var string */
    public $url;

    /**
     * Character constructor.
     * @param null $url
     */
    public function __construct($url = null)
    {
        $this->url = $url;
    }
}