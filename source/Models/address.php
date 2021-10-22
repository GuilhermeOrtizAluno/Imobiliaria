<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Address extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("enderecos", ["cep", "rua", "numero", "id_cidade", "id_bairro"]);
        }
    }