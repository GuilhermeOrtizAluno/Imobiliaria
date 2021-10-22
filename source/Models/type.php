<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Type extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("tipos", ["descricao"]);
        }
    }