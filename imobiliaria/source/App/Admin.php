<?php

    namespace Source\App;

    use League\Plates\Engine;

    use CoffeeCode\DataLayer\Connect;

    class Admin
    {
        private $view;

        public function __construct()
        {
            $this->view = Engine::create( __DIR__ . "/../../src/views", "php" );

            if(!isset($_SESSION["user"]))
                header('Location: ' . url("entrar"));
            
        }

        public function home() : void
        {
            echo $this->view->render("home", [
                "title" => "Home - " . SITE,
            ]);
        }

        public function profile() : void
        {
            echo $this->view->render("profile", [
                "title" => "Perfil - " . SITE,
            ]);
        }

        public function settings() : void
        {
            echo $this->view->render("settings", [
                "title" => "Configuração - " . SITE,
            ]);
        }

        public function error(array $data)  : void
        {
            echo $this->view->render("404", [
                "title" => "Error {$data['errcode']} - " . SITE,
                "error" => $data["errcode"]
            ]);
        }

    }