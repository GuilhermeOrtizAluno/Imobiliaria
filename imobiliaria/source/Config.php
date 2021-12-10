<?php

define("ROOT", "http://localhost/imobiliaria/src");

define("BASE_URL", "http://localhost/imobiliaria");

define("SITE", "imobiliaria");

/*
* @param string|null $uri
* @return string
*/
function url(string $uri = null) : string
{
    if($uri) {
        return  BASE_URL . "/{$uri}";
    }

    return BASE_URL;
}