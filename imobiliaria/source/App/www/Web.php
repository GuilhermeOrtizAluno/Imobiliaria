<?php

    namespace Source\App\www;

    use League\Plates\Engine;
    use Source\WebService;

    class Web
    {
        private $view;

        public function __construct()
        {
            $this->view = Engine::create( __DIR__ . "/../../views", "php" );
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

        public function register() : void
        {
            if(isset($_SESSION["user"]))
                header('Location: ' . url(""));

            echo $this->view->render("register", [
                "title" => "Usuario - " . SITE,
                "error" => false
            ]);
        }

        public function postRegister($data) : void
        {
            $request = array(
                'name'      => $data['name'],
                'surname'   => $data['surname'],
                'email'     => $data['email'],
                'username'  => $data['username'],
                'password'  => password_hash($data['password'], PASSWORD_DEFAULT)
            );

            $response = WebService::post("user", $request);

            header('Location: ' . url("entrar"));
        }

        public function signIn($data) : void
        {
            $request = array(
                'username' => $data['user']
            );

            $response = WebService::post("login", $request);
            $user = json_decode($response)->user;

            if($user != null && password_verify($data['password'], $user->password) ){
                $_SESSION["name"] = $user->name;
                $_SESSION["last"] = $user->surname;
                $_SESSION["user"] = $user->username;
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