<?php

require __DIR__.'/vendor/autoload.php';

$swapi = new \SwapiClient\Client();

$a = $swapi->starship()->get(1);

var_dump($a);die();

