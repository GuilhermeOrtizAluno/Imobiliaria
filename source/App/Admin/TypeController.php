<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\Models\Type;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class TypeController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $types = (new Type())->find()->fetch(true);

            echo $this->view->render("type/list", [
                "title" => "Tipo - " . SITE,
                "types"  => $types
            ]);
        }

        public function delete($data) : void 
        {
            $type = (new Type())->findById($data['id']);
            $type->destroy();

            $error = array();

            if($type->fail()){
                array_push($error, $type->fail()->getCode() );
            }

            $types = (new Type())->find()->fetch(true);

            echo $this->view->render("type/list", [
                "title" => "Tipo - " . SITE,
                "error" => $error,
                "types"  => $types
            ]);
        }

        public function post($data) : void
        {
            $desc = $data['descricao'];

            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT * FROM tipos t WHERE t.descricao = '$desc' "
            );

            $very_type = $query->fetchAll(); 

            if(count($very_type) > 0 )
            {
                $types = (new Type())->find()->fetch(true);

                $error = array();

                array_push($error, "unique" );

                echo $this->view->render("type/list", [
                    "title" => "Tipo - " . SITE,
                    "types" => $types,
                    "error" => $error
                ]);
            }
            else {
                $type = new Type();
                $type->descricao = $desc;
                $type->save();

                header('Location: ' . url("tipo"));
            }
        }
    }