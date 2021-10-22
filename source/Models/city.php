<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class City extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("cidades", ["descricao"]);
        }
    }