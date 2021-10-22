<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class District extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("bairros", ["descricao", "id_cidade"]);
        }
    }