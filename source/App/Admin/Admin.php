<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;

    use CoffeeCode\DataLayer\Connect;

    class Admin
    {
        protected $view;

        public function __construct()
        {
            $this->view = Engine::create( __DIR__ . "/../../views", "php" );

            if(!isset($_SESSION["user"]))
                header('Location: ' . url("entrar"));
            
        }

        public function home() : void
        {
            echo $this->view->render("home", [
                "title" => "Home - " . SITE,
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