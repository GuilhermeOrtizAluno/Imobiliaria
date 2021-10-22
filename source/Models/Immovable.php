<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Immovable extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("imoveis", ["referencia", "descricao", "venda", "id_tipo", "id_endereco"]);
        }

        public function addresses()
        {
            return (new Address())->find("id_endereco = :uid", "uid={$this->id}")->fetch(true);
        }
    }