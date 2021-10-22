<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Gallery extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("galerias", ["descricao", "mes", "id_imovel"]);
        }
    }