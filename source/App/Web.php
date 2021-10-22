<?php

    namespace Source\App;

    use League\Plates\Engine;
    use Source\Models\Immovable;
    use Source\Models\User;
    use Source\Models\Type;
    use Source\Models\City;
    use Source\Models\District;
    use Source\Models\Address;

    use CoffeeCode\DataLayer\Connect;

    class Web
    {
        private $view;

        public function __construct()
        {
            $this->view = Engine::create( __DIR__ . "/../../src/views", "php" );
        }

        public function login() : void
        {
            if(isset($_SESSION["user"]))
                header('Location: ' . url(""));

            echo $this->view->render("login", [
                "title" => "Entrar - " . SITE,
                "error" => false
            ]);
        }

        public function signIn($data) : void
        {
            $user = (new User())->find("usuario = :user", "user={$data['user']}")->fetch();

            if($user != null && password_verify($data['password'], $user->senha) ){
                $_SESSION["name"] = $user->nome;
                $_SESSION["last"] = $user->sobrenome;
                $_SESSION["user"] = $user->usuario;
                header('Location: ' . url(""));
            }

            echo $this->view->render("login", [
                "title" => "Entrar - " . SITE,
                "error" => true
            ]);
        }

        public function signOut() : void
        {
            unset($_SESSION["name"]);
            unset($_SESSION["last"]);
            unset($_SESSION["user"]);
            header('Location: ' . url(""));
        }

        public function error(array $data)  : void
        {
            echo $this->view->render("404", [
                "title" => "Error {$data['errcode']} - " . SITE,
                "error" => $data["errcode"]
            ]);
        }

    }