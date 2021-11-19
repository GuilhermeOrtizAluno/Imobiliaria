<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\Models\User;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class UserController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $users = (new User())->find()->fetch(true);

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
            $user = (new User())->findById($_GET['id']);

            echo $this->view->render("user/update", [
                "title" => "Editar Usuario - " . SITE,
                "user" => $user
            ]);
        }

        public function delete($data) : void 
        {
            $user = (new user())->findById($data['id']);
            $user->destroy();
            
            $error = array();

            if($user->fail()){
                array_push($error, $user->fail()->getCode() );
            }

            $users = (new user())->find()->fetch(true);

            echo $this->view->render("user/list", [
                "title" => "Usuario - " . SITE,
                "users" => $users,
                "error" => $error,
            ]);
        }

        public function post($data) : void
        {
            $desc_user = $data['user'];
            $desc_email = $data['email'];

            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT * FROM usuarios u WHERE u.usuario = '$desc_user' OR u.email = '$desc_email' "
            );

            $very_user = $query->fetchAll(); 

            if(count($very_user) > 0 )
            {
                $users = (new User())->find()->fetch(true);

                $error = array();

                array_push($error, "unique" );

                echo $this->view->render("user/list", [
                    "title" => "Usuario - " . SITE,
                    "users" => $users,
                    "error" => $error
                ]);
            }
            else {
                $user = new User();
                $user->nome = $data['name'];
                $user->sobrenome = $data['last'];
                $user->usuario = $desc_user;
                $user->email = $desc_email;
                $user->senha = password_hash($data['senha'], PASSWORD_DEFAULT);
                $user->save();

                header('Location: ' . url("usuario"));
            }

        }

        public function put($data) : void
        {

            $user = (new User())->findById($data['id']);
            $user->nome = $data['name'];
            $user->sobrenome = $data['last'];
            $user->usuario = $data['user'];
            $user->email = $data['email'];
            $user->senha = password_hash($data['senha'], PASSWORD_DEFAULT);
            $user->save();

            header('Location: ' . url("usuario"));
        }
        
    }