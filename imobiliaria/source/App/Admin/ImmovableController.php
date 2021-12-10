<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\WebService;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class ImmovableController extends Admin
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
        {
            $response = WebService::get("immovable");

            $immovables = json_decode($response)->immovables;

            echo $this->view->render("immovable/list", [
                "title" => "Imoveis - " . SITE,
                "immovables" => $immovables
            ]);
        }

        public function create() : void
        {
            $response = WebService::get("type");
            $types = json_decode($response)->types;

            $response = WebService::get("district");
            $districts = json_decode($response)->districts;

            $response = WebService::get("city");
            $citys = json_decode($response)->cities;

            echo $this->view->render("immovable/create", [
                "title" => "Novo Imovel - " . SITE,
                "types" => $types,
                "citys" => $citys,
                "districts" => $districts
            ]);
        }

        public function update() : void
        {
            $response = WebService::get("type");
            $types = json_decode($response)->types;

            $response = WebService::get("district");
            $districts = json_decode($response)->districts;

            $response = WebService::get("city");
            $citys = json_decode($response)->cities;

            $response = WebService::get("immovable", $_GET['id']);
            $immovable = json_decode($response)->immovable;
            
            echo $this->view->render("immovable/update", [
                "title" => "Novo Imovel - " . SITE,
                "types" => $types,
                "citys" => $citys,
                "districts" => $districts,
                "immovable" => $immovable
            ]);
        }

        public function delete($data) : void
        {
            $response = WebService::delete("immovable", $data['id']);

            header('Location: ' . url("imovel"));
        }

        public function post($data) : void
        {
            $request = array(
                'reference'     => $data['ref'],
                'description'   => $data['descricao'],
                'value'         => $data['venda'],
                'type_id'       => $data['tipo'],
                'cep'           => $data['cep'],
                'street'        => $data['rua'],
                'number'        => $data['numero'],
                'city_id'       => $data['cidade'],
                'district_id'   => $data['bairro'],
            );

            $response = WebService::post("immovable", $request);

            header('Location: ' . url("imovel"));
        }

        public function put($data) : void
        {
            $request = array(
                'id'            => $data['id'],
                'reference'     => $data['ref'],
                'description'   => $data['descricao'],
                'value'         => $data['venda'],
                'type_id'       => $data['tipo'],
                'cep'           => $data['cep'],
                'street'        => $data['rua'],
                'number'        => $data['numero'],
                'city_id'       => $data['cidade'],
                'district_id'   => $data['bairro'],
            );

            $response = WebService::put("immovable", $request);

            header('Location: ' . url("imovel"));
        }
    }