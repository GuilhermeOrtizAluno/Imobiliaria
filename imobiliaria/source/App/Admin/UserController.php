<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\WebService;

    require_once("Admin.php");

    class UserController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $response = WebService::get("user");

            $users = json_decode($response)->users;

            echo $this->view->render("user/list", [
                "title" => "Usuario - " . SITE,
                "users" => $users
            ]);
        }

        public function create() : void
        {
            echo $this->view->render("user/create", [
                "title" => "Novo Usuario - " . SITE,
            ]);
        }

        public function update() : void
        {
            $response = WebService::get("user", $_GET['id']);
            $user = json_decode($response)->user;

            echo $this->view->render("user/update", [
                "title" => "Editar Usuario - " . SITE,
                "user" => $user
            ]);
        }

        public function delete($data) : void 
        {
            $response = WebService::delete("user", $data['id']);
            
            $error = array();

            $response = WebService::get("user");

            $users = json_decode($response)->users;

            echo $this->view->render("user/list", [
                "title" => "Usuario - " . SITE,
                "users" => $users,
                "error" => $error,
            ]);
        }

        public function post($data) : void
        {
            $request = array(
                'name'      => $data['name'],
                'surname'   => $data['last'],
                'email'     => $data['email'],
                'username'  => $data['user'],
                'password'  => password_hash($data['senha'], PASSWORD_DEFAULT)
            );

            $response = WebService::post("user", $request);

            header('Location: ' . url("usuario"));
        }

        public function put($data) : void
        {
            $request = array(
                'id'        => $data['id'],
                'name'      => $data['name'],
                'surname'   => $data['last'],
                'email'     => $data['email'],
                'username'  => $data['user'],
                'password'  => password_hash($data['senha'], PASSWORD_DEFAULT)
            );

            $response = WebService::put("user", $request);

            header('Location: ' . url("usuario"));
        }
        
    }