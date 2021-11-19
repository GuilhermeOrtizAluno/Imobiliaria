<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\Models\District;
    use Source\Models\City;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class DistrictController extends Admin
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT b.id, c.descricao as cidade, b.descricao as bairro, b.created_at, b.updated_at
                FROM bairros b
                INNER JOIN cidades c ON c.id = b.id_cidade"
            );

            $districts = $query->fetchAll();

            $citys = (new City())->find()->fetch(true);

            echo $this->view->render("district/list", [
                "title" => "Bairro - " . SITE,
                "districts" => $districts,
                "citys" => $citys
            ]);
        }

        public function delete($data) : void 
        {
            $district = (new District())->findById($data['id']);
            $district->destroy();

            $error = array();

            if($district->fail()){
                array_push($error, $district->fail()->getCode() );
            }

            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT b.id, c.descricao as cidade, b.descricao as bairro, b.created_at, b.updated_at
                FROM bairros b
                INNER JOIN cidades c ON c.id = b.id_cidade"
            );

            $districts = $query->fetchAll();

            $citys = (new City())->find()->fetch(true);

            echo $this->view->render("district/list", [
                "title" => "Bairro - " . SITE,
                "districts" => $districts,
                "citys" => $citys,
                "error" => $error,
            ]);
        }

        public function post($data) : void
        {
            $desc_district = $data['bairro'];
            $id_city = $data['cidade'];

            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT * FROM bairros b
                INNER JOIN cidades c ON c.id = b.id_cidade 
                WHERE b.descricao = '$desc_district' AND  c.id = '$id_city' "
            );

            $very_district = $query->fetchAll(); 

            if(count($very_district) > 0 )
            {
                $bd = Connect::getInstance();
                $query = $bd->query(
                    "SELECT b.id, c.descricao as cidade, b.descricao as bairro, b.created_at, b.updated_at
                    FROM bairros b
                    INNER JOIN cidades c ON c.id = b.id_cidade"
                );
    
                $districts = $query->fetchAll();
    
                $citys = (new City())->find()->fetch(true);                

                $error = array();

                array_push($error, "unique" );

                echo $this->view->render("district/list", [
                    "title" => "Bairro - " . SITE,
                    "districts" => $districts,
                    "citys" => $citys,
                    "error" =>  $error
                ]);
            }
            else {
                $district = new District();
                $district->id_cidade = $data['cidade'];
                $district->descricao = $data['bairro'];
                $district->save();

                header('Location: ' . url("bairro"));
            }
        }
    }