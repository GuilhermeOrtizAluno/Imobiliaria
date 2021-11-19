<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\Models\City;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class CityController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $citys = (new City())->find()->fetch(true);

            echo $this->view->render("city/list", [
                "title" => "Cidade - " . SITE,
                "citys" => $citys
            ]);
        }

        public function delete($data) : void 
        {
            $city = (new City())->findById($data['id']);
            $city->destroy();

            $error = array();

            if($city->fail()){
                array_push($error, $city->fail()->getCode() );
            }

            $citys = (new City())->find()->fetch(true);

            echo $this->view->render("city/list", [
                "title" => "Cidade - " . SITE,
                "citys" => $citys,
                "error" => $error,
            ]);
        }

        public function post($data) : void
        {
            $desc = $data['descricao'];

            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT * FROM cidades c WHERE c.descricao = '$desc' "
            );

            $very_city = $query->fetchAll(); 

            if(count($very_city) > 0 )
            {
                $citys = (new City())->find()->fetch(true);

                $error = array();

                array_push($error, "unique" );

                echo $this->view->render("city/list", [
                    "title" => "Cidade - " . SITE,
                    "citys" => $citys,
                    "error" => $error
                ]);
            }
            else {
                $city = new City();
                $city->descricao = $desc;
                $city->save();

                header('Location: ' . url("cidade"));
            }
        }
    }